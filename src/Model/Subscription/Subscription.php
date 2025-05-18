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

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Subscription – LemonSqueezy API subscription model.
 *
 * Represents a subscription entity within the LemonSqueezy API.
 * A subscription is a recurring payment agreement between a customer and a merchant.
 * This class acts as a container for the detailed attributes of a subscription,
 * which are accessible through the `SubscriptionAttributes` object. These attributes
 * include information about the customer, the status of the subscription, billing
 * details, payment methods, associated items, and important dates.
 *
 * By using this model, developers can interact with subscription data in a structured
 * and type-safe manner, facilitating the retrieval and management of subscription
 * information from the LemonSqueezy API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/subscriptions/the-subscription-object
 * Refer to the LemonSqueezy API documentation for comprehensive details
 * about the subscription object and its associated attributes.
 */
final class Subscription extends Model
{
    /**
     * @var SubscriptionAttributes The attributes of this subscription.
     */
    private SubscriptionAttributes $attributes;

    /**
     * Returns the attributes of this subscription.
     *
     * This method provides access to the `SubscriptionAttributes` object, which
     * contains all the specific details and properties of this subscription
     * as retrieved from the LemonSqueezy API.
     *
     * @return SubscriptionAttributes The attributes of the subscription.
     */
    public function attributes(): SubscriptionAttributes
    {
        return $this->attributes;
    }
}
