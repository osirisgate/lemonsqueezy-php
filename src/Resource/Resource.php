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

namespace Osirisgate\Component\Lemonsqueezy\Resource;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\HttpClient\Request\Http;
use Osirisgate\Component\Lemonsqueezy\LemonsqueezyClientInterface;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * Abstract base class for LemonSqueezy API resources.
 *
 * This class provides common HTTP methods (GET, POST, PATCH, DELETE) to interact
 * with the LemonSqueezy API endpoints, handling authentication headers, URL construction,
 * and payload formatting according to JSON:API specification.
 *
 * It implements a singleton pattern for resource instances to optimize usage.
 *
 * Usage:
 * - Extend this class to implement specific resource endpoints (e.g. ProductResource, UserResource).
 * - Use provided protected HTTP methods (get, post, patch, remove) for API communication.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @throws HttpException      on HTTP errors
 * @throws ExceptionInterface on other errors
 */
abstract class Resource
{
    protected const string BASE_URL = 'https://api.lemonsqueezy.com/v1/';

    private const string ACCEPT_HEADER = 'application/vnd.api+json';

    private const string CONTENT_TYPE_HEADER = 'application/vnd.api+json';

    /**
     * @var array<string, static>
     */
    protected static array $instances = [];

    protected function __construct(
        protected readonly LemonsqueezyClientInterface $client
    ) {
    }

    /**
     * Initializes and returns a singleton instance of the resource.
     *
     * @param LemonsqueezyClientInterface $client The LemonSqueezy API client.
     * @return static The singleton instance of the resource.
     */
    public static function init(LemonsqueezyClientInterface $client): static
    {
        $calledClass = static::class;

        if (!isset(self::$instances[$calledClass])) {
            self::$instances[$calledClass] = new static($client);
        }

        return self::$instances[$calledClass];
    }

    /**
     * Asserts that the given payload array has an 'id' key.
     *
     * This is a helper method used before update or delete operations that require
     * a resource identifier in the payload.
     *
     * @param array<string, mixed> $payload The payload array to check.
     *
     * @throws RuntimeException If the payload does not contain the 'id' key.
     */
    protected static function assertThatPayloadHasId(array $payload): void
    {
        if (!array_key_exists('id', $payload)) {
            throw new RuntimeException([
                'message' => 'The {id} is required for this operation.',
                'details' => [
                    'data' => $payload,
                ],
            ]);
        }
    }

    /**
     * Sends a GET request to the LemonSqueezy API.
     *
     * @param string $uri The API endpoint URI.
     * @param array<string, mixed> $filters An optional array of query filters.
     * @param array<string, mixed> $headers An optional array of additional HTTP headers.
     * @param array<string, mixed> $options An optional array of HTTP client options.
     * @param string|null $fieldName Optional field name to extract from the response data.
     * @param mixed $defaultValue Optional default value to return if the field is not found.
     *
     * @return array<string, mixed> The parsed JSON response data.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     */
    protected function get(string $uri, array $filters = [], array $headers = [], array $options = [], ?string $fieldName = null, mixed $defaultValue = null): array
    {
        $response = Http::get(
            url: $this->getUrl($uri),
            headers: array_merge($this->getHeaders(), $headers),
            filters: [
                'filter' => $filters,
            ],
            options: $options
        );

        if ($fieldName !== null) {
            return $response->get($fieldName, $defaultValue);
        }

        return $response->getData();
    }

    /**
     * Sends a POST request to the LemonSqueezy API.
     *
     * @param string $uri The API endpoint URI.
     * @param array<string, mixed> $payload The request body payload.
     * @param array<string, mixed> $filters An optional array of query filters.
     * @param array<string, mixed> $headers An optional array of additional HTTP headers.
     * @param array<string, mixed> $options An optional array of HTTP client options.
     * @param bool $withNestedFilter Whether to nest filters under a 'filter' key.
     * @param string|null $fieldName Optional field name to extract from the response data.
     * @param mixed $defaultValue Optional default value to return if the field is not found.
     *
     * @return array<string, mixed> The parsed JSON response data.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     */
    protected function post(string $uri, array $payload = [], array $filters = [], array $headers = [], array $options = [], bool $withNestedFilter = true, ?string $fieldName = null, mixed $defaultValue = null): array
    {
        $response = Http::post(
            url: $this->getUrl($uri),
            headers: array_merge($this->getHeaders(), $headers),
            payload: [
                'data' => $payload,
            ],
            filters: $withNestedFilter ? [
                'filter' => $filters,
            ] : $filters,
            options: $options
        );

        if ($fieldName !== null) {
            return $response->get($fieldName, $defaultValue);
        }

        return $response->getData();
    }

    /**
     * Sends a PATCH request to the LemonSqueezy API.
     *
     * @param string $uri The API endpoint URI.
     * @param array<string, mixed> $payload The request body payload for the update.
     * @param array<string, mixed> $filters An optional array of query filters.
     * @param array<string, mixed> $headers An optional array of additional HTTP headers.
     * @param array<string, mixed> $options An optional array of HTTP client options.
     *
     * @return array<string, mixed> The parsed JSON response data.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     */
    protected function patch(string $uri, array $payload = [], array $filters = [], array $headers = [], array $options = []): array
    {
        $response = Http::patch(
            url: $this->getUrl($uri),
            headers: array_merge($this->getHeaders(), $headers),
            payload: [
                'data' => $payload,
            ],
            filters: [
                'filter' => $filters,
            ],
            options: $options
        );

        return $response->getData();
    }

    /**
     * Sends a DELETE request to the LemonSqueezy API.
     *
     * @param string $uri The API endpoint URI.
     * @param array<string, mixed> $payload An optional request body payload.
     * @param array<string, mixed> $filters An optional array of query filters.
     * @param array<string, mixed> $headers An optional array of additional HTTP headers.
     * @param array<string, mixed> $options An optional array of HTTP client options.
     *
     * @return array<string, mixed> The parsed JSON response data (may be empty for successful deletion).
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     */
    protected function remove(string $uri, array $payload = [], array $filters = [], array $headers = [], array $options = []): array
    {
        $response = Http::delete(
            url: $this->getUrl($uri),
            headers: array_merge($this->getHeaders(), $headers),
            payload: [
                'data' => $payload,
            ],
            filters: [
                'filter' => $filters,
            ],
            options: $options
        );

        return $response->getData();
    }

    /**
     * Returns the default HTTP headers required for LemonSqueezy API requests.
     *
     * Includes the Authorization header with the API key, Accept header for JSON:API,
     * and Content-Type header for JSON:API.
     *
     * @return array<string, string> An array of HTTP headers.
     */
    private function getHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->client->getApiKey(),
            'Accept' => self::ACCEPT_HEADER,
            'Content-Type' => self::CONTENT_TYPE_HEADER,
        ];
    }

    /**
     * Constructs the full API URL for a given URI.
     *
     * @param string $uri The resource-specific URI.
     * @return string The full API URL.
     */
    private function getUrl(string $uri): string
    {
        return rtrim(self::BASE_URL, '/') . '/' . ltrim($uri, '/');
    }
}
