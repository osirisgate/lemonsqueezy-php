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

namespace Osirisgate\Component\Lemonsqueezy\Model\Customer;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Customer – LemonSqueezy API customer model.
 *
 * A customer object represents a customer of your store.
 * It is created when they purchase a product for the first time.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class Customer extends Model
{
    /**
     * The attributes of the customer.
     *
     * This property holds an instance of the CustomerAttributes class,
     * which contains the detailed information about the customer.
     */
    private CustomerAttributes $attributes;

    /**
     * Returns the attributes of the customer.
     *
     * This method provides access to the CustomerAttributes object
     * associated with this Customer instance.
     *
     * @return CustomerAttributes The customer attributes.
     */
    public function attributes(): CustomerAttributes
    {
        return $this->attributes;
    }
}
