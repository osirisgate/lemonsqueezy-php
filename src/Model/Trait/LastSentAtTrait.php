<?php

/**
 * LastSentAtTrait – Trait to handle last sent date/time.
 *
 * Provides a nullable `\DateTimeImmutable` property (`$lastSentAt`) and getter
 * methods (`getLastSentAt` and `getLastSentAtAsString`) to access the timestamp
 * of when a resource was last sent. This timestamp can be retrieved as a
 * `\DateTimeImmutable` object for further date/time operations or as a formatted
 * string for display. The default format for the string representation is
 * 'Y-m-d H:i:s', but this can be overridden by providing a different format
 * string to the `getLastSentAtAsString` method.
 *
 * This trait is particularly useful for models that need to keep track of the
 * last time a specific action or communication (such as sending an email,
 * notification, or message) was performed in relation to that resource.
 * By using this trait, models can consistently manage and access this information.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
declare(strict_types=1);

namespace Osirisgate\Component\Lemonsqueezy\Model\Trait;

trait LastSentAtTrait
{
    /**
     * @var \DateTimeImmutable|null The date and time when the resource was last sent.
     */
    private ?\DateTimeImmutable $lastSentAt = null;

    /**
     * Returns the last sent date and time as a \DateTimeImmutable object.
     *
     * @return \DateTimeImmutable|null The last sent date and time, or null if not set.
     */
    public function getLastSentAt(): ?\DateTimeImmutable
    {
        return $this->lastSentAt;
    }

    /**
     * Returns the last sent date and time as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     * See the PHP manual for valid date and time formatting options.
     *
     * @return string|null The formatted last sent date and time, or null if not set.
     */
    public function getLastSentAtAsString(string $format = 'Y-m-d H:i:s'): ?string
    {
        return $this->lastSentAt?->format($format);
    }
}
