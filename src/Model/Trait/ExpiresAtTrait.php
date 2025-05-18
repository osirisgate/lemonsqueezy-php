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

namespace Osirisgate\Component\Lemonsqueezy\Model\Trait;

/**
 * ExpiresAtTrait – Trait to handle expiration date/time.
 *
 * Provides an `$expiresAt` property (nullable `\DateTimeInterface`) and getter
 * methods (`getExpiresAt` and `getExpiresAtAsString`) to access the date and time
 * when a resource is set to expire. The date can be retrieved as a `\DateTimeInterface`
 * object for further processing or as a formatted string for display. The default
 * format for the string representation is 'Y-m-d H:i:s', but this can be customized
 * by providing a different format string to the `getExpiresAtAsString` method.
 *
 * This trait is particularly useful for models representing entities with a
 * defined expiration time, such as licenses, tokens, or temporary access,
 * promoting consistency in how expiration dates are handled across different
 * parts of the application. The property is nullable to accommodate cases where
 * an expiration date might not always be present or known.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait ExpiresAtTrait
{
    /**
     * @var \DateTimeInterface|null The date and time when the resource expires.
     */
    private ?\DateTimeInterface $expiresAt = null;

    /**
     * Returns the expiration date and time as a \DateTimeInterface object.
     *
     * @return \DateTimeInterface|null The expiration date and time, or null if not set.
     */
    public function getExpiresAt(): ?\DateTimeInterface
    {
        return $this->expiresAt;
    }

    /**
     * Returns the expiration date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted expiration date and time, or null if not set.
     */
    public function getExpiresAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->expiresAt?->format($format);
    }
}
