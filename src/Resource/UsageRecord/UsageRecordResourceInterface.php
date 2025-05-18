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

use Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem\SubscriptionItem;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\CreatableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * UsageRecordResourceInterface – LemonSqueezy API usage record resource interface.
 *
 * Defines the contract for interacting with usage record resources in the
 * LemonSqueezy API. It extends interfaces for listing, retrieving single resources,
 * and creating new resources. Additionally, it specifies a method for fetching
 * the associated subscription item for a given usage record.
 *
 * Usage records track the usage amount associated with subscription items,
 * particularly for metered billing.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface UsageRecordResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface,
    CreatableResourceInterface
{
    /**
     * Retrieves the subscription item associated with a specific usage record.
     *
     * @param int $usageRecordId The ID of the usage record.
     * @return SubscriptionItem The associated subscription item.
     */
    public function subscriptionItem(int $usageRecordId): SubscriptionItem;
}
