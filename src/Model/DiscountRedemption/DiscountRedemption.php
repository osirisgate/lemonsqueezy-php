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

namespace Osirisgate\Component\Lemonsqueezy\Model\DiscountRedemption;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * DiscountRedemption – LemonSqueezy API discount redemption model.
 *
 * Represents a discount redemption entity in the LemonSqueezy API,
 * encapsulating its attributes via the DiscountRedemptionAttributes object.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/discount-redemptions/the-discount-redemption-object
 */
final class DiscountRedemption extends Model
{
    /**
     * The attributes of the discount redemption.
     *
     * This property holds an instance of the DiscountRedemptionAttributes class,
     * which contains the detailed information about the discount redemption.
     */
    private DiscountRedemptionAttributes $attributes;

    /**
     * Returns the attributes of the discount redemption.
     *
     * This method provides access to the DiscountRedemptionAttributes object
     * associated with this DiscountRedemption instance.
     *
     * @return DiscountRedemptionAttributes The discount redemption attributes.
     */
    public function attributes(): DiscountRedemptionAttributes
    {
        return $this->attributes;
    }
}
