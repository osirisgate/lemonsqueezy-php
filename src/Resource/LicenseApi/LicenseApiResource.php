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

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Activate\LicenseApiActivate;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Deactivate\LicenseApiDeActivate;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseApi\Validate\LicenseApiValidate;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * LicenseApiResource – LemonSqueezy License API resource handler.
 *
 * Provides methods to activate, deactivate, and validate license keys via LemonSqueezy API.
 * This resource interacts with the `/licenses` endpoints for performing these operations.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class LicenseApiResource extends Resource implements LicenseApiResourceInterface
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
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/license-api/activate-license-key
     */
    public function activate(string $licenseKey, string $instanceName): LicenseApiActivate
    {
        $responseData = $this->post(
            uri: '/licenses/activate',
            payload: [
                'license_key' => $licenseKey,
                'instance_name' => $instanceName,
            ],
            headers: [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ]
        );

        return LicenseApiActivate::from($responseData);
    }

    /**
     * Deactivates a license key for a specific instance.
     *
     * Sends a request to the LemonSqueezy API to deactivate a software license
     * for the instance identified by the given ID.
     *
     * @param string $licenseKey The license key to deactivate.
     * @param string $instanceId The unique identifier of the instance to deactivate.
     * @return LicenseApiDeActivate An object containing the deactivation result.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request.
     *
     * @url https://docs.lemonsqueezy.com/api/license-api/deactivate-license-key
     */
    public function deactivate(string $licenseKey, string $instanceId): LicenseApiDeActivate
    {
        $responseData = $this->post(
            uri: '/licenses/deactivate',
            payload: [
                'license_key' => $licenseKey,
                'instance_id' => $instanceId,
            ],
            headers: [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ]
        );

        return LicenseApiDeActivate::from($responseData);
    }

    /**
     * Validates a license key for a specific instance.
     *
     * Sends a request to the LemonSqueezy API to validate the status of a
     * software license for the instance identified by the given ID.
     *
     * @param string $licenseKey The license key to validate.
     * @param string $instanceId The unique identifier of the instance to validate.
     * @return LicenseApiValidate An object containing the validation result.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/license-api/validate-license-key
     */
    public function validate(string $licenseKey, string $instanceId): LicenseApiValidate
    {
        $responseData = $this->post(
            uri: '/licenses/validate',
            payload: [
                'license_key' => $licenseKey,
                'instance_id' => $instanceId,
            ],
            headers: [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ]
        );

        return LicenseApiValidate::from($responseData);
    }
}
