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

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Activate;

use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\LicenseApi;

/**
 * LicenseApiActivate – LemonSqueezy license activation response model.
 *
 * Represents the response from the LemonSqueezy API when activating a license key,
 * extending the base LicenseApi model and indicating whether the license was successfully activated.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/license-api/activate-license-key
 */
final class LicenseApiActivate extends LicenseApi
{
    /**
     * Indicates whether the license key was successfully activated.
     */
    private ?bool $activated = null;

    /**
     * Returns whether the license key was activated.
     *
     * @return bool|null True if the license was activated, false otherwise, or null if the status is not present.
     */
    public function isActivated(): ?bool
    {
        return $this->activated;
    }
}
