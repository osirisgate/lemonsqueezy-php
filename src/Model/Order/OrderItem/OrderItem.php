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

namespace Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * OrderItem – LemonSqueezy API order item model.
 *
 * Represents a single item that was included in a LemonSqueezy order.
 * This class acts as a model to hold the detailed information about an
 * individual product or service line within an order. It primarily contains
 * an instance of `OrderItemAttributes`, which stores the specific properties
 * of this order item.
 *
 * By encapsulating the attributes within this model, it provides a structured
 * way to access and manage the data related to each item in an order retrieved
 * from the LemonSqueezy API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/order-items/the-order-item-object
 * Refer to the LemonSqueezy API documentation for detailed information
 * about the order item object and its attributes.
 */
final class OrderItem extends Model
{
    /**
     * @var OrderItemAttributes The attributes of this order item.
     */
    private OrderItemAttributes $attributes;

    /**
     * Returns the attributes of this order item.
     *
     * This method provides access to the `OrderItemAttributes` object,
     * which contains all the specific details and properties of this
     * individual item within the order.
     *
     * @return OrderItemAttributes The attributes of the order item.
     */
    public function attributes(): OrderItemAttributes
    {
        return $this->attributes;
    }
}
