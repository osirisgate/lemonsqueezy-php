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

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\ExpiresAtTrait;

/**
 * LicenseApiKey – LemonSqueezy API license key model.
 *
 * Represents a license key entity in the LemonSqueezy API,
 * encapsulating its ID, status, key string, activation limits,
 * and timestamps for creation and expiration.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class LicenseApiKey
{
    use CreatedAtTrait;
    use ExpiresAtTrait;

    /**
     * The unique identifier of the license key.
     */
    private ?int $id = null;

    /**
     * The current status of the license key (e.g., 'active', 'inactive').
     */
    private ?string $status = null;

    /**
     * The actual license key string.
     */
    private ?string $key = null;

    /**
     * The maximum number of times this license key can be activated.
     */
    private ?int $activationLimit = null;

    /**
     * The number of times this license key has been activated.
     */
    private ?int $activationUsage = null;

    /**
     * Returns the ID of the license key.
     *
     * @return int|null The license key ID, or null if not set.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Returns the status of the license key.
     *
     * @return string|null The license key status, or null if not set.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns the license key string.
     *
     * @return string|null The license key, or null if not set.
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Returns the activation limit for the license key.
     *
     * @return int|null The activation limit, or null if not set.
     */
    public function getActivationLimit(): ?int
    {
        return $this->activationLimit;
    }

    /**
     * Returns the current activation usage of the license key.
     *
     * @return int|null The activation usage count, or null if not set.
     */
    public function getActivationUsage(): ?int
    {
        return $this->activationUsage;
    }
}
