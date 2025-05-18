<?php

/**
 * WebhookAttributes – Attributes data for a webhook resource.
 *
 * This class encapsulates the properties of a webhook such as the ID of the
 * associated store, the target URL where webhook events will be sent, an array
 * of subscribed event names, a flag indicating if the webhook is in test mode,
 * and timestamps for creation, last update, and the last successful event
 * delivery (using the included traits).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */

declare(strict_types=1);

namespace Osirisgate\Component\Lemonsqueezy\Model\Webhook;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\LastSentAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

final class WebhookAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use LastSentAtTrait;

    /**
     * @var int|null The ID of the store to which this webhook belongs.
     */
    private ?int $storeId = null;

    /**
     * @var string|null The URL where webhook events will be sent.
     */
    private ?string $url = null;

    /**
     * @var string[] An array of event names that this webhook is subscribed to.
     * Example events might include 'order.created', 'subscription.updated', etc.
     */
    private array $events = [];

    /**
     * @var bool|null Indicates whether this webhook is currently in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the store associated with this webhook.
     *
     * @return int|null The store ID.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the URL where webhook events will be sent.
     *
     * @return string|null The webhook URL.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Returns an array of event names that this webhook is subscribed to.
     *
     * @return string[] The array of subscribed event names.
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * Indicates whether this webhook is in test mode.
     *
     * @return bool|null True if in test mode, false otherwise.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
