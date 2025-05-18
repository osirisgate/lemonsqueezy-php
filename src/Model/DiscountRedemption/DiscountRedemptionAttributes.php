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

namespace Osirisgate\Component\Lemonsqueezy\Model\DiscountRedemption;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * DiscountRedemptionAttributes – LemonSqueezy API discount redemption attributes model.
 *
 * Encapsulates the attributes of a discount redemption entity in the LemonSqueezy API,
 * including identifiers, discount details, and monetary amounts.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class DiscountRedemptionAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * The ID of the discount that was redeemed.
     */
    private ?int $discountId = null;

    /**
     * The ID of the order to which this discount redemption belongs.
     */
    private ?int $orderId = null;

    /**
     * The name of the discount at the time of redemption.
     */
    private ?string $discountName = null;

    /**
     * The discount code that was used for the redemption.
     */
    private ?string $discountCode = null;

    /**
     * The amount of the discount applied. This value depends on the 'discountAmountType'.
     * If 'discountAmountType' is 'percentage', this is the percentage (e.g., 10 for 10%).
     * If 'discountAmountType' is 'fixed', this is the fixed amount in cents (or the smallest currency unit).
     */
    private ?int $discountAmount = null;

    /**
     * The type of the discount amount ('percentage' or 'fixed') at the time of redemption.
     */
    private ?string $discountAmountType = null;

    /**
     * The final discounted amount in cents (or the smallest currency unit) after the discount was applied.
     */
    private ?int $amount = null;

    /**
     * Returns the ID of the discount.
     *
     * @return int|null The discount ID, or null if not set.
     */
    public function getDiscountId(): ?int
    {
        return $this->discountId;
    }

    /**
     * Returns the ID of the order.
     *
     * @return int|null The order ID, or null if not set.
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * Returns the name of the discount.
     *
     * @return string|null The discount name, or null if not set.
     */
    public function getDiscountName(): ?string
    {
        return $this->discountName;
    }

    /**
     * Returns the discount code.
     *
     * @return string|null The discount code, or null if not set.
     */
    public function getDiscountCode(): ?string
    {
        return $this->discountCode;
    }

    /**
     * Returns the discount amount.
     *
     * @return int|null The discount amount, or null if not set.
     */
    public function getDiscountAmount(): ?int
    {
        return $this->discountAmount;
    }

    /**
     * Returns the type of the discount amount.
     *
     * @return string|null The discount amount type ('percentage' or 'fixed'), or null if not set.
     */
    public function getDiscountAmountType(): ?string
    {
        return $this->discountAmountType;
    }

    /**
     * Returns the final discounted amount.
     *
     * @return int|null The discounted amount in cents, or null if not set.
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }
}
