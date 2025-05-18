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

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Validate;

use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\LicenseApi;

/**
 * LicenseApiValidate – LemonSqueezy license validation response model.
 *
 * Represents the response from the LemonSqueezy API when validating a license key,
 * extending the base LicenseApi model and indicating whether the license is valid.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/license-api/validate-license-key
 */
final class LicenseApiValidate extends LicenseApi
{
    /**
     * Indicates whether the license key is valid.
     */
    private ?bool $valid = null;

    /**
     * Returns whether the license key is valid.
     *
     * @return bool|null True if the license is valid, false otherwise, or null if the validation status is not present.
     */
    public function isValid(): ?bool
    {
        return $this->valid;
    }
}
