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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Subscription\SubscriptionItem;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Price\Price;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem\SubscriptionItem;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem\SubscriptionItemCurrentUsage;
use Osirisgate\Component\Lemonsqueezy\Model\UsageRecord\UsageRecord;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * SubscriptionItemResource – Handles LemonSqueezy subscription item resources.
 *
 * Provides methods to list all subscription items, retrieve a specific subscription item,
 * update subscription item details, and retrieve the current usage of a subscription item.
 * It also offers methods to fetch the associated subscription, price, and usage records.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionItemResource extends Resource implements SubscriptionItemResourceInterface
{
    /**
     * Lists all subscription item records.
     *
     * Retrieves a paginated list of all subscription items associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down
     * the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return SubscriptionItem[] An array of `SubscriptionItem` model instances
     * representing the retrieved subscription items.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/subscription-items/list-all-subscription-items
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/subscription-items', filters: $filters, options: $options);

        return SubscriptionItem::fromArray($responseData);
    }

    /**
     * Retrieves a single subscription item record by its ID.
     *
     * Fetches the details of a specific subscription item based on the provided
     * unique identifier.
     *
     * @param int $id The ID of the subscription item to retrieve.
     *
     * @return SubscriptionItem A `SubscriptionItem` model instance representing
     * the requested subscription item.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/subscription-items/retrieve-subscription-item
     */
    public function find(int $id): SubscriptionItem
    {
        $responseData = $this->get(uri: "/subscription-items/{$id}");

        return SubscriptionItem::from($responseData);
    }

    /**
     * Updates an existing subscription item record.
     *
     * Modifies the details of a specific subscription item based on the provided data.
     * Only the attributes included in the `$data` array will be updated.
     *
     * @param array{
     * type: "subscription-items",
     * id: string,
     * attributes: array{
     * quantity: int
     * }
     * } $data The subscription item data to update. The array must include the
     * subscription item's ID. Refer to the LemonSqueezy API documentation for
     * available attributes and their allowed values.
     *
     * @return SubscriptionItem A `SubscriptionItem` model instance representing
     * the updated subscription item.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data, subscription item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/subscription-items/update-subscription-item
     */
    public function update(array $data): SubscriptionItem
    {
        self::assertThatPayloadHasId($data);
        $responseData = $this->patch(uri: "/subscription-items/{$data['id']}", payload: $data);

        return SubscriptionItem::from($responseData);
    }

    /**
     * Retrieves the current usage of a specific subscription item.
     *
     * Fetches the current usage details for the subscription item with the given ID.
     * This is particularly relevant for metered billing.
     *
     * @param int $subscriptionItemId The ID of the subscription item whose current
     * usage to retrieve.
     *
     * @return SubscriptionItemCurrentUsage A `SubscriptionItemCurrentUsage` model
     * instance representing the current usage.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/subscription-items/retrieve-subscription-item-current-usage
     */
    public function currentUsage(int $subscriptionItemId): SubscriptionItemCurrentUsage
    {
        $responseData = $this->get(
            uri: "/subscription-items/{$subscriptionItemId}/current-usage",
            fieldName: 'meta',
        );

        return SubscriptionItemCurrentUsage::from($responseData);
    }

    /**
     * Retrieves the subscription associated with a specific subscription item.
     *
     * Fetches the details of the subscription that contains the subscription item
     * with the given ID.
     *
     * @param int $subscriptionItemId The ID of the subscription item whose
     * subscription to retrieve.
     *
     * @return Subscription A `Subscription` model instance representing the associated
     * subscription.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscription-items/1/subscription
     */
    public function subscription(int $subscriptionItemId): Subscription
    {
        $responseData = $this->get(uri: "/subscription-items/{$subscriptionItemId}/subscription");

        return Subscription::from($responseData);
    }

    /**
     * Retrieves the price associated with a specific subscription item.
     *
     * Fetches the details of the price that is applied to the subscription item
     * with the given ID.
     *
     * @param int $subscriptionItemId The ID of the subscription item whose price
     * to retrieve.
     *
     * @return Price A `Price` model instance representing the associated price.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscription-items/1/price
     */
    public function price(int $subscriptionItemId): Price
    {
        $responseData = $this->get(uri: "/subscription-items/{$subscriptionItemId}/price");

        return Price::from($responseData);
    }

    /**
     * Retrieves a list of usage records associated with a specific subscription item.
     *
     * Fetches all usage records that have been created for the subscription item
     * with the given ID. This is relevant for metered billing.
     *
     * @param int $subscriptionItemId The ID of the subscription item whose usage
     * records to retrieve.
     *
     * @return UsageRecord[] An array of `UsageRecord` model instances representing
     * the associated usage records.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscription-items/1/usage-records
     */
    public function usageRecords(int $subscriptionItemId): array
    {
        $responseData = $this->get(uri: "/subscription-items/{$subscriptionItemId}/usage-records");

        return UsageRecord::fromArray($responseData);
    }
}
