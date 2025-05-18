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

namespace Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\RefundedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * SubscriptionInvoiceAttributes – LemonSqueezy API subscription invoice attributes model.
 *
 * Represents the detailed attributes of an invoice generated for a subscription
 * in the LemonSqueezy API. This class encapsulates a wide range of information
 * related to the invoice, including identifiers for the associated store,
 * subscription, and customer. It also provides user details (name and email),
 * the reason for the billing, payment card details (brand and last four digits),
 * currency information (code and rate), the status of the invoice, a formatted
 * status for display, refund status, various monetary amounts (subtotal, discounts,
 * tax, total, and refunded amount, both in the invoice currency and USD), formatted
 * versions of these amounts for display, a flag indicating if tax is inclusive,
 * relevant URLs (such as the invoice URL), and a boolean indicating if the
 * invoice was created in test mode.
 *
 * The class utilizes traits for managing timestamp-related attributes (created
 * at, updated at, and refunded at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionInvoiceAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use RefundedAtTrait;

    /**
     * @var int|null The ID of the store associated with the subscription invoice.
     */
    private ?int $storeId = null;

    /**
     * @var int|null The ID of the subscription this invoice belongs to.
     */
    private ?int $subscriptionId = null;

    /**
     * @var int|null The ID of the customer who owns the subscription.
     */
    private ?int $customerId = null;

    /**
     * @var string|null The name of the user associated with the subscription.
     */
    private ?string $userName = null;

    /**
     * @var string|null The email address of the user associated with the subscription.
     */
    private ?string $userEmail = null;

    /**
     * @var string|null The reason for this billing event (e.g., 'renewal', 'trial_end').
     */
    private ?string $billingReason = null;

    /**
     * @var string|null The brand of the payment card used for this invoice (e.g., 'visa', 'mastercard').
     */
    private ?string $cardBrand = null;

    /**
     * @var string|null The last four digits of the payment card used for this invoice.
     */
    private ?string $cardLastFour = null;

    /**
     * @var string|null The currency code of the invoice.
     */
    private ?string $currency = null;

    /**
     * @var string|null The currency rate used for conversion to USD.
     */
    private ?string $currencyRate = null;

    /**
     * @var string|null The current status of the invoice (e.g., 'paid', 'failed', 'refunded').
     */
    private ?string $status = null;

    /**
     * @var string|null A formatted version of the invoice status for display.
     */
    private ?string $statusFormatted = null;

    /**
     * @var bool|null Indicates whether the invoice has been fully refunded.
     */
    private ?bool $refunded = null;

    /**
     * @var int|null The subtotal amount of the invoice in the invoice currency (in cents/smallest unit).
     */
    private ?int $subtotal = null;

    /**
     * @var int|null The total discount applied to the invoice in the invoice currency (in cents/smallest unit).
     */
    private ?int $discountTotal = null;

    /**
     * @var int|null The total tax amount for the invoice in the invoice currency (in cents/smallest unit).
     */
    private ?int $tax = null;

    /**
     * @var bool|null Indicates whether the tax is inclusive in the invoice total.
     */
    private ?bool $taxInclusive = null;

    /**
     * @var int|null The total amount of the invoice in the invoice currency (in cents/smallest unit).
     */
    private ?int $total = null;

    /**
     * @var int|null The total amount refunded for the invoice in the invoice currency (in cents/smallest unit).
     */
    private ?int $refundedAmount = null;

    /**
     * @var int|null The subtotal amount of the invoice in USD (in cents).
     */
    private ?int $subtotalUsd = null;

    /**
     * @var int|null The total discount applied to the invoice in USD (in cents).
     */
    private ?int $discountTotalUsd = null;

    /**
     * @var int|null The total tax amount for the invoice in USD (in cents).
     */
    private ?int $taxUsd = null;

    /**
     * @var int|null The total amount of the invoice in USD (in cents).
     */
    private ?int $totalUsd = null;

    /**
     * @var int|null The total amount refunded for the invoice in USD (in cents).
     */
    private ?int $refundedAmountUsd = null;

    /**
     * @var string|null The formatted subtotal amount of the invoice for display.
     */
    private ?string $subtotalFormatted = null;

    /**
     * @var string|null The formatted total discount applied to the invoice for display.
     */
    private ?string $discountTotalFormatted = null;

    /**
     * @var string|null The formatted total tax amount for the invoice for display.
     */
    private ?string $taxFormatted = null;

    /**
     * @var string|null The formatted total amount of the invoice for display.
     */
    private ?string $totalFormatted = null;

    /**
     * @var string|null The formatted total amount refunded for the invoice for display.
     */
    private ?string $refundedAmountFormatted = null;

    /**
     * @var array<string, string> An array of URLs associated with the invoice, such as the invoice URL.
     */
    private array $urls = [];

    /**
     * @var bool|null Indicates whether the invoice was created in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the store associated with the subscription invoice.
     *
     * @return int|null The store ID.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the ID of the subscription this invoice belongs to.
     *
     * @return int|null The subscription ID.
     */
    public function getSubscriptionId(): ?int
    {
        return $this->subscriptionId;
    }

    /**
     * Returns the ID of the customer who owns the subscription.
     *
     * @return int|null The customer ID.
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * Returns the name of the user associated with the subscription.
     *
     * @return string|null The user's name.
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * Returns the email address of the user associated with the subscription.
     *
     * @return string|null The user's email.
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    /**
     * Returns the reason for this billing event.
     *
     * @return string|null The billing reason.
     */
    public function getBillingReason(): ?string
    {
        return $this->billingReason;
    }

    /**
     * Returns the brand of the payment card used for this invoice.
     *
     * @return string|null The card brand.
     */
    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    /**
     * Returns the last four digits of the payment card used for this invoice.
     *
     * @return string|null The last four card digits.
     */
    public function getCardLastFour(): ?string
    {
        return $this->cardLastFour;
    }

    /**
     * Returns the currency code of the invoice.
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
     * Returns the current status of the invoice.
     *
     * @return string|null The invoice status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns the formatted status of the invoice for display.
     *
     * @return string|null The formatted invoice status.
     */
    public function getStatusFormatted(): ?string
    {
        return $this->statusFormatted;
    }

    /**
     * Indicates whether the invoice has been fully refunded.
     *
     * @return bool|null True if refunded, false otherwise.
     */
    public function isRefunded(): ?bool
    {
        return $this->refunded;
    }

    /**
     * Returns the subtotal amount of the invoice.
     *
     * @return int|null The subtotal amount (in cents/smallest unit).
     */
    public function getSubtotal(): ?int
    {
        return $this->subtotal;
    }

    /**
     * Returns the total discount applied to the invoice.
     *
     * @return int|null The discount total amount (in cents/smallest unit).
     */
    public function getDiscountTotal(): ?int
    {
        return $this->discountTotal;
    }

    /**
     * Returns the total tax amount for the invoice.
     *
     * @return int|null The tax amount (in cents/smallest unit).
     */
    public function getTax(): ?int
    {
        return $this->tax;
    }

    /**
     * Indicates whether the tax is inclusive in the invoice total.
     *
     * @return bool|null True if tax is inclusive, false otherwise.
     */
    public function hasTaxInclusive(): ?bool
    {
        return $this->taxInclusive;
    }

    /**
     * Returns the total amount of the invoice.
     *
     * @return int|null The total amount (in cents/smallest unit).
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * Returns the total amount refunded for the invoice.
     *
     * @return int|null The refunded amount (in cents/smallest unit).
     */
    public function getRefundedAmount(): ?int
    {
        return $this->refundedAmount;
    }

    /**
     * Returns the subtotal amount of the invoice in USD.
     *
     * @return int|null The subtotal amount in USD (in cents).
     */
    public function getSubtotalUsd(): ?int
    {
        return $this->subtotalUsd;
    }

    /**
     * Returns the total discount applied to the invoice in USD.
     *
     * @return int|null The discount total amount in USD (in cents).
     */
    public function getDiscountTotalUsd(): ?int
    {
        return $this->discountTotalUsd;
    }

    /**
     * Returns the total tax amount for the invoice in USD.
     *
     * @return int|null The tax amount in USD (in cents).
     */
    public function getTaxUsd(): ?int
    {
        return $this->taxUsd;
    }

    /**
     * Returns the total amount of the invoice in USD.
     *
     * @return int|null The total amount in USD (in cents).
     */
    public function getTotalUsd(): ?int
    {
        return $this->totalUsd;
    }

    /**
     * Returns the total amount refunded for the invoice in USD.
     *
     * @return int|null The refunded amount in USD (in cents).
     */
    public function getRefundedAmountUsd(): ?int
    {
        return $this->refundedAmountUsd;
    }

    /**
     * Returns the formatted subtotal amount of the invoice for display.
     *
     * @return string|null The formatted subtotal amount.
     */
    public function getSubtotalFormatted(): ?string
    {
        return $this->subtotalFormatted;
    }

    /**
     * Returns the formatted total discount applied to the invoice for display.
     *
     * @return string|null The formatted discount total amount.
     */
    public function getDiscountTotalFormatted(): ?string
    {
        return $this->discountTotalFormatted;
    }

    /**
     * Returns the formatted total tax amount for the invoice for display.
     *
     * @return string|null The formatted tax amount.
     */
    public function getTaxFormatted(): ?string
    {
        return $this->taxFormatted;
    }

    /**
     * Returns the formatted total amount of the invoice for display.
     *
     * @return string|null The formatted total amount.
     */
    public function getTotalFormatted(): ?string
    {
        return $this->totalFormatted;
    }

    /**
     * Returns the formatted total amount refunded for the invoice for display.
     *
     * @return string|null The formatted refunded amount.
     */
    public function getRefundedAmountFormatted(): ?string
    {
        return $this->refundedAmountFormatted;
    }

    /**
     * Returns an array of URLs associated with the invoice.
     *
     * @return array<string, string> The array of URLs.
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * Indicates whether the invoice was created in test mode.
     *
     * @return bool|null True if in test mode, false otherwise.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
