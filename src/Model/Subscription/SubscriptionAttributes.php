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

namespace Osirisgate\Component\Lemonsqueezy\Model\Subscription;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\EndsAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\RenewsAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * SubscriptionAttributes – LemonSqueezy API subscription attributes model.
 *
 * Represents the detailed properties of a subscription retrieved from the
 * LemonSqueezy API. This class encapsulates a wide range of information
 * associated with a subscription, including identifiers for the related
 * store, customer, order, order item, product, and variant. It also provides
 * details about the product and variant names, the subscribing user's name
 * and email, the current status of the subscription, a formatted status for
 * display, payment card details (brand and last four digits), any pause status,
 * a boolean indicating if the subscription has been cancelled, the date and
 * time when a trial period ends (if applicable), the day of the month for
 * the billing anchor, details of the first item in the subscription, relevant
 * URLs for managing the subscription (like updating payment method and accessing
 * the customer portal), and a flag indicating if the subscription was created
 * in test mode.
 *
 * The class utilizes traits for managing timestamp-related attributes (created
 * at, updated at, renews at, and ends at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use RenewsAtTrait;
    use EndsAtTrait;

    /**
     * @var int|null The ID of the store associated with the subscription.
     */
    private ?int $storeId = null;

    /**
     * @var int|null The ID of the customer who owns the subscription.
     */
    private ?int $customerId = null;

    /**
     * @var int|null The ID of the original order that created the subscription.
     */
    private ?int $orderId = null;

    /**
     * @var int|null The ID of the specific order item that initiated the subscription.
     */
    private ?int $orderItemId = null;

    /**
     * @var int|null The ID of the product associated with the subscription.
     */
    private ?int $productId = null;

    /**
     * @var int|null The ID of the specific variant of the product in the subscription.
     */
    private ?int $variantId = null;

    /**
     * @var string|null The name of the product in the subscription.
     */
    private ?string $productName = null;

    /**
     * @var string|null The name of the variant of the product in the subscription.
     */
    private ?string $variantName = null;

    /**
     * @var string|null The name of the user who owns the subscription.
     */
    private ?string $userName = null;

    /**
     * @var string|null The email address of the user who owns the subscription.
     */
    private ?string $userEmail = null;

    /**
     * @var string|null The current status of the subscription (e.g., 'active', 'cancelled').
     */
    private ?string $status = null;

    /**
     * @var string|null A formatted version of the subscription status for display.
     */
    private ?string $statusFormatted = null;

    /**
     * @var string|null The brand of the payment card used for the subscription (e.g., 'visa', 'mastercard').
     */
    private ?string $cardBrand = null;

    /**
     * @var string|null The last four digits of the payment card used for the subscription.
     */
    private ?string $cardLastFour = null;

    /**
     * @var array<string, mixed>|null Indicates if the subscription is paused and until when (e.g., null if not paused, or a date string).
     */
    private ?array $pause = null;

    /**
     * @var bool|null Indicates whether the subscription has been cancelled.
     */
    private ?bool $cancelled = null;

    /**
     * @var string|null The date and time when the trial period ends, in ISO 8601 format.
     */
    private ?string $trialEndsAt = null;

    /**
     * @var int|null The day of the month (1-31) that the subscription is billed.
     */
    private ?int $billingAnchor = null;

    /**
     * @var FirstSubscriptionItem|null Details of the first item in the subscription.
     */
    private ?FirstSubscriptionItem $firstSubscriptionItem = null;

    /**
     * @var array<string, string> An array of URLs related to the subscription management.
     * Includes URLs for updating the payment method, accessing the customer portal,
     * and a specific URL for updating the subscription within the customer portal.
     */
    private array $urls = [];

    /**
     * @var bool|null Indicates whether the subscription was created in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the store associated with the subscription.
     *
     * @return int|null The store ID.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
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
     * Returns the ID of the original order that created the subscription.
     *
     * @return int|null The order ID.
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * Returns the ID of the specific order item that initiated the subscription.
     *
     * @return int|null The order item ID.
     */
    public function getOrderItemId(): ?int
    {
        return $this->orderItemId;
    }

    /**
     * Returns the ID of the product associated with the subscription.
     *
     * @return int|null The product ID.
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * Returns the ID of the specific variant of the product in the subscription.
     *
     * @return int|null The variant ID.
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * Returns the name of the product in the subscription.
     *
     * @return string|null The product name.
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * Returns the name of the variant of the product in the subscription.
     *
     * @return string|null The variant name.
     */
    public function getVariantName(): ?string
    {
        return $this->variantName;
    }

    /**
     * Returns the name of the user who owns the subscription.
     *
     * @return string|null The user's name.
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * Returns the email address of the user who owns the subscription.
     *
     * @return string|null The user's email.
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    /**
     * Returns the current status of the subscription.
     *
     * @return string|null The subscription status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns the formatted status of the subscription for display.
     *
     * @return string|null The formatted subscription status.
     */
    public function getStatusFormatted(): ?string
    {
        return $this->statusFormatted;
    }

    /**
     * Returns the brand of the payment card used for the subscription.
     *
     * @return string|null The card brand.
     */
    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    /**
     * Returns the last four digits of the payment card used for the subscription.
     *
     * @return string|null The last four card digits.
     */
    public function getCardLastFour(): ?string
    {
        return $this->cardLastFour;
    }

    /**
     * Returns the pause status of the subscription.
     *
     * @return array<string, mixed>|null The pause status (null if not paused).
     */
    public function getPause(): ?array
    {
        return $this->pause;
    }

    /**
     * Indicates whether the subscription has been cancelled.
     *
     * @return bool|null True if cancelled, false otherwise.
     */
    public function isCancelled(): ?bool
    {
        return $this->cancelled;
    }

    /**
     * Returns the date and time when the trial period ends.
     *
     * @return string|null The trial end date and time in ISO 8601 format.
     */
    public function getTrialEndsAt(): ?string
    {
        return $this->trialEndsAt;
    }

    /**
     * Returns the day of the month for the subscription's billing anchor.
     *
     * @return int|null The billing anchor day.
     */
    public function getBillingAnchor(): ?int
    {
        return $this->billingAnchor;
    }

    /**
     * Returns details of the first item in the subscription.
     *
     * @return FirstSubscriptionItem|null The first subscription item details.
     */
    public function getFirstSubscriptionItem(): ?FirstSubscriptionItem
    {
        return $this->firstSubscriptionItem;
    }

    /**
     * Returns an array of URLs related to the subscription management.
     *
     * @return array<string, string> The array of URLs.
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * Indicates whether the subscription was created in test mode.
     *
     * @return bool|null True if in test mode, false otherwise.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
