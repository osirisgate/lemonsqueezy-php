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
 * ResumesAtTrait – Trait to handle resume date/time.
 *
 * Provides a nullable `\DateTimeInterface` property (`$resumesAt`) and getter
 * methods (`getResumesAt` and `getResumesAtAsString`) to access the timestamp
 * of when a resource is scheduled to resume. This timestamp can be retrieved
 * as a `\DateTimeInterface` object for further date/time operations or as a
 * formatted string for display. The default format for the string representation
 * is 'Y-m-d H:i:s', but this can be overridden by providing a different format
 * string to the `getResumesAtAsString` method.
 *
 * This trait is particularly useful for models that represent entities that can
 * be suspended or paused and have a scheduled time for automatic resumption,
 * such as subscriptions or service agreements. By using this trait, models can
 * consistently manage and access this resume information. The property is nullable
 * to accommodate cases where a resource is not suspended or a resume date is not set.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
trait ResumesAtTrait
{
    /**
     * @var \DateTimeInterface|null The date and time when the resource is scheduled to resume.
     */
    private ?\DateTimeInterface $resumesAt = null;

    /**
     * Returns the scheduled resume date and time as a \DateTimeInterface object.
     *
     * @return \DateTimeInterface|null The resume date and time, or null if not set.
     */
    public function getResumesAt(): ?\DateTimeInterface
    {
        return $this->resumesAt;
    }

    /**
     * Returns the scheduled resume date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted resume date and time, or null if not set.
     */
    public function getResumesAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->resumesAt?->format($format);
    }
}
