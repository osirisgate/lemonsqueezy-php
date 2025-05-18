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

namespace Osirisgate\Component\Lemonsqueezy\Model\Order;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\RefundedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * OrderAttributes – LemonSqueezy API order attributes model.
 *
 * Represents the detailed attributes of an order retrieved from the LemonSqueezy API.
 * This class provides access to various properties associated with an order,
 * such as the related store and customer identifiers, unique order identifiers,
 * user details, currency information, monetary amounts (including subtotal,
 * setup fee, discounts, tax, and total, both in the order currency and USD),
 * refund details, tax specifics, order status, formatted monetary values for
 * display, the first order item associated with the order, relevant URLs (like
 * the receipt URL), and an indicator of whether the order was placed in test mode.
 *
 * The class utilizes traits for managing timestamp-related attributes (created at,
 * updated at, and refunded at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class OrderAttributes
{
    use UpdatedAtTrait;
    use CreatedAtTrait;
    use RefundedAtTrait;

    /**
     * @var int|null The ID of the store associated with the order.
     */
    private ?int $storeId = null;

    /**
     * @var int|null The ID of the customer who placed the order.
     */
    private ?int $customerId = null;

    /**
     * @var string|null A unique identifier for the order.
     */
    private ?string $identifier = null;

    /**
     * @var int|null A sequential order number for the order.
     */
    private ?int $orderNumber = null;

    /**
     * @var string|null The name of the user who placed the order.
     */
    private ?string $userName = null;

    /**
     * @var string|null The email address of the user who placed the order.
     */
    private ?string $userEmail = null;

    /**
     * @var string|null The currency code of the order.
     */
    private ?string $currency = null;

    /**
     * @var string|null The currency rate used for conversion to USD.
     */
    private ?string $currencyRate = null;

    /**
     * @var int|null The subtotal amount of the order in the order currency (in cents/smallest unit).
     */
    private ?int $subtotal = null;

    /**
     * @var int|null The setup fee applied to the order in the order currency (in cents/smallest unit).
     */
    private ?int $setupFee = null;

    /**
     * @var int|null The total discount applied to the order in the order currency (in cents/smallest unit).
     */
    private ?int $discountTotal = null;

    /**
     * @var int|null The total tax amount for the order in the order currency (in cents/smallest unit).
     */
    private ?int $tax = null;

    /**
     * @var int|null The total amount of the order in the order currency (in cents/smallest unit).
     */
    private ?int $total = null;

    /**
     * @var int|null The total amount refunded for the order in the order currency (in cents/smallest unit).
     */
    private ?int $refundedAmount = null;

    /**
     * @var int|null The subtotal amount of the order in USD (in cents).
     */
    private ?int $subtotalUsd = null;

    /**
     * @var int|null The setup fee applied to the order in USD (in cents).
     */
    private ?int $setupFeeUsd = null;

    /**
     * @var int|null The total discount applied to the order in USD (in cents).
     */
    private ?int $discountTotalUsd = null;

    /**
     * @var int|null The total tax amount for the order in USD (in cents).
     */
    private ?int $taxUsd = null;

    /**
     * @var int|null The total amount of the order in USD (in cents).
     */
    private ?int $totalUsd = null;

    /**
     * @var int|null The total amount refunded for the order in USD (in cents).
     */
    private ?int $refundedAmountUsd = null;

    /**
     * @var string|null The name of the tax applied to the order.
     */
    private ?string $taxName = null;

    /**
     * @var string|null The tax rate applied to the order (as a string representation of the percentage).
     */
    private ?string $taxRate = null;

    /**
     * @var bool|null Indicates whether the tax is inclusive in the order total.
     */
    private ?bool $taxInclusive = null;

    /**
     * @var string|null The current status of the order (e.g., 'pending', 'paid', 'refunded').
     */
    private ?string $status = null;

    /**
     * @var string|null A formatted string representation of the order status for display.
     */
    private ?string $statusFormatted = null;

    /**
     * @var bool|null Indicates whether the order has been fully refunded.
     */
    private ?bool $refunded = null;

    /**
     * @var string|null The formatted subtotal amount of the order for display.
     */
    private ?string $subtotalFormatted = null;

    /**
     * @var string|null The formatted setup fee amount of the order for display.
     */
    private ?string $setupFeeFormatted = null;

    /**
     * @var string|null The formatted total discount applied to the order for display.
     */
    private ?string $discountTotalFormatted = null;

    /**
     * @var string|null The formatted total tax amount for the order for display.
     */
    private ?string $taxFormatted = null;

    /**
     * @var string|null The formatted total amount of the order for display.
     */
    private ?string $totalFormatted = null;

    /**
     * @var string|null The formatted total amount refunded for the order for display.
     */
    private ?string $refundedAmountFormatted = null;

    /**
     * @var FirstOrderItem|null Details of the first item in the order.
     */
    private ?FirstOrderItem $firstOrderItem = null;

    /**
     * @var array<string, string> An array of URLs associated with the order, such as the receipt URL.
     */
    private array $urls = [];

    /**
     * @var bool|null Indicates whether the order was created in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the store associated with the order.
     *
     * @return int|null The store ID.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the ID of the customer who placed the order.
     *
     * @return int|null The customer ID.
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * Returns the unique identifier for the order.
     *
     * @return string|null The order identifier.
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * Returns the sequential order number.
     *
     * @return int|null The order number.
     */
    public function getOrderNumber(): ?int
    {
        return $this->orderNumber;
    }

    /**
     * Returns the name of the user who placed the order.
     *
     * @return string|null The user's name.
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * Returns the email address of the user who placed the order.
     *
     * @return string|null The user's email.
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    /**
     * Returns the currency code of the order.
     *
     * @return string|null The currency code.
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Returns the currency rate used for conversion to USD.
     *
     * @return string|null The currency rate.
     */
    public function getCurrencyRate(): ?string
    {
        return $this->currencyRate;
    }

    /**
     * Returns the subtotal amount of the order in the order currency.
     *
     * @return int|null The subtotal amount (in cents/smallest unit).
     */
    public function getSubtotal(): ?int
    {
        return $this->subtotal;
    }

    /**
     * Returns the setup fee applied to the order in the order currency.
     *
     * @return int|null The setup fee amount (in cents/smallest unit).
     */
    public function getSetupFee(): ?int
    {
        return $this->setupFee;
    }

    /**
     * Returns the total discount applied to the order in the order currency.
     *
     * @return int|null The discount total amount (in cents/smallest unit).
     */
    public function getDiscountTotal(): ?int
    {
        return $this->discountTotal;
    }

    /**
     * Returns the total tax amount for the order in the order currency.
     *
     * @return int|null The tax amount (in cents/smallest unit).
     */
    public function getTax(): ?int
    {
        return $this->tax;
    }

    /**
     * Returns the total amount of the order in the order currency.
     *
     * @return int|null The total amount (in cents/smallest unit).
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * Returns the total amount refunded for the order in the order currency.
     *
     * @return int|null The refunded amount (in cents/smallest unit).
     */
    public function getRefundedAmount(): ?int
    {
        return $this->refundedAmount;
    }

    /**
     * Returns the subtotal amount of the order in USD.
     *
     * @return int|null The subtotal amount in USD (in cents).
     */
    public function getSubtotalUsd(): ?int
    {
        return $this->subtotalUsd;
    }

    /**
     * Returns the setup fee applied to the order in USD.
     *
     * @return int|null The setup fee amount in USD (in cents).
     */
    public function getSetupFeeUsd(): ?int
    {
        return $this->setupFeeUsd;
    }

    /**
     * Returns the total discount applied to the order in USD.
     *
     * @return int|null The discount total amount in USD (in cents).
     */
    public function getDiscountTotalUsd(): ?int
    {
        return $this->discountTotalUsd;
    }

    /**
     * Returns the total tax amount for the order in USD.
     *
     * @return int|null The tax amount in USD (in cents).
     */
    public function getTaxUsd(): ?int
    {
        return $this->taxUsd;
    }

    /**
     * Returns the total amount of the order in USD.
     *
     * @return int|null The total amount in USD (in cents).
     */
    public function getTotalUsd(): ?int
    {
        return $this->totalUsd;
    }

    /**
     * Returns the total amount refunded for the order in USD.
     *
     * @return int|null The refunded amount in USD (in cents).
     */
    public function getRefundedAmountUsd(): ?int
    {
        return $this->refundedAmountUsd;
    }

    /**
     * Returns the name of the tax applied to the order.
     *
     * @return string|null The tax name.
     */
    public function getTaxName(): ?string
    {
        return $this->taxName;
    }

    /**
     * Returns the tax rate applied to the order.
     *
     * @return string|null The tax rate.
     */
    public function getTaxRate(): ?string
    {
        return $this->taxRate;
    }

    /**
     * Indicates whether the tax is inclusive in the order total.
     *
     * @return bool|null True if tax is inclusive, false otherwise.
     */
    public function hasTaxInclusive(): ?bool
    {
        return $this->taxInclusive;
    }

    /**
     * Returns the current status of the order.
     *
     * @return string|null The order status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns a formatted string representation of the order status.
     *
     * @return string|null The formatted order status.
     */
    public function getStatusFormatted(): ?string
    {
        return $this->statusFormatted;
    }

    /**
     * Indicates whether the order has been fully refunded.
     *
     * @return bool|null True if refunded, false otherwise.
     */
    public function isRefunded(): ?bool
    {
        return $this->refunded;
    }

    /**
     * Returns the formatted subtotal amount of the order for display.
     *
     * @return string|null The formatted subtotal amount.
     */
    public function getSubtotalFormatted(): ?string
    {
        return $this->subtotalFormatted;
    }

    /**
     * Returns the formatted setup fee amount of the order for display.
     *
     * @return string|null The formatted setup fee amount.
     */
    public function getSetupFeeFormatted(): ?string
    {
        return $this->setupFeeFormatted;
    }

    /**
     * Returns the formatted total discount applied to the order for display.
     *
     * @return string|null The formatted discount total amount.
     */
    public function getDiscountTotalFormatted(): ?string
    {
        return $this->discountTotalFormatted;
    }

    /**
     * Returns the formatted total tax amount for the order for display.
     *
     * @return string|null The formatted tax amount.
     */
    public function getTaxFormatted(): ?string
    {
        return $this->taxFormatted;
    }

    /**
     * Returns the formatted total amount of the order for display.
     *
     * @return string|null The formatted total amount.
     */
    public function getTotalFormatted(): ?string
    {
        return $this->totalFormatted;
    }

    /**
     * Returns the formatted total amount refunded for the order for display.
     *
     * @return string|null The formatted refunded amount.
     */
    public function getRefundedAmountFormatted(): ?string
    {
        return $this->refundedAmountFormatted;
    }

    /**
     * Returns details of the first item in the order.
     *
     * @return FirstOrderItem|null The first order item details.
     */
    public function getFirstOrderItem(): ?FirstOrderItem
    {
        return $this->firstOrderItem;
    }

    /**
     * Returns an array of URLs associated with the order.
     *
     * @return array<string, string> The array of URLs.
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * Indicates whether the order was created in test mode.
     *
     * @return bool|null True if in test mode, false otherwise.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
