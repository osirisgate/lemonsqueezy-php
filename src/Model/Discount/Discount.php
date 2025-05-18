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

namespace Osirisgate\Component\Lemonsqueezy\Model\Discount;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Discount – LemonSqueezy API discount model.
 *
 * Represents a Discount entity in the LemonSqueezy API.
 * This class encapsulates discount-specific attributes via the DiscountAttributes object.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/discounts/the-discount-object
 */
final class Discount extends Model
{
    /**
     * The attributes of the discount.
     *
     * This property holds an instance of the DiscountAttributes class,
     * which contains the detailed information about the discount.
     */
    private DiscountAttributes $attributes;

    /**
     * Returns the attributes of the discount.
     *
     * This method provides access to the DiscountAttributes object
     * associated with this Discount instance.
     *
     * @return DiscountAttributes The discount attributes.
     */
    public function attributes(): DiscountAttributes
    {
        return $this->attributes;
    }
}
