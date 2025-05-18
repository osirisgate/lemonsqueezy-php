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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Price;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Model;
use Osirisgate\Component\Lemonsqueezy\Model\Price\Price;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * PriceResource – Handles LemonSqueezy price resources.
 *
 * Provides methods to list all prices and retrieve a specific price.
 * It also offers a method to fetch the associated variant for a given price.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class PriceResource extends Resource implements PriceResourceInterface
{
    /**
     * Lists all price records.
     *
     * Retrieves a paginated list of all prices associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Price[] An array of `Price` model instances representing the retrieved prices.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     *
     * @url https://docs.lemonsqueezy.com/api/prices/list-all-prices
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/prices', filters: $filters, options: $options);

        return Price::fromArray($responseData);
    }

    /**
     * Retrieves a single price record by its ID.
     *
     * Fetches the details of a specific price based on the provided unique identifier.
     *
     * @param int $id The ID of the price to retrieve.
     *
     * @return Price A `Price` model instance representing the requested price.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., price not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/prices/retrieve-price
     */
    public function find(int $id): Model
    {
        $responseData = $this->get(uri: "/prices/{$id}");

        return Price::from($responseData);
    }

    /**
     * Retrieves the variant associated with a specific price.
     *
     * Fetches the details of the product variant that is linked to the given price ID.
     *
     * @param int $priceId The ID of the price whose variant to retrieve.
     *
     * @return Variant A `Variant` model instance representing the associated variant.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., price not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/prices/1/variant
     */
    public function variant(int $priceId): Variant
    {
        $responseData = $this->get(uri: "/prices/{$priceId}/variant");

        return Variant::from($responseData);
    }
}
