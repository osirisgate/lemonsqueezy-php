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
 * StartsAtTrait – Trait to handle start date/time.
 *
 * Provides a nullable `\DateTimeImmutable` property (`$startsAt`) and getter
 * methods (`getStartsAt` and `getStartsAtAsString`) to access the timestamp
 * of when a resource begins. This timestamp can be retrieved as a
 * `\DateTimeImmutable` object for further date/time operations or as a
 * formatted string for display. The default format for the string representation
 * is 'Y-m-d H:i:s', but this can be overridden by providing a different format
 * string to the `getStartsAtAsString` method.
 *
 * This trait is particularly useful for models that represent entities with a
 * defined start time, such as subscriptions, events, trials, or access periods.
 * By using this trait, models can consistently manage and access this start
 * information. The property is nullable to accommodate cases where a start
 * date is not immediately known or applicable.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait StartsAtTrait
{
    /**
     * @var \DateTimeImmutable|null The date and time when the resource starts.
     */
    private ?\DateTimeImmutable $startsAt = null;

    /**
     * Returns the start date and time as a \DateTimeImmutable object.
     *
     * @return \DateTimeImmutable|null The start date and time, or null if not set.
     */
    public function getStartsAt(): ?\DateTimeImmutable
    {
        return $this->startsAt;
    }

    /**
     * Returns the start date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted start date and time, or null if not set.
     */
    public function getStartsAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->startsAt?->format($format);
    }
}
