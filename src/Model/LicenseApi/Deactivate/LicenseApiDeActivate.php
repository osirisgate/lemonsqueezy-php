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

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Deactivate;

use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\LicenseApi;

/**
 * LicenseApiDeActivate – LemonSqueezy license deactivation response model.
 *
 * Represents the response from the LemonSqueezy API when deactivating a license key,
 * extending the base LicenseApi model and indicating whether the license was successfully deactivated.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/license-api/deactivate-license-key
 */
final class LicenseApiDeActivate extends LicenseApi
{
    /**
     * Indicates whether the license key was successfully deactivated.
     */
    private ?bool $deactivated = null;

    /**
     * Returns whether the license key was deactivated.
     *
     * @return bool|null True if the license was deactivated, false otherwise, or null if the status is not present.
     */
    public function isDeactivated(): ?bool
    {
        return $this->deactivated;
    }
}
