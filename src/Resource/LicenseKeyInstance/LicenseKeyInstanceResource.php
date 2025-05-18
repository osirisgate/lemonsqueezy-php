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

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKeyInstance\LicenseKeyInstance;
use Osirisgate\Component\Lemonsqueezy\Model\Model;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * LicenseKeyInstanceResource – Management of LemonSqueezy license key instances.
 *
 * Provides methods to list and retrieve license key instances.
 * It also offers a method to fetch the associated license key for a specific instance.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class LicenseKeyInstanceResource extends Resource implements LicenseKeyInstanceResourceInterface
{
    /**
     * Lists all license key instance records.
     *
     * Retrieves a paginated list of all license key instances associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down
     * the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return LicenseKeyInstance[] An array of `LicenseKeyInstance` model instances
     * representing the retrieved license key instances.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/license-key-instances/list-all-license-key-instances
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/license-key-instances', filters: $filters, options: $options);

        return LicenseKeyInstance::fromArray($responseData);
    }

    /**
     * Retrieves a single license key instance record by its ID.
     *
     * Fetches the details of a specific license key instance based on the provided
     * unique identifier.
     *
     * @param int $id The ID of the license key instance to retrieve.
     *
     * @return LicenseKeyInstance A `LicenseKeyInstance` model instance representing
     * the requested license key instance.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key instance not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/license-key-instances/retrieve-license-key-instance
     */
    public function find(int $id): Model
    {
        $responseData = $this->get(uri: "/license-key-instances/{$id}");

        return LicenseKeyInstance::from($responseData);
    }

    /**
     * Retrieves the license key associated with a specific license key instance.
     *
     * Fetches the details of the license key that is linked to the given license
     * key instance ID.
     *
     * @param int $licenseKeyInstanceId The ID of the license key instance whose
     * license key to retrieve.
     *
     * @return LicenseKey A `LicenseKey` model instance representing the associated
     * license key.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key instance not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/license-key-instances/1/license-key
     */
    public function licenseKey(int $licenseKeyInstanceId): LicenseKey
    {
        $responseData = $this->get(uri: "/license-key-instances/{$licenseKeyInstanceId}/license-key");

        return LicenseKey::from($responseData);
    }
}
