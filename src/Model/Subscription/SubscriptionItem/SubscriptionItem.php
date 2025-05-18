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

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * SubscriptionItem – LemonSqueezy API subscription item model.
 *
 * Represents a single item that is part of a customer's subscription in
 * the LemonSqueezy API. This model holds the details for each product
 * variant included in the subscription, such as the associated price,
 * the quantity of the item, and other relevant information.
 *
 * This class acts as a container for the `SubscriptionItemAttributes`,
 * providing a structured way to access the specific properties of each
 * item within a subscription as returned by the LemonSqueezy API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/subscription-items/the-subscription-item-object
 * Refer to the LemonSqueezy API documentation for detailed information
 * about the subscription item object and its attributes.
 */
final class SubscriptionItem extends Model
{
    /**
     * @var SubscriptionItemAttributes The attributes of this subscription item.
     */
    private SubscriptionItemAttributes $attributes;

    /**
     * Returns the attributes of this subscription item.
     *
     * This method provides access to the `SubscriptionItemAttributes` object,
     * which contains all the specific details and properties of this individual
     * item within the subscription.
     *
     * @return SubscriptionItemAttributes The attributes of the subscription item.
     */
    public function attributes(): SubscriptionItemAttributes
    {
        return $this->attributes;
    }
}
