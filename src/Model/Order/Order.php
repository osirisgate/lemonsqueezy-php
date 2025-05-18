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

namespace Osirisgate\Component\Lemonsqueezy\Model\Order;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Order – LemonSqueezy API order model.
 *
 * Represents an order entity in the LemonSqueezy API.
 * Encapsulates order-related attributes via the OrderAttributes object.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/orders/the-order-object
 */
final class Order extends Model
{
    /**
     * The attributes of the order.
     *
     * This property holds an instance of the OrderAttributes class,
     * which contains the detailed information about the order.
     */
    private OrderAttributes $attributes;

    /**
     * Returns the attributes of the order.
     *
     * This method provides access to the OrderAttributes object
     * associated with this Order instance.
     *
     * @return OrderAttributes The order attributes.
     */
    public function attributes(): OrderAttributes
    {
        return $this->attributes;
    }
}
