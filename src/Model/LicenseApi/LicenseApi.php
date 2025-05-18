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

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseApi;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\Hydrator;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * LicenseApi – Base abstract class for LemonSqueezy License API responses.
 *
 * Provides common properties and hydration logic for license key,
 * license instance, metadata, and error handling within the License API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/license-api
 */
abstract class LicenseApi
{
    use Hydrator;

    /**
     * An error message returned by the License API, if any.
     */
    protected ?string $error = null;

    /**
     * Information about the license key itself.
     */
    protected ?LicenseApiKey $licenseKey = null;

    /**
     * Information about the specific license instance being interacted with.
     */
    protected ?LicenseApiInstance $instance = null;

    /**
     * Metadata related to the API response, such as pagination details.
     */
    protected ?LicenseApiMeta $meta = null;

    /**
     * Constructor for the LicenseApi class.
     * Handles the hydration of the object with the provided data.
     *
     * @param array<string, mixed> $data The array of data to hydrate the object with.
     *
     * @throws RuntimeException If an error occurs during hydration.
     */
    protected function __construct(array $data)
    {
        try {
            $this->hydrate($data);
        } catch (\Throwable $throwable) {
            throw new RuntimeException([
                'message' => $throwable->getMessage(),
                'details' => [
                    'data' => $data,
                ],
            ]);
        }
    }

    /**
     * Static factory method to create a new instance of the LicenseApi subclass.
     *
     * @param array<string, mixed> $data The array of data to hydrate the new instance with.
     *
     * @return static A new instance of the calling class.
     *
     * @throws RuntimeException If an error occurs during hydration.
     */
    public static function from(array $data): static
    {
        return new static($data);
    }

    /**
     * Returns the error message from the API, if any.
     *
     * @return string|null The error message, or null if no error occurred.
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * Returns information about the license key.
     *
     * @return LicenseApiKey|null The license key information, or null if not present.
     */
    public function getLicenseKey(): ?LicenseApiKey
    {
        return $this->licenseKey;
    }

    /**
     * Returns information about the license instance.
     *
     * @return LicenseApiInstance|null The license instance information, or null if not present.
     */
    public function getInstance(): ?LicenseApiInstance
    {
        return $this->instance;
    }

    /**
     * Returns the metadata from the API response.
     *
     * @return LicenseApiMeta|null The metadata, or null if not present.
     */
    public function getMeta(): ?LicenseApiMeta
    {
        return $this->meta;
    }
}
