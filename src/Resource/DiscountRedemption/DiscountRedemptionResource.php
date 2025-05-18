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

namespace Osirisgate\Component\Lemonsqueezy\Resource\DiscountRedemption;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Discount\Discount;
use Osirisgate\Component\Lemonsqueezy\Model\DiscountRedemption\DiscountRedemption;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * DiscountRedemptionResource – LemonSqueezy API discount redemption resource handler.
 *
 * Provides methods to list and retrieve discount redemption records from the LemonSqueezy API.
 * This resource supports listing all redemptions and retrieving a single redemption by ID.
 * It also offers methods to fetch the associated discount and order for a specific
 * discount redemption.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class DiscountRedemptionResource extends Resource implements DiscountRedemptionResourceInterface
{
    /**
     * Lists all discount redemption records.
     *
     * Retrieves a paginated list of all discount redemptions associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return DiscountRedemption[] An array of `DiscountRedemption` model instances
     * representing the retrieved discount redemptions.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/discount-redemptions/list-all-discount-redemptions
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/discount-redemptions', filters: $filters, options: $options);

        return DiscountRedemption::fromArray($responseData);
    }

    /**
     * Retrieves a single discount redemption record by its ID.
     *
     * Fetches the details of a specific discount redemption based on the provided
     * unique identifier.
     *
     * @param int $id The ID of the discount redemption to retrieve.
     *
     * @return DiscountRedemption A `DiscountRedemption` model instance representing
     * the requested discount redemption.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., discount redemption not found).
     *
     * @url https://docs.lemonsqueezy.com/api/discount-redemptions/retrieve-discount-redemption
     */
    public function find(int $id): DiscountRedemption
    {
        $responseData = $this->get(uri: '/discount-redemptions/' . $id);

        return DiscountRedemption::from($responseData);
    }

    /**
     * Retrieves the discount associated with a specific discount redemption.
     *
     * Fetches the details of the discount that is linked to the given discount
     * redemption ID.
     *
     * @param int $discountRedemptionId The ID of the discount redemption whose
     * discount to retrieve.
     *
     * @return Discount A `Discount` model instance representing the associated discount.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., discount redemption not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/discount-redemptions/1/discount
     */
    public function discount(int $discountRedemptionId): Discount
    {
        $responseData = $this->get(uri: "/discount-redemptions/{$discountRedemptionId}/discount");

        return Discount::from($responseData);
    }

    /**
     * Retrieves the order associated with a specific discount redemption.
     *
     * Fetches the details of the order that is linked to the given discount
     * redemption ID.
     *
     * @param int $discountRedemptionId The ID of the discount redemption whose
     * order to retrieve.
     *
     * @return Order An `Order` model instance representing the associated order.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., discount redemption not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/discount-redemptions/1/order
     */
    public function order(int $discountRedemptionId): Order
    {
        $responseData = $this->get(uri: "/discount-redemptions/{$discountRedemptionId}/order");

        return Order::from($responseData);
    }
}
