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

namespace Osirisgate\Component\Lemonsqueezy\Model\Discount;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\ExpiresAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\StartsAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * DiscountAttributes – LemonSqueezy API discount attributes model.
 *
 * Encapsulates the specific attributes of a discount entity within the LemonSqueezy API,
 * including details such as discount amount, code, duration, status, and limitations.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @see https://docs.lemonsqueezy.com/api/discounts/the-discount-object
 */
final class DiscountAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use ExpiresAtTrait;
    use StartsAtTrait;

    /**
     * The ID of the store to which this discount belongs.
     */
    private ?int $storeId = null;

    /**
     * The descriptive name of the discount.
     */
    private ?string $name = null;

    /**
     * The unique code that customers use to apply the discount.
     */
    private ?string $code = null;

    /**
     * The discount amount. This value depends on the 'amountType'.
     * If 'amountType' is 'percentage', this is the percentage (e.g., 10 for 10%).
     * If 'amountType' is 'fixed', this is the fixed amount in cents (or the smallest currency unit).
     */
    private ?int $amount = null;

    /**
     * The type of the discount amount ('percentage' or 'fixed').
     */
    private ?string $amountType = null;

    /**
     * Indicates whether the discount is limited to specific products.
     */
    private ?bool $isLimitedToProducts = null;

    /**
     * Indicates whether the discount has a maximum number of redemptions.
     */
    private ?bool $isLimitedRedemptions = null;

    /**
     * The maximum number of times the discount can be redeemed. Only applicable if 'isLimitedRedemptions' is true.
     */
    private ?int $maxRedemptions = null;

    /**
     * The duration of the discount ('once', 'repeating', or null for no duration limit).
     */
    private ?string $duration = null;

    /**
     * The number of months the discount will be applied for recurring subscriptions.
     * Only applicable if 'duration' is 'repeating'.
     */
    private ?int $durationInMonths = null;

    /**
     * The current status of the discount (e.g., 'active', 'inactive', 'expired').
     */
    private ?string $status = null;

    /**
     * The formatted status of the discount for display (e.g., 'Active', 'Inactive', 'Expired').
     */
    private ?string $statusFormatted = null;

    /**
     * Indicates whether the discount was created in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the store the discount belongs to.
     *
     * @return int|null The store ID, or null if not set.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the name of the discount.
     *
     * @return string|null The discount name, or null if not set.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Returns the discount code.
     *
     * @return string|null The discount code, or null if not set.
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Returns the discount amount.
     *
     * @return int|null The discount amount, or null if not set.
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * Returns the type of the discount amount.
     *
     * @return string|null The amount type ('percentage' or 'fixed'), or null if not set.
     */
    public function getAmountType(): ?string
    {
        return $this->amountType;
    }

    /**
     * Returns whether the discount is limited to specific products.
     *
     * @return bool|null True if limited to products, false otherwise, or null if not set.
     */
    public function getIsLimitedToProducts(): ?bool
    {
        return $this->isLimitedToProducts;
    }

    /**
     * Returns whether the discount has a maximum number of redemptions.
     *
     * @return bool|null True if redemptions are limited, false otherwise, or null if not set.
     */
    public function getIsLimitedRedemptions(): ?bool
    {
        return $this->isLimitedRedemptions;
    }

    /**
     * Returns the maximum number of redemptions for the discount.
     *
     * @return int|null The maximum redemptions, or null if not set.
     */
    public function getMaxRedemptions(): ?int
    {
        return $this->maxRedemptions;
    }

    /**
     * Returns the duration of the discount.
     *
     * @return string|null The duration ('once', 'repeating', or null), or null if not set.
     */
    public function getDuration(): ?string
    {
        return $this->duration;
    }

    /**
     * Returns the number of months the discount applies for recurring subscriptions.
     *
     * @return int|null The duration in months, or null if not set.
     */
    public function getDurationInMonths(): ?int
    {
        return $this->durationInMonths;
    }

    /**
     * Returns the current status of the discount.
     *
     * @return string|null The status (e.g., 'active'), or null if not set.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns the formatted status of the discount.
     *
     * @return string|null The formatted status, or null if not set.
     */
    public function getStatusFormatted(): ?string
    {
        return $this->statusFormatted;
    }

    /**
     * Returns whether the discount was created in test mode.
     *
     * @return bool|null True if in test mode, false otherwise, or null if not set.
     */
    public function getTestMode(): ?bool
    {
        return $this->testMode;
    }
}
