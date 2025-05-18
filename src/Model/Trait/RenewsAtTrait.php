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
 * RenewsAtTrait – Trait to handle renewal date/time.
 *
 * Provides a nullable `\DateTimeImmutable` property (`$renewsAt`) and getter
 * methods (`getRenewsAt` and `getRenewsAtAsString`) to access the timestamp
 * of when a resource is scheduled to renew. This timestamp can be retrieved
 * as a `\DateTimeImmutable` object for further date/time operations or as a
 * formatted string for display. The default format for the string representation
 * is 'Y-m-d H:i:s', but this can be overridden by providing a different format
 * string to the `getRenewsAtAsString` method.
 *
 * This trait is particularly useful for models that represent recurring entities
 * such as subscriptions or licenses, where tracking the next renewal date is
 * essential. By using this trait, models can consistently manage and access
 * this renewal information. The property is nullable to accommodate cases where
 * a resource does not automatically renew or the renewal date is not yet set.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait RenewsAtTrait
{
    /**
     * @var \DateTimeImmutable|null The date and time when the resource is scheduled to renew.
     */
    private ?\DateTimeImmutable $renewsAt = null;

    /**
     * Returns the renewal date and time as a \DateTimeImmutable object.
     *
     * @return \DateTimeImmutable|null The renewal date and time, or null if not set.
     */
    public function getRenewsAt(): ?\DateTimeImmutable
    {
        return $this->renewsAt;
    }

    /**
     * Returns the renewal date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted renewal date and time, or null if not set.
     */
    public function getRenewsAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->renewsAt?->format($format);
    }
}
