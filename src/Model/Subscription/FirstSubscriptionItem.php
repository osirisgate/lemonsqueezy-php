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

namespace Osirisgate\Component\Lemonsqueezy\Model\Subscription;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * FirstSubscriptionItem – LemonSqueezy API first subscription item model.
 *
 * Represents the details of the first item associated with a subscription
 * in the LemonSqueezy API. This class encapsulates key information about
 * this initial subscription item, including its unique identifier, the ID
 * of the subscription it belongs to, the ID of the price applied to this item,
 * and the quantity of this item in the subscription.
 *
 * It utilizes traits for managing timestamp-related attributes (created at
 * and updated at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class FirstSubscriptionItem
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * @var int|null The unique identifier of this subscription item.
     */
    private ?int $id = null;

    /**
     * @var int|null The ID of the subscription that this item is part of.
     */
    private ?int $subscriptionId = null;

    /**
     * @var int|null The ID of the price configuration applied to this subscription item.
     */
    private ?int $priceId = null;

    /**
     * @var int|null The quantity of this item in the subscription.
     */
    private ?int $quantity = null;

    /**
     * Returns the unique identifier of this subscription item.
     *
     * @return int|null The subscription item ID.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Returns the ID of the subscription that this item belongs to.
     *
     * @return int|null The subscription ID.
     */
    public function getSubscriptionId(): ?int
    {
        return $this->subscriptionId;
    }

    /**
     * Returns the ID of the price configuration applied to this subscription item.
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
}
