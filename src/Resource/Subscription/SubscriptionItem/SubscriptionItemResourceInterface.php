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

use Osirisgate\Component\Lemonsqueezy\Model\Price\Price;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem\SubscriptionItemCurrentUsage;
use Osirisgate\Component\Lemonsqueezy\Model\UsageRecord\UsageRecord;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\UpdatableResourceInterface;

/**
 * SubscriptionItemResourceInterface – LemonSqueezy API subscription item resource interface.
 *
 * Defines the contract for interacting with subscription item resources in the
 * LemonSqueezy API. It extends interfaces for listing, retrieving single resources,
 * and updating existing resources. Additionally, it specifies methods for fetching
 * the current usage, associated subscription, price, and usage records for a given
 * subscription item.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/subscription-items
 */
interface SubscriptionItemResourceInterface extends ListableResourceInterface, RetrievableResourceInterface, UpdatableResourceInterface
{
    /**
     * Retrieves the current usage of a specific subscription item.
     *
     * @param int $subscriptionItemId The ID of the subscription item.
     * @return SubscriptionItemCurrentUsage The current usage details.
     */
    public function currentUsage(int $subscriptionItemId): SubscriptionItemCurrentUsage;

    /**
     * Retrieves the subscription associated with a specific subscription item.
     *
     * @param int $subscriptionItemId The ID of the subscription item.
     * @return Subscription The associated subscription.
     */
    public function subscription(int $subscriptionItemId): Subscription;

    /**
     * Retrieves the price associated with a specific subscription item.
     *
     * @param int $subscriptionItemId The ID of the subscription item.
     * @return Price The associated price.
     */
    public function price(int $subscriptionItemId): Price;

    /**
     * Retrieves a list of usage records associated with a specific subscription item.
     *
     * @param int $subscriptionItemId The ID of the subscription item.
     * @return UsageRecord[] An array of associated usage records.
     */
    public function usageRecords(int $subscriptionItemId): array;
}
