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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Discount;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Discount\Discount;
use Osirisgate\Component\Lemonsqueezy\Model\DiscountRedemption\DiscountRedemption;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * DiscountResource – LemonSqueezy API discount resource handler.
 *
 * Provides methods to create, list, retrieve, and delete discount records from the LemonSqueezy API.
 * This resource implements CRUD operations (except update) via the `/discounts` endpoints.
 * It also offers methods to fetch related resources such as the discount's store, associated
 * variants, and discount redemptions.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class DiscountResource extends Resource implements DiscountResourceInterface
{
    /**
     * Creates a new discount.
     *
     * Initiates the creation of a new discount record with the provided data.
     *
     * @param array{
     * type: 'discounts',
     * attributes: array{
     * name: string,
     * code: string,
     * amount: int,
     * amount_type: 'percent'|'fixed'
     * },
     * relationships: array{
     * store: array{
     * data: array{
     * type: 'stores',
     * id: string
     * }
     * }
     * }
     * } $data The discount data to create. Refer to the LemonSqueezy API
     * documentation for the specific structure and allowed parameters.
     *
     * @return Discount A `Discount` model instance representing the newly created discount.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/discounts/create-discount
     */
    public function create(array $data): Discount
    {
        $responseData = $this->post(uri: '/discounts', payload: $data);

        return Discount::from($responseData);
    }

    /**
     * Lists all discount records.
     *
     * Retrieves a paginated list of all discounts associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Discount[] An array of `Discount` model instances representing the retrieved discounts.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/discounts/list-all-discounts
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/discounts', filters: $filters, options: $options);

        return Discount::fromArray($responseData);
    }

    /**
     * Retrieves a single discount record by its ID.
     *
     * Fetches the details of a specific discount based on the provided unique identifier.
     *
     * @param int $id The ID of the discount to retrieve.
     *
     * @return Discount A `Discount` model instance representing the requested discount.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., discount not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/discounts/retrieve-discount
     */
    public function find(int $id): Discount
    {
        $responseData = $this->get(uri: "/discounts/{$id}");

        return Discount::from($responseData);
    }

    /**
     * Deletes a discount record by its ID.
     *
     * Removes a specific discount based on the provided unique identifier.
     *
     * @param int $id The ID of the discount to delete.
     *
     * @return Discount A `Discount` model instance representing the result of the deletion.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., discount not found).
     *
     * @url https://docs.lemonsqueezy.com/api/discounts/delete-discount
     */
    public function delete(int $id): Discount
    {
        $responseData = $this->remove(uri: "/discounts/{$id}");

        return Discount::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific discount.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given
     * discount ID.
     *
     * @param int $discountId The ID of the discount whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., discount not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/discounts/1/store
     */
    public function store(int $discountId): Store
    {
        $responseData = $this->get(uri: "/discounts/{$discountId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves a list of variants associated with a specific discount.
     *
     * Fetches all variant records that are linked to the discount with the given ID.
     *
     * @param int $discountId The ID of the discount whose variants to retrieve.
     *
     * @return Variant[] An array of `Variant` model instances representing the associated variants.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., discount not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/discounts/1/variants
     */
    public function variants(int $discountId): array
    {
        $responseData = $this->get(uri: "/discounts/{$discountId}/variants");

        return Variant::fromArray($responseData);
    }

    /**
     * Retrieves a list of discount redemptions associated with a specific discount.
     *
     * Fetches all discount redemption records that are linked to the discount with
     * the given ID.
     *
     * @param int $discountId The ID of the discount whose redemptions to retrieve.
     *
     * @return DiscountRedemption[] An array of `DiscountRedemption` model instances
     * representing the associated redemptions.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., discount not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/discounts/1/discount-redemptions
     */
    public function discountRedemptions(int $discountId): array
    {
        $responseData = $this->get(uri: "/discounts/{$discountId}/discount-redemptions");

        return DiscountRedemption::fromArray($responseData);
    }
}
