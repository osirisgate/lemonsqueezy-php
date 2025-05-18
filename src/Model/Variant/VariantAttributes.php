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

namespace Osirisgate\Component\Lemonsqueezy\Model\Variant;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * VariantAttributes – Represents detailed attributes of a product variant in LemonSqueezy.
 *
 * This class encapsulates the various properties associated with a product variant,
 * such as the ID of the parent product, the variant's name, slug (a unique identifier),
 * and a short description. It also includes pricing information (price in cents/smallest
 * currency unit, flags for pay-what-you-want pricing, minimum and suggested prices),
 * subscription details (is it a subscription, billing interval and count, free trial
 * settings), license key management (does it generate license keys, activation limit,
 * license length value and unit, and flags for unlimited licenses), associated links,
 * sorting order, status information (status and formatted status), and a test mode flag.
 * The class also uses traits for managing creation and update timestamps.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class VariantAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * @var int|null The ID of the product this variant belongs to.
     */
    private ?int $productId = null;

    /**
     * @var string|null The name of the variant.
     */
    private ?string $name = null;

    /**
     * @var string|null A unique, human-readable identifier for the variant.
     */
    private ?string $slug = null;

    /**
     * @var string|null A brief description of the variant.
     */
    private ?string $description = null;

    /**
     * @var int|null The price of the variant in cents (or the smallest currency unit).
     */
    private ?int $price = null;

    /**
     * @var bool|null Indicates if this variant is a subscription.
     */
    private ?bool $isSubscription = null;

    /**
     * @var string|null The billing interval for subscriptions (e.g., 'month', 'year').
     */
    private ?string $interval = null;

    /**
     * @var int|null The number of intervals for billing (e.g., 1 for monthly, 12 for yearly).
     */
    private ?int $intervalCount = null;

    /**
     * @var bool|null Indicates if this variant offers a free trial.
     */
    private ?bool $hasFreeTrial = null;

    /**
     * @var string|null The interval for the free trial (e.g., 'day', 'week').
     */
    private ?string $trialInterval = null;

    /**
     * @var int|null The number of trial intervals (e.g., 7 for a 7-day trial).
     */
    private ?int $trialIntervalCount = null;

    /**
     * @var bool|null Indicates if this variant supports pay-what-you-want pricing.
     */
    private ?bool $payWhatYouWant = null;

    /**
     * @var int|null The minimum price allowed for pay-what-you-want pricing (in cents).
     */
    private ?int $minPrice = null;

    /**
     * @var int|null The suggested price for pay-what-you-want pricing (in cents).
     */
    private ?int $suggestedPrice = null;

    /**
     * @var bool|null Indicates if this variant generates license keys.
     */
    private ?bool $hasLicenseKeys = null;

    /**
     * @var int|null The maximum number of times a license key can be activated.
     */
    private ?int $licenseActivationLimit = null;

    /**
     * @var bool|null Indicates if the license activation limit is unlimited.
     */
    private ?bool $isLicenseLimitUnlimited = null;

    /**
     * @var int|null The value of the license length.
     */
    private ?int $licenseLengthValue = null;

    /**
     * @var string|null The unit of the license length (e.g., 'day', 'month', 'year').
     */
    private ?string $licenseLengthUnit = null;

    /**
     * @var VariantLink[] An array of related links for the variant.
     */
    private array $links = [];

    /**
     * @var bool|null Indicates if the license length is unlimited.
     */
    private ?bool $isLicenseLengthUnlimited = null;

    /**
     * @var int|null The sorting order of the variant relative to other variants of the same product.
     */
    private ?int $sort = null;

    /**
     * @var string|null The current status of the variant (e.g., 'active', 'archived').
     */
    private ?string $status = null;

    /**
     * @var string|null A formatted version of the variant's status for display.
     */
    private ?string $statusFormatted = null;

    /**
     * @var bool|null Indicates if the variant was created in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the product this variant belongs to.
     *
     * @return int|null The product ID.
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * Returns the name of the variant.
     *
     * @return string|null The variant name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Returns the unique slug of the variant.
     *
     * @return string|null The variant slug.
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * Returns the description of the variant.
     *
     * @return string|null The variant description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Returns the price of the variant in cents.
     *
     * @return int|null The variant price.
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * Indicates if the variant is a subscription.
     *
     * @return bool|null True if it's a subscription, false otherwise.
     */
    public function isSubscription(): ?bool
    {
        return $this->isSubscription;
    }

    /**
     * Returns the billing interval for subscriptions.
     *
     * @return string|null The billing interval.
     */
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * Returns the number of intervals for billing.
     *
     * @return int|null The interval count.
     */
    public function getIntervalCount(): ?int
    {
        return $this->intervalCount;
    }

    /**
     * Indicates if the variant has a free trial.
     *
     * @return bool|null True if it has a free trial, false otherwise.
     */
    public function hasFreeTrial(): ?bool
    {
        return $this->hasFreeTrial;
    }

    /**
     * Returns the interval for the free trial.
     *
     * @return string|null The trial interval.
     */
    public function getTrialInterval(): ?string
    {
        return $this->trialInterval;
    }

    /**
     * Returns the number of trial intervals.
     *
     * @return int|null The trial interval count.
     */
    public function getTrialIntervalCount(): ?int
    {
        return $this->trialIntervalCount;
    }

    /**
     * Indicates if the variant supports pay-what-you-want pricing.
     *
     * @return bool|null True if pay-what-you-want is enabled, false otherwise.
     */
    public function isPayWhatYouWant(): ?bool
    {
        return $this->payWhatYouWant;
    }

    /**
     * Returns the minimum price for pay-what-you-want pricing.
     *
     * @return int|null The minimum price.
     */
    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    /**
     * Returns the suggested price for pay-what-you-want pricing.
     *
     * @return int|null The suggested price.
     */
    public function getSuggestedPrice(): ?int
    {
        return $this->suggestedPrice;
    }

    /**
     * Indicates if the variant generates license keys.
     *
     * @return bool|null True if it generates license keys, false otherwise.
     */
    public function hasLicenseKeys(): ?bool
    {
        return $this->hasLicenseKeys;
    }

    /**
     * Returns the maximum number of times a license key can be activated.
     *
     * @return int|null The license activation limit.
     */
    public function getLicenseActivationLimit(): ?int
    {
        return $this->licenseActivationLimit;
    }

    /**
     * Indicates if the license activation limit is unlimited.
     *
     * @return bool|null True if the license limit is unlimited, false otherwise.
     */
    public function isLicenseLimitUnlimited(): ?bool
    {
        return $this->isLicenseLimitUnlimited;
    }

    /**
     * Returns the value of the license length.
     *
     * @return int|null The license length value.
     */
    public function getLicenseLengthValue(): ?int
    {
        return $this->licenseLengthValue;
    }

    /**
     * Returns the unit of the license length.
     *
     * @return string|null The license length unit.
     */
    public function getLicenseLengthUnit(): ?string
    {
        return $this->licenseLengthUnit;
    }

    /**
     * Returns an array of related links for the variant.
     *
     * @return VariantLink[] The array of variant links.
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * Indicates if the license length is unlimited.
     *
     * @return bool|null True if the license length is unlimited, false otherwise.
     */
    public function isLicenseLengthUnlimited(): ?bool
    {
        return $this->isLicenseLengthUnlimited;
    }

    /**
     * Returns the sorting order of the variant.
     *
     * @return int|null The sort order.
     */
    public function getSort(): ?int
    {
        return $this->sort;
    }

    /**
     * Returns the current status of the variant.
     *
     * @return string|null The variant status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns the formatted status of the variant for display.
     *
     * @return string|null The formatted variant status.
     */
    public function getStatusFormatted(): ?string
    {
        return $this->statusFormatted;
    }

    /**
     * Indicates if the variant was created in test mode.
     *
     * @return bool|null True if in test mode, false otherwise.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
