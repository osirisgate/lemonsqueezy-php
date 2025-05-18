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
 * CreatedAtTrait – Trait to handle created at date/time.
 *
 * Provides a `$createdAt` property (nullable `\DateTimeImmutable`) and getter
 * methods (`getCreatedAt` and `getCreatedAtAsString`) to access the creation
 * date and time of a resource. The date can be retrieved as a `\DateTimeImmutable`
 * object for further manipulation or as a formatted string for display purposes.
 * The default format for the string representation is 'Y-m-d H:i:s', but this
 * can be overridden by providing a different format string to the
 * `getCreatedAtAsString` method.
 *
 * This trait is designed to be easily included in any model that needs to
 * track the timestamp of its creation, promoting code reusability and
 * consistency across the application.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait CreatedAtTrait
{
    /**
     * @var \DateTimeImmutable|null The date and time when the resource was created.
     */
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * Returns the creation date and time as a \DateTimeImmutable object.
     *
     * @return \DateTimeImmutable|null The creation date and time, or null if not set.
     */
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Returns the creation date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted creation date and time, or null if not set.
     */
    public function getCreatedAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->createdAt?->format($format);
    }
}
