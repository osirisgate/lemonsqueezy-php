<?php

/*
 * This file is part of the Osirisgate package.
 *
 * (c) Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Osirisgate\Component\Lemonsqueezy\Model\Trait;

use Osirisgate\Core\Exception\RuntimeException;

/**
 * Hydrator trait – Automatic object hydration from array data.
 *
 * Provides functionality to populate object properties of a class instance
 * based on the keys and values of an associative array. This trait intelligently
 * handles type conversions for common data types, including `DateTimeInterface`
 * and its concrete implementations (`DateTimeImmutable`, `DateTime`), nested
 * objects (where array values correspond to properties that are instances of
 * other classes), and PHP enums (using a `fromString` method if it exists).
 *
 * The hydration process uses reflection to inspect the properties of the class
 * into which the data is being hydrated. It matches array keys to property names,
 * performing a conversion from snake_case (common in API responses) to camelCase
 * (common in PHP coding standards) for property name matching.
 *
 * This trait is designed to simplify the process of mapping data from external
 * sources (like API responses) to PHP model objects, reducing boilerplate code
 * and improving the maintainability of data transfer objects (DTOs) and entity
 * models.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait Hydrator
{
    /**
     * Populates the properties of the current object based on the provided array data.
     *
     * @param array<string, mixed> $data An associative array where keys correspond
     * to the snake_case or camelCase names of the object's properties.
     *
     * @throws \DateMalformedStringException If a string value cannot be parsed into a DateTime object.
     * @throws \ReflectionException If there is an issue with class reflection.
     * @throws RuntimeException If an invalid enum value is encountered or during nested object hydration.
     */
    protected function hydrate(array $data): void
    {
        $reflection = new \ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $key = $this->convertToCamelCase($property->getName());

            if (!array_key_exists($key, $data)) {
                continue;
            }

            $property->setValue($this, $this->resolveValue($property, $data[$key]));
        }
    }

    /**
     * Converts a snake_case string to camelCase.
     *
     * @param string $name The snake_case string to convert.
     *
     * @return string The camelCase equivalent of the input string.
     */
    protected function convertToCamelCase(string $name): string
    {
        $parts = explode('_', $name);
        $camel = array_shift($parts);

        foreach ($parts as $part) {
            $camel .= ucfirst($part);
        }

        return $camel;
    }

    /**
     * Converts a snake_case string to camelCase (alternative implementation).
     *
     * @param string $string The snake_case string to convert.
     *
     * @return string The camelCase equivalent of the input string.
     */
    protected function convertSnakeToCamel(string $string): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $string))));
    }

    /**
     * Resolves a value from the input data, performing type conversions based on
     * the property's type.
     *
     * @param \ReflectionProperty $property The reflection object of the property to set.
     * @param mixed               $value    The value from the data array to resolve.
     *
     * @return mixed The resolved value, potentially type-converted.
     *
     * @throws \DateMalformedStringException If a string value cannot be parsed into a DateTime object.
     * @throws \ReflectionException If there is an issue with class reflection during nested object hydration.
     * @throws RuntimeException If an invalid enum value is encountered or during nested object hydration.
     */
    protected function resolveValue(\ReflectionProperty $property, mixed $value): mixed
    {
        $type = $property->getType();

        if (!$type instanceof \ReflectionNamedType) {
            return $value;
        }

        /** @var class-string $typeName */
        $typeName = ltrim($type->getName(), '\\');

        if (
            is_string($value)
            && in_array($typeName, ['DateTimeInterface', 'DateTimeImmutable', 'DateTime'])
        ) {
            try {
                return new \DateTimeImmutable($value);
            } catch (\Throwable $e) {
                throw new RuntimeException([
                    'message' => "Invalid datetime format: {$value}",
                    'details' => [
                        'error' => $e->getMessage(),
                        'value' => $value,
                    ],
                ]);
            }
        }

        if (enum_exists($typeName) && method_exists($typeName, 'fromString') && is_string($value)) {
            try {
                return $typeName::fromString($value);
            } catch (\Throwable $throwable) {
                throw new RuntimeException([
                    'message' => $throwable->getMessage(),
                    'details' => [
                        'error' => "Invalid enum value for '{$value}' in enum {$typeName}",
                        'value' => $value,
                    ],
                ]);
            }
        }

        if (class_exists($typeName) && is_array($value)) {
            /** @var array<string, mixed> $nestedObject */
            $nestedObject = $value;

            return $this->hydrateNestedObject($typeName, $nestedObject);
        }

        return $value;
    }

    /**
     * Hydrates a nested object from an array of data.
     *
     * @param class-string         $className The fully qualified name of the class to hydrate.
     * @param array<string, mixed> $data      An associative array containing the data for the nested object.
     *
     * @return object The hydrated instance of the nested object.
     *
     * @throws \ReflectionException If there is an issue with class reflection.
     * @throws \DateMalformedStringException If a string value cannot be parsed into a DateTime object during nested hydration.
     * @throws RuntimeException If an error occurs during the recursive hydration of the nested object.
     */
    protected function hydrateNestedObject(string $className, array $data): object
    {
        $instance = new \ReflectionClass($className)->newInstanceWithoutConstructor();
        $reflection = new \ReflectionClass($instance);

        foreach ($data as $key => $value) {
            $propertyName = $this->convertSnakeToCamel($key);

            if (!$reflection->hasProperty($propertyName)) {
                continue;
            }

            $property = $reflection->getProperty($propertyName);
            $property->setValue($instance, $this->resolveValue($property, $value));
        }

        return $instance;
    }
}
