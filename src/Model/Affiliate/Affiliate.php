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

namespace Osirisgate\Component\Lemonsqueezy\Model\Affiliate;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Represents an Affiliate entity from the LemonSqueezy API.
 *
 * This class encapsulates the data for an affiliate as defined by the
 * LemonSqueezy API. It holds the affiliate's specific details within an
 * {@see AffiliateAttributes} object. This class extends the base {@see Model}
 * class, inheriting common model functionalities.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @see AffiliateAttributes For the detailed structure of the affiliate's attributes.
 * @see https://docs.lemonsqueezy.com/api/affiliates/the-affiliate-object LemonSqueezy API Documentation for the Affiliate Object.
 */
final class Affiliate extends Model
{
    /**
     * The attributes of the affiliate.
     */
    private AffiliateAttributes $attributes;

    /**
     * Retrieves the attributes of the affiliate.
     *
     * This method returns an {@see AffiliateAttributes} object, which contains
     * all the specific details and properties associated with this affiliate.
     *
     * @return AffiliateAttributes The attributes of the affiliate.
     */
    public function attributes(): AffiliateAttributes
    {
        return $this->attributes;
    }
}
