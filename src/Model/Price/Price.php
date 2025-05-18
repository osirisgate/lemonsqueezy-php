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

namespace Osirisgate\Component\Lemonsqueezy\Model\Price;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Price – LemonSqueezy API price model.
 *
 * Represents a price configuration within the LemonSqueezy API.
 * This model encapsulates the details of a specific price point for a product or variant.
 * It holds an instance of `PriceAttributes`, which contains the actual data
 * such as the monetary value, the currency in which it's offered, the billing
 * interval for recurring prices, and other relevant settings.
 *
 * By using this class, developers can interact with price information in a
 * structured and type-safe manner.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/prices/the-price-object
 * Refer to the LemonSqueezy API documentation for comprehensive details
 * about the price object and its available attributes.
 */
final class Price extends Model
{
    /**
     * @var PriceAttributes The attributes of this price.
     */
    private PriceAttributes $attributes;

    /**
     * Returns the attributes of this price.
     *
     * This method provides access to the `PriceAttributes` object associated
     * with this price model. The attributes contain detailed information
     * about the price configuration.
     *
     * @return PriceAttributes The attributes of the price.
     */
    public function attributes(): PriceAttributes
    {
        return $this->attributes;
    }
}
