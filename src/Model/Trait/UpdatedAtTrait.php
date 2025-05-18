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
 * UpdatedAtTrait – Trait to handle update timestamp.
 *
 * Provides a nullable `\DateTimeInterface` property (`$updatedAt`) and getter
 * methods (`getUpdatedAt` and `getUpdatedAtAsString`) to access the timestamp
 * of when a resource was last updated. This timestamp can be retrieved as a
 * `\DateTimeInterface` object for further date/time operations or as a
 * formatted string for display. The default format for the string representation
 * is 'Y-m-d H:i:s', but this can be overridden by providing a different format
 * string to the `getUpdatedAtAsString` method.
 *
 * This trait is commonly used in models that represent database entities or
 * other data structures where tracking the last modification time is important
 * for auditing, caching, or synchronization purposes. By using this trait,
 * models can consistently manage and access this update information. The
 * property is nullable to accommodate cases where a resource has not yet been
 * updated since its creation.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait UpdatedAtTrait
{
    /**
     * @var \DateTimeInterface|null The date and time when the resource was last updated.
     */
    private ?\DateTimeInterface $updatedAt = null;

    /**
     * Returns the last updated date and time as a \DateTimeInterface object.
     *
     * @return \DateTimeInterface|null The last updated date and time, or null if not set.
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Returns the last updated date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted last updated date and time, or null if not set.
     */
    public function getUpdatedAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->updatedAt?->format($format);
    }
}
