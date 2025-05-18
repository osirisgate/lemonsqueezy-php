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

namespace Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\Hydrator;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * SubscriptionItemCurrentUsage – LemonSqueezy API subscription item current usage model.
 *
 * Represents the current usage details for a specific item within a
 * LemonSqueezy subscription. This class holds information about the
 * amount of usage recorded, the unit and quantity of the billing interval
 * for usage tracking, and the start and end dates of the current billing period.
 *
 * It utilizes the `Hydrator` trait to populate its properties from an array
 * of API data and includes error handling during the hydration process.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionItemCurrentUsage
{
    use Hydrator;

    /**
     * @var int|null The current quantity of usage recorded for the subscription item.
     */
    private ?int $quantity = null;

    /**
     * @var string|null The unit of the billing interval for usage (e.g., 'month').
     */
    private ?string $intervalUnit = null;

    /**
     * @var int|null The quantity of the billing interval units.
     */
    private ?int $intervalQuantity;

    /**
     * @var \DateTimeInterface|null The start date and time of the current billing period for usage.
     */
    private ?\DateTimeInterface $periodStart = null;

    /**
     * @var \DateTimeInterface|null The end date and time of the current billing period for usage.
     */
    private ?\DateTimeInterface $periodEnd = null;

    /**
     * Constructor. Hydrates the object with the provided data array.
     *
     * @param array<string, mixed> $data An array containing the current usage data
     * from the LemonSqueezy API.
     *
     * @throws RuntimeException If an error occurs during the hydration process.
     */
    public function __construct(array $data)
    {
        try {
            $this->hydrate($data);
        } catch (\Throwable $throwable) {
            throw new RuntimeException([
                'message' => $throwable->getMessage(),
                'details' => [
                    'data' => $data,
                ],
            ]);
        }
    }

    /**
     * Static factory method to create a new instance from an array of data.
     *
     * @param array<string, mixed> $data An array containing the current usage data.
     *
     * @return self A new instance of SubscriptionItemCurrentUsage hydrated with the data.
     *
     * @throws RuntimeException If an error occurs during the hydration process.
     */
    public static function from(array $data): self
    {
        return new self($data);
    }

    /**
     * Returns the current quantity of usage.
     *
     * @return int|null The usage quantity.
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Returns the unit of the billing interval for usage.
     *
     * @return string|null The interval unit (e.g., 'month').
     */
    public function getIntervalUnit(): ?string
    {
        return $this->intervalUnit;
    }

    /**
     * Returns the quantity of the billing interval units.
     *
     * @return int|null The interval quantity.
     */
    public function getIntervalQuantity(): ?int
    {
        return $this->intervalQuantity;
    }

    /**
     * Returns the start date and time of the current billing period.
     *
     * @return \DateTimeInterface|null The period start date and time.
     */
    public function getPeriodStart(): ?\DateTimeInterface
    {
        return $this->periodStart;
    }

    /**
     * Returns the start date and time of the current billing period as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     *
     * @return string The formatted period start date and time, or null if not set.
     */
    public function getPeriodStartAsString(string $format = 'Y-m-d H:i:s'): string
    {
        return $this->periodStart?->format($format);
    }

    /**
     * Returns the end date and time of the current billing period.
     *
     * @return \DateTimeInterface|null The period end date and time.
     */
    public function getPeriodEnd(): ?\DateTimeInterface
    {
        return $this->periodEnd;
    }

    /**
     * Returns the end date and time of the current billing period as a formatted string.
     *
     * @param string $format The format string for the DateTime object (default: 'Y-m-d H:i:s').
     *
     * @return string The formatted period end date and time, or null if not set.
     */
    public function getPeriodEndAsString(string $format = 'Y-m-d H:i:s'): string
    {
        return $this->periodEnd?->format($format);
    }
}
