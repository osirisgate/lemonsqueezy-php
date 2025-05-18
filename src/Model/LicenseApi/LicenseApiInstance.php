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

/**
 * LicenseApiInstance – LemonSqueezy API license instance model.
 *
 * Represents a license instance entity in the LemonSqueezy API,
 * encapsulating its ID, name, and creation timestamp.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class LicenseApiInstance
{
    use CreatedAtTrait;

    /**
     * The unique identifier of the license instance.
     */
    private ?int $id = null;

    /**
     * The name or identifier given to this specific license instance.
     */
    private ?string $name = null;

    /**
     * Returns the ID of the license instance.
     *
     * @return int|null The license instance ID, or null if not set.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Returns the name of the license instance.
     *
     * @return string|null The license instance name, or null if not set.
     */
    public function getName(): ?string
    {
        return $this->name;
    }
}
