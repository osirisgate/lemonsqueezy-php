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
 * RefundedAtTrait – Trait to handle refunded date/time.
 *
 * Provides a nullable `\DateTimeInterface` property (`$refundedAt`) and getter
 * methods (`getRefundedAt` and `getRefundedAtAsString`) to access the timestamp
 * of when a resource was refunded. This timestamp can be retrieved as a
 * `\DateTimeInterface` object for further date/time operations or as a formatted
 * string for display. The default format for the string representation is
 * 'Y-m-d H:i:s', but this can be overridden by providing a different format
 * string to the `getRefundedAtAsString` method.
 *
 * This trait is particularly useful for models that need to track the date and
 * time when a refund was processed, such as order or invoice models. By using
 * this trait, models can consistently manage and access this refund information.
 * The property is nullable to accommodate cases where a resource has not been
 * refunded.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait RefundedAtTrait
{
    /**
     * @var \DateTimeInterface|null The date and time when the resource was refunded.
     */
    private ?\DateTimeInterface $refundedAt = null;

    /**
     * Returns the refunded date and time as a \DateTimeInterface object.
     *
     * @return \DateTimeInterface|null The refunded date and time, or null if not set.
     */
    public function getRefundedAt(): ?\DateTimeInterface
    {
        return $this->refundedAt;
    }

    /**
     * Returns the refunded date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted refunded date and time, or null if not set.
     */
    public function getRefundedAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->refundedAt?->format($format);
    }
}
