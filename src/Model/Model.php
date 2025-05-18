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

namespace Osirisgate\Component\Lemonsqueezy\Model;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\Hydrator;
use Osirisgate\Component\Lemonsqueezy\Model\ValueObject\SelfLink;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * Abstract base model class for LemonSqueezy API resources.
 *
 * This class provides common functionality to hydrate data into model objects
 * using the `Hydrator` trait, create instances of model classes from associative
 * arrays (representing API responses), and access core properties that are
 * common across many LemonSqueezy API resources, such as the resource ID,
 * resource type, and a self-referential link.
 *
 * Subclasses of this `Model` class are expected to define their specific
 * attributes and relationships. The constructor is made private to enforce
 * the use of the static `from()` method for instance creation, which includes
 * error handling during the hydration process. The `fromArray()` method is
 * provided for creating collections of model instances from an array of data.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
abstract class Model
{
    use Hydrator;

    /**
     * @var string The type of the LemonSqueezy resource (e.g., 'orders', 'subscriptions').
     */
    protected string $type;

    /**
     * @var string The unique identifier of the LemonSqueezy resource.
     */
    protected string $id;

    /**
     * @var SelfLink A value object representing the self-referential link to this resource.
     */
    protected SelfLink $links;

    /**
     * Private constructor to prevent direct instantiation. Use the static `from()` method instead.
     *
     * @param array<string, mixed> $data An associative array containing the data to hydrate the model with.
     *
     * @throws RuntimeException If an error occurs during the hydration process.
     */
    private function __construct(array $data)
    {
        try {
            $this->hydrate($data);
        } catch (\Throwable $throwable) {
            throw new RuntimeException([
                'message' => $throwable->getMessage(),
                'details' => [
                    'data' => $data,
                ],
            ]);
        }
    }

    /**
     * Static factory method to create a new instance of the model from an array of data.
     *
     * @param array<string, mixed> $data An associative array containing the data for the model.
     *
     * @return static A new instance of the model.
     *
     * @throws RuntimeException If an error occurs during the hydration process.
     */
    public static function from(array $data): static
    {
        return new static($data);
    }

    /**
     * Static factory method to create an array of model instances from an array of data arrays.
     *
     * @param array<string, mixed> $data An array of associative arrays, each representing a model's data.
     *
     * @return static[] An array of model instances.
     *
     * @throws RuntimeException If an error occurs during the hydration process of any item.
     */
    public static function fromArray(array $data): array
    {
        return array_map(fn (array $itemData): static => static::from($itemData), $data);
    }

    /**
     * Returns the unique identifier of the LemonSqueezy resource.
     *
     * @return string The resource ID.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Returns the type of the LemonSqueezy resource.
     *
     * @return string The resource type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Returns the self-referential link to this resource.
     *
     * @return SelfLink The self-link value object.
     */
    public function getSelfLink(): SelfLink
    {
        return $this->links;
    }
}
