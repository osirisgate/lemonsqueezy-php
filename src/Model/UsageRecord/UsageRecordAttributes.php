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

namespace Osirisgate\Component\Lemonsqueezy\Model\UsageRecord;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * UsageRecordAttributes – Attributes of a usage record.
 *
 * This class encapsulates the specific details and properties of a usage
 * record as returned by the LemonSqueezy API. It includes information such
 * as the identifier of the subscription item for which the usage was recorded,
 * the quantity of usage consumed, and the action that triggered the usage
 * record (e.g., 'increment', 'set'). It also utilizes traits for managing
 * timestamp-related attributes (created at and updated at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class UsageRecordAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * @var int|null The ID of the subscription item to which this usage record belongs.
     */
    private ?int $subscriptionItemId = null;

    /**
     * @var int|null The quantity of usage recorded.
     */
    private ?int $quantity = null;

    /**
     * @var string|null The action that resulted in this usage record (e.g., 'increment', 'set').
     */
    private ?string $action = null;

    /**
     * Returns the ID of the subscription item associated with this usage record.
     *
     * @return int|null The subscription item ID.
     */
    public function getSubscriptionItemId(): ?int
    {
        return $this->subscriptionItemId;
    }

    /**
     * Returns the quantity of usage recorded.
     *
     * @return int|null The usage quantity.
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Returns the action that resulted in this usage record.
     *
     * @return string|null The usage action.
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
}
