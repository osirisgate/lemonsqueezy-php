<?php

/**
 * LicenseKeyInstanceAttributes – LemonSqueezy API license key instance attributes model.
 *
 * Encapsulates the attributes of a license key instance, representing a single activation
 * or usage of a license key within the LemonSqueezy API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */

declare(strict_types=1);

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseKeyInstance;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

final class LicenseKeyInstanceAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * The ID of the license key this instance belongs to.
     */
    private ?int $licenseKeyId = null;

    /**
     * A unique identifier for this specific instance (e.g., a machine ID or hostname).
     */
    private ?string $identifier = null;

    /**
     * A human-readable name or description for this instance (e.g., "Work Computer", "v1.0.1").
     */
    private ?string $name = null;

    /**
     * Returns the ID of the license key.
     *
     * @return int|null The license key ID, or null if not set.
     */
    public function getLicenseKeyId(): ?int
    {
        return $this->licenseKeyId;
    }

    /**
     * Returns the unique identifier of the instance.
     *
     * @return string|null The instance identifier, or null if not set.
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * Returns the name of the instance.
     *
     * @return string|null The instance name, or null if not set.
     */
    public function getName(): ?string
    {
        return $this->name;
    }
}
