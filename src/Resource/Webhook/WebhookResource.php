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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Webhook;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Webhook\Webhook;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * WebhookResource – Manages LemonSqueezy webhook resources.
 *
 * Provides methods to create, retrieve, update, delete, and list webhooks.
 * Webhooks allow your application to receive notifications about events from LemonSqueezy stores.
 * It also offers a method to fetch the associated store for a given webhook.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class WebhookResource extends Resource implements WebhookResourceInterface
{
    /**
     * Creates a new webhook.
     *
     * Sends a request to the LemonSqueezy API to create a new webhook with the
     * specified configuration.
     *
     * @param array{
     * type: 'webhooks',
     * attributes: array{
     * url: string,
     * events: list<string>,
     * secret?: string
     * },
     * relationships: array{
     * store: array{type: 'stores', id: string}
     * }
     * } $data The webhook configuration to create. This array must include the
     * URL where notifications should be sent, the list of events to subscribe to,
     * and the ID of the associated store. An optional secret key can also be provided.
     * Refer to the LemonSqueezy API documentation for
     * available attributes and their allowed values.
     *
     * @return Webhook A `Webhook` model instance representing the newly created webhook.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data, store not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/webhooks/create-webhook
     */
    public function create(array $data): Webhook
    {
        $responseData = $this->post(uri: '/webhooks', payload: $data);

        return Webhook::from($responseData);
    }

    /**
     * Deletes a specific webhook by its ID.
     *
     * Sends a request to the LemonSqueezy API to delete the webhook with the
     * given ID.
     *
     * @param int $id The ID of the webhook to delete.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., webhook not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/webhooks/delete-webhook
     */
    public function delete(int $id): void
    {
        $this->remove(uri: "/webhooks/{$id}");
    }

    /**
     * Lists all webhook records.
     *
     * Retrieves a paginated list of all webhooks associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Webhook[] An array of `Webhook` model instances representing the
     * retrieved webhooks.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/webhooks/list-all-webhooks
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/webhooks', filters: $filters, options: $options);

        return Webhook::fromArray($responseData);
    }

    /**
     * Retrieves a single webhook record by its ID.
     *
     * Fetches the details of a specific webhook based on the provided unique
     * identifier.
     *
     * @param int $id The ID of the webhook to retrieve.
     *
     * @return Webhook A `Webhook` model instance representing the requested webhook.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., webhook not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/webhooks/retrieve-webhook
     */
    public function find(int $id): Webhook
    {
        $responseData = $this->get(uri: "/webhooks/{$id}");

        return Webhook::from($responseData);
    }

    /**
     * Updates an existing webhook record.
     *
     * Modifies the details of a specific webhook based on the provided data.
     * Only the attributes included in the `$data` array will be updated.
     *
     * @param array{
     * type: 'webhooks',
     * id: string,
     * attributes: array{
     * store_id?: int,
     * url?: string,
     * events?: list<string>,
     * secret?: string
     * }
     * } $data The webhook data to update. The array must include the webhook's
     * ID. You can optionally update the store ID, URL, subscribed events, or secret key.
     * Refer to the LemonSqueezy API documentation for
     * available attributes and their allowed values.
     *
     * @return Webhook A `Webhook` model instance representing the updated webhook.
     *
     * @throws RuntimeException If the provided payload does not contain the 'id' for the update.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data, webhook not found).
     *
     * @url https://docs.lemonsqueezy.com/api/webhooks/update-webhook
     */
    public function update(array $data): Webhook
    {
        self::assertThatPayloadHasId($data);
        $responseData = $this->patch(uri: "/webhooks/{$data['id']}", payload: $data);

        return Webhook::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific webhook.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the webhook
     * with the given ID.
     *
     * @param int $webhookId The ID of the webhook whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., webhook not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/webhooks/1/store
     */
    public function store(int $webhookId): Store
    {
        $responseData = $this->get(uri: "/webhooks/{$webhookId}/store");

        return Store::from($responseData);
    }
}
