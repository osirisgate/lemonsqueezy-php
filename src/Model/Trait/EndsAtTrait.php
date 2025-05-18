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
 * EndsAtTrait – Trait to handle ends at date/time.
 *
 * Provides an `$endsAt` property (nullable `\DateTimeImmutable`) and getter
 * methods (`getEndsAt` and `getEndsAtAsString`) to access the date and time
 * when a resource is scheduled to end or expire. The date can be retrieved
 * as a `\DateTimeImmutable` object for further processing or as a formatted
 * string for display. The default format for the string representation is
 * 'Y-m-d H:i:s', but this can be customized by providing a different format
 * string to the `getEndsAtAsString` method.
 *
 * This trait is particularly useful for models representing entities with a
 * defined end time, such as subscriptions, trials, or limited-time offers,
 * promoting consistency in how end dates are handled across different parts
 * of the application.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait EndsAtTrait
{
    /**
     * @var \DateTimeImmutable|null The date and time when the resource ends.
     */
    private ?\DateTimeImmutable $endsAt = null;

    /**
     * Returns the ending date and time as a \DateTimeImmutable object.
     *
     * @return \DateTimeImmutable|null The ending date and time, or null if not set.
     */
    public function getEndsAt(): ?\DateTimeImmutable
    {
        return $this->endsAt;
    }

    /**
     * Returns the ending date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted ending date and time, or null if not set.
     */
    public function getEndsAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->endsAt?->format($format);
    }
}
