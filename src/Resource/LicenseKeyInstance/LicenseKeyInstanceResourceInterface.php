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

namespace Osirisgate\Component\Lemonsqueezy\Resource\LicenseKeyInstance;

use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * LicenseKeyInstanceResourceInterface – LemonSqueezy API license key instance resource interface.
 *
 * Defines the contract for interacting with license key instance resources in the
 * LemonSqueezy API. It extends interfaces for listing and retrieving single resources.
 * Additionally, it specifies a method for fetching the associated license key for
 * a given license key instance.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface LicenseKeyInstanceResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface
{
    /**
     * Retrieves the license key associated with a specific license key instance.
     *
     * @param int $licenseKeyInstanceId The ID of the license key instance.
     * @return LicenseKey The associated license key.
     */
    public function licenseKey(int $licenseKeyInstanceId): LicenseKey;
}
