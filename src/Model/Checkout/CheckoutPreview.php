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

namespace Osirisgate\Component\Lemonsqueezy\Model\Checkout;

/**
 * CheckoutPreview – LemonSqueezy API checkout preview model.
 *
 * Represents a preview of the pricing details for a checkout,
 * including subtotal, discounts, taxes, and totals both in
 * the original currency and USD. Also includes formatted
 * string representations for display purposes.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class CheckoutPreview
{
    /**
     * The currency code of the checkout (e.g., 'USD', 'EUR').
     */
    private ?string $currency = null;

    /**
     * The currency rate relative to USD.
     */
    private ?int $currencyRate = null;

    /**
     * The subtotal amount in the original currency (in cents or the smallest currency unit).
     */
    private ?int $subtotal = null;

    /**
     * The total discount amount in the original currency (in cents or the smallest currency unit).
     */
    private ?int $discountTotal = null;

    /**
     * The total tax amount in the original currency (in cents or the smallest currency unit).
     */
    private ?int $tax = null;

    /**
     * The total amount in the original currency (in cents or the smallest currency unit).
     */
    private ?int $total = null;

    /**
     * The subtotal amount in USD (in cents).
     */
    private ?int $subtotalUsd = null;

    /**
     * The total discount amount in USD (in cents).
     */
    private ?int $discountTotalUsd = null;

    /**
     * The total tax amount in USD (in cents).
     */
    private ?int $taxUsd = null;

    /**
     * The total amount in USD (in cents).
     */
    private ?int $totalUsd = null;

    /**
     * The formatted subtotal amount in the original currency (e.g., '$10.00', '€10,00').
     */
    private ?string $subtotalFormatted = null;

    /**
     * The formatted total discount amount in the original currency (e.g., '-$2.00', '-€2,00').
     */
    private ?string $discountTotalFormatted = null;

    /**
     * The formatted total tax amount in the original currency (e.g., '$1.00', '€1,00').
     */
    private ?string $taxFormatted = null;

    /**
     * The formatted total amount in the original currency (e.g., '$9.00', '€9,00').
     */
    private ?string $totalFormatted = null;

    /**
     * Returns the currency code of the checkout.
     *
     * @return string|null The currency code, or null if not set.
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Returns the currency rate relative to USD.
     *
     * @return int|null The currency rate, or null if not set.
     */
    public function getCurrencyRate(): ?int
    {
        return $this->currencyRate;
    }

    /**
     * Returns the subtotal amount in the original currency.
     *
     * @return int|null The subtotal in cents, or null if not set.
     */
    public function getSubtotal(): ?int
    {
        return $this->subtotal;
    }

    /**
     * Returns the total discount amount in the original currency.
     *
     * @return int|null The discount total in cents, or null if not set.
     */
    public function getDiscountTotal(): ?int
    {
        return $this->discountTotal;
    }

    /**
     * Returns the total tax amount in the original currency.
     *
     * @return int|null The tax amount in cents, or null if not set.
     */
    public function getTax(): ?int
    {
        return $this->tax;
    }

    /**
     * Returns the total amount in the original currency.
     *
     * @return int|null The total in cents, or null if not set.
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * Returns the subtotal amount in USD.
     *
     * @return int|null The subtotal in USD cents, or null if not set.
     */
    public function getSubtotalUsd(): ?int
    {
        return $this->subtotalUsd;
    }

    /**
     * Returns the total discount amount in USD.
     *
     * @return int|null The discount total in USD cents, or null if not set.
     */
    public function getDiscountTotalUsd(): ?int
    {
        return $this->discountTotalUsd;
    }

    /**
     * Returns the total tax amount in USD.
     *
     * @return int|null The tax amount in USD cents, or null if not set.
     */
    public function getTaxUsd(): ?int
    {
        return $this->taxUsd;
    }

    /**
     * Returns the total amount in USD.
     *
     * @return int|null The total in USD cents, or null if not set.
     */
    public function getTotalUsd(): ?int
    {
        return $this->totalUsd;
    }

    /**
     * Returns the formatted subtotal amount in the original currency.
     *
     * @return string|null The formatted subtotal, or null if not set.
     */
    public function getSubtotalFormatted(): ?string
    {
        return $this->subtotalFormatted;
    }

    /**
     * Returns the formatted total discount amount in the original currency.
     *
     * @return string|null The formatted discount total, or null if not set.
     */
    public function getDiscountTotalFormatted(): ?string
    {
        return $this->discountTotalFormatted;
    }

    /**
     * Returns the formatted total tax amount in the original currency.
     *
     * @return string|null The formatted tax amount, or null if not set.
     */
    public function getTaxFormatted(): ?string
    {
        return $this->taxFormatted;
    }

    /**
     * Returns the formatted total amount in the original currency.
     *
     * @return string|null The formatted total, or null if not set.
     */
    public function getTotalFormatted(): ?string
    {
        return $this->totalFormatted;
    }
}
