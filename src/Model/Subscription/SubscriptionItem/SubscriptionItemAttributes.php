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

namespace Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * SubscriptionItemAttributes – LemonSqueezy API subscription item attributes model.
 *
 * Represents the specific details and properties of an individual item within
 * a LemonSqueezy subscription. This class encapsulates information such as the
 * identifier of the parent subscription, the identifier of the price associated
 * with this item, the quantity of this item in the subscription, and a boolean
 * flag indicating whether the billing for this item is usage-based.
 *
 * It utilizes traits for managing timestamp-related attributes (created at
 * and updated at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionItemAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * @var int|null The ID of the subscription this item belongs to.
     */
    private ?int $subscriptionId = null;

    /**
     * @var int|null The ID of the price associated with this subscription item.
     */
    private ?int $priceId = null;

    /**
     * @var int|null The quantity of this item in the subscription.
     */
    private ?int $quantity = null;

    /**
     * @var bool|null Indicates whether the billing for this subscription item is based on usage.
     */
    private ?bool $isUsageBased = null;

    /**
     * Returns the ID of the subscription this item belongs to.
     *
     * @return int|null The subscription ID.
     */
    public function getSubscriptionId(): ?int
    {
        return $this->subscriptionId;
    }

    /**
     * Returns the ID of the price associated with this subscription item.
     *
     * @return int|null The price ID.
     */
    public function getPriceId(): ?int
    {
        return $this->priceId;
    }

    /**
     * Returns the quantity of this item in the subscription.
     *
     * @return int|null The quantity.
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Indicates whether the billing for this subscription item is based on usage.
     *
     * @return bool|null True if usage-based billing is enabled, false otherwise.
     */
    public function isUsageBased(): ?bool
    {
        return $this->isUsageBased;
    }
}
