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

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseKeyInstance;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * LicenseKeyInstance – LemonSqueezy API license key instance model.
 *
 * Represents a single activation (instance) of a license key in the LemonSqueezy API,
 * encapsulating its attributes via the LicenseKeyInstanceAttributes object.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/license-key-instances/the-license-key-instance-object
 */
final class LicenseKeyInstance extends Model
{
    /**
     * The attributes of the license key instance.
     *
     * This property holds an instance of the LicenseKeyInstanceAttributes class,
     * which contains the detailed information about the license key instance.
     */
    private LicenseKeyInstanceAttributes $attributes;

    /**
     * Returns the attributes of the license key instance.
     *
     * This method provides access to the LicenseKeyInstanceAttributes object
     * associated with this LicenseKeyInstance instance.
     *
     * @return LicenseKeyInstanceAttributes The license key instance attributes.
     */
    public function attributes(): LicenseKeyInstanceAttributes
    {
        return $this->attributes;
    }
}
