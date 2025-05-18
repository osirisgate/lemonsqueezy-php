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

namespace Osirisgate\Component\Lemonsqueezy\Resource\LicenseApi;

use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Activate\LicenseApiActivate;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Deactivate\LicenseApiDeActivate;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Validate\LicenseApiValidate;

/**
 * LicenseApiResourceInterface – LemonSqueezy API License API resource interface.
 *
 * Defines the contract for interacting with the License API endpoints of LemonSqueezy.
 * This interface provides methods for activating, deactivating, and validating
 * license keys for software products.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/license-api
 */
interface LicenseApiResourceInterface
{
    /**
     * Activates a license key for a specific instance.
     *
     * Sends a request to the LemonSqueezy API to activate a software license
     * using the provided license key and a unique name for the instance.
     *
     * @param string $licenseKey The license key to activate.
     * @param string $instanceName A unique identifier or name for the instance
     * (e.g., hostname, user ID).
     * @return LicenseApiActivate An object containing the activation result.
     */
    public function activate(string $licenseKey, string $instanceName): LicenseApiActivate;

    /**
     * Deactivates a license key for a specific instance.
     *
     * Sends a request to the LemonSqueezy API to deactivate a software license
     * for the instance identified by the given ID.
     *
     * @param string $licenseKey The license key to deactivate.
     * @param string $instanceId The unique identifier of the instance to deactivate.
     * @return LicenseApiDeActivate An object containing the deactivation result.
     */
    public function deactivate(string $licenseKey, string $instanceId): LicenseApiDeActivate;

    /**
     * Validates a license key for a specific instance.
     *
     * Sends a request to the LemonSqueezy API to validate the status of a
     * software license for the instance identified by the given ID.
     *
     * @param string $licenseKey The license key to validate.
     * @param string $instanceId The unique identifier of the instance to validate.
     * @return LicenseApiValidate An object containing the validation result.
     */
    public function validate(string $licenseKey, string $instanceId): LicenseApiValidate;
}
