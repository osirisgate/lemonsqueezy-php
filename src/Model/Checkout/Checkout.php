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

namespace Osirisgate\Component\Lemonsqueezy\Model\Checkout;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Checkout – LemonSqueezy API checkout model.
 *
 * Represents a Checkout entity in the LemonSqueezy API.
 * This class encapsulates the specific attributes related to a payment/checkout process
 * via the CheckoutAttributes object.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/checkouts/the-checkout-object
 */
final class Checkout extends Model
{
    /**
     * The attributes of the checkout.
     *
     * This property holds an instance of the CheckoutAttributes class,
     * which contains the detailed information about the checkout.
     */
    private CheckoutAttributes $attributes;

    /**
     * Returns the attributes of the checkout.
     *
     * This method provides access to the CheckoutAttributes object
     * associated with this Checkout instance.
     *
     * @return CheckoutAttributes The checkout attributes.
     */
    public function attributes(): CheckoutAttributes
    {
        return $this->attributes;
    }
}
