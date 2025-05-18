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

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseKey;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * LicenseKey – LemonSqueezy API license key model.
 *
 * Represents a license key entity from the LemonSqueezy API,
 * encapsulating its attributes via the LicenseKeyAttributes object.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/license-keys/the-license-key-object
 */
final class LicenseKey extends Model
{
    /**
     * The attributes of the license key.
     *
     * This property holds an instance of the LicenseKeyAttributes class,
     * which contains the detailed information about the license key.
     */
    private LicenseKeyAttributes $attributes;

    /**
     * Returns the attributes of the license key.
     *
     * This method provides access to the LicenseKeyAttributes object
     * associated with this LicenseKey instance.
     *
     * @return LicenseKeyAttributes The license key attributes.
     */
    public function attributes(): LicenseKeyAttributes
    {
        return $this->attributes;
    }
}
