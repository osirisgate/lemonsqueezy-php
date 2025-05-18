<?php

declare(strict_types=1);

namespace Osirisgate\Component\Lemonsqueezy\Resource\Webhook;

use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\CreatableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\UpdatableResourceInterface;

/**
 * WebhookResourceInterface – LemonSqueezy API webhook resource interface.
 *
 * Defines the contract for interacting with webhook resources in the LemonSqueezy API.
 * It extends interfaces for listing, retrieving single resources, creating new
 * resources, and updating existing resources. Additionally, it specifies methods
 * for deleting a webhook and fetching the associated store.
 */
interface WebhookResourceInterface extends
    ListableResourceInterface, RetrievableResourceInterface,
    CreatableResourceInterface, UpdatableResourceInterface
{
    /**
     * Deletes a specific webhook by its ID.
     *
     * @param int $id The ID of the webhook to delete.
     */
    public function delete(int $id): void;

    /**
     * Retrieves the store associated with a specific webhook.
     *
     * @param int $webhookId The ID of the webhook.
     * @return Store The associated store.
     */
    public function store(int $webhookId): Store;
}
