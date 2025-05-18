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

namespace Osirisgate\Component\Lemonsqueezy\Resource\UsageRecord;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem\SubscriptionItem;
use Osirisgate\Component\Lemonsqueezy\Model\UsageRecord\UsageRecord;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * UsageRecordResource – Handles LemonSqueezy usage record resources.
 *
 * Provides methods to create a usage record, list all usage records,
 * and retrieve a specific usage record.
 *
 * Usage records track the usage amount associated with subscription items,
 * particularly for metered billing.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class UsageRecordResource extends Resource implements UsageRecordResourceInterface
{
    /**
     * Creates a new usage record.
     *
     * Sends a request to the LemonSqueezy API to create a new usage record for a
     * specific subscription item.
     *
     * @param array{
     * type: "usage-records",
     * attributes: array{
     * quantity: int,
     * },
     * relationships: array{
     * subscription-item: array{
     * data: array{
     * type: "subscription-items",
     * id: string
     * }
     * }
     * }
     * } $data The data for the new usage record. This array must include the
     * quantity of usage and the ID of the associated subscription item.
     * Refer to the LemonSqueezy API documentation for
     * available attributes and their allowed values.
     *
     * @return UsageRecord A `UsageRecord` model instance representing the newly
     * created usage record.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data, subscription item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/usage-records/create-usage-record
     */
    public function create(array $data): UsageRecord
    {
        $responseData = $this->post(uri: '/usage-records', payload: $data);

        return UsageRecord::from($responseData);
    }

    /**
     * Lists all usage record records.
     *
     * Retrieves a paginated list of all usage records associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down
     * the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return UsageRecord[] An array of `UsageRecord` model instances representing
     * the retrieved usage records.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/usage-records/list-all-usage-records
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/usage-records', filters: $filters, options: $options);

        return UsageRecord::fromArray($responseData);
    }

    /**
     * Retrieves a single usage record by its ID.
     *
     * Fetches the details of a specific usage record based on the provided unique
     * identifier.
     *
     * @param int $id The ID of the usage record to retrieve.
     *
     * @return UsageRecord A `UsageRecord` model instance representing the requested
     * usage record.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., usage record not found).
     *
     * @url https://docs.lemonsqueezy.com/api/usage-records/retrieve-usage-record
     */
    public function find(int $id): UsageRecord
    {
        $responseData = $this->get(uri: "/usage-records/{$id}");

        return UsageRecord::from($responseData);
    }

    /**
     * Retrieves the subscription item associated with a specific usage record.
     *
     * Fetches the details of the subscription item for which the usage record
     * with the given ID was created.
     *
     * @param int $usageRecordId The ID of the usage record whose subscription
     * item to retrieve.
     *
     * @return SubscriptionItem A `SubscriptionItem` model instance representing the
     * associated subscription item.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., usage record not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/usage-records/1/subscription-item
     */
    public function subscriptionItem(int $usageRecordId): SubscriptionItem
    {
        $responseData = $this->get(uri: "/usage-records/{$usageRecordId}/subscription-item");

        return SubscriptionItem::from($responseData);
    }
}
