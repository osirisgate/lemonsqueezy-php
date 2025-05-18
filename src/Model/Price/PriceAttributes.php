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

namespace Osirisgate\Component\Lemonsqueezy\Model\Price;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * PriceAttributes – LemonSqueezy API price attributes model.
 *
 * Represents the detailed properties of a price configuration within the
 * LemonSqueezy API. This class holds various attributes that define how
 * a product or variant is priced, including the pricing scheme (e.g., flat rate,
 * tiered), the base unit price, whether a setup fee is enabled and its amount,
 * package size for quantity-based pricing, details for tiered pricing structures,
 * the interval and quantity for recurring billing (renewal), the interval and
 * quantity for free trials, a minimum allowed price, a suggested price for display,
 * and the associated tax code.
 *
 * It utilizes traits for managing timestamp-related attributes (created at
 * and updated at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class PriceAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * @var int|null The ID of the variant this price belongs to.
     */
    private ?int $variantId = null;

    /**
     * @var string|null The category of the price (e.g., 'standard', 'metered').
     */
    private ?string $category = null;

    /**
     * @var string|null The pricing scheme ('flat_rate', 'tiered', 'volume', 'graduated', 'package', 'per_seat', 'usage').
     */
    private ?string $scheme = null;

    /**
     * @var string|null How usage is aggregated for 'usage'-based pricing ('sum').
     */
    private ?string $usageAggregation = null;

    /**
     * @var int|null The unit price in cents/smallest currency unit.
     */
    private ?int $unitPrice = null;

    /**
     * @var string|null The unit price as a decimal string.
     */
    private ?string $unitPriceDecimal = null;

    /**
     * @var bool|null Indicates if a setup fee is enabled for this price.
     */
    private ?bool $setupFeeEnabled = null;

    /**
     * @var int|null The setup fee amount in cents/smallest currency unit.
     */
    private ?int $setupFee = null;

    /**
     * @var int|null The number of units included in a package for 'package' pricing.
     */
    private ?int $packageSize = null;

    /**
     * @var array|null An array defining the tiers for 'tiered', 'volume', 'graduated' pricing.
     * Each tier typically includes a 'up_to' value and a 'unit_price'.
     */
    private ?array $tiers = null;

    /**
     * @var string|null The unit of the renewal interval for recurring prices ('day', 'week', 'month', 'year').
     */
    private ?string $renewalIntervalUnit = null;

    /**
     * @var int|null The quantity of the renewal interval units.
     */
    private ?int $renewalIntervalQuantity = null;

    /**
     * @var string|null The unit of the trial interval ('day', 'week', 'month', 'year').
     */
    private ?string $trialIntervalUnit = null;

    /**
     * @var int|null The quantity of the trial interval units.
     */
    private ?int $trialIntervalQuantity = null;

    /**
     * @var int|null The minimum price allowed for this price in cents/smallest currency unit.
     */
    private ?int $minPrice = null;

    /**
     * @var int|null The suggested price for display purposes in cents/smallest currency unit.
     */
    private ?int $suggestedPrice = null;

    /**
     * @var string|null The tax code associated with this price.
     */
    private ?string $taxCode = null;

    /**
     * Returns the ID of the variant this price belongs to.
     *
     * @return int|null The variant ID.
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * Returns the category of the price.
     *
     * @return string|null The price category.
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * Returns the pricing scheme.
     *
     * @return string|null The pricing scheme.
     */
    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    /**
     * Returns how usage is aggregated for 'usage'-based pricing.
     *
     * @return string|null The usage aggregation method.
     */
    public function getUsageAggregation(): ?string
    {
        return $this->usageAggregation;
    }

    /**
     * Returns the unit price.
     *
     * @return int|null The unit price in cents/smallest currency unit.
     */
    public function getUnitPrice(): ?int
    {
        return $this->unitPrice;
    }

    /**
     * Returns the unit price as a decimal string.
     *
     * @return string|null The unit price as a decimal.
     */
    public function getUnitPriceDecimal(): ?string
    {
        return $this->unitPriceDecimal;
    }

    /**
     * Indicates if a setup fee is enabled for this price.
     *
     * @return bool|null True if setup fee is enabled, false otherwise.
     */
    public function setupFeeEnabled(): ?bool
    {
        return $this->setupFeeEnabled;
    }

    /**
     * Returns the setup fee amount.
     *
     * @return int|null The setup fee in cents/smallest currency unit.
     */
    public function getSetupFee(): ?int
    {
        return $this->setupFee;
    }

    /**
     * Returns the number of units in a package.
     *
     * @return int|null The package size.
     */
    public function getPackageSize(): ?int
    {
        return $this->packageSize;
    }

    /**
     * Returns the tiers for tiered pricing.
     *
     * @return array|null The tiers array.
     */
    public function getTiers(): ?array
    {
        return $this->tiers;
    }

    /**
     * Returns the unit of the renewal interval.
     *
     * @return string|null The renewal interval unit.
     */
    public function getRenewalIntervalUnit(): ?string
    {
        return $this->renewalIntervalUnit;
    }

    /**
     * Returns the quantity of the renewal interval units.
     *
     * @return int|null The renewal interval quantity.
     */
    public function getRenewalIntervalQuantity(): ?int
    {
        return $this->renewalIntervalQuantity;
    }

    /**
     * Returns the unit of the trial interval.
     *
     * @return string|null The trial interval unit.
     */
    public function getTrialIntervalUnit(): ?string
    {
        return $this->trialIntervalUnit;
    }

    /**
     * Returns the quantity of the trial interval units.
     *
     * @return int|null The trial interval quantity.
     */
    public function getTrialIntervalQuantity(): ?int
    {
        return $this->trialIntervalQuantity;
    }

    /**
     * Returns the minimum allowed price.
     *
     * @return int|null The minimum price in cents/smallest currency unit.
     */
    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    /**
     * Returns the suggested price.
     *
     * @return int|null The suggested price in cents/smallest currency unit.
     */
    public function getSuggestedPrice(): ?int
    {
        return $this->suggestedPrice;
    }

    /**
     * Returns the tax code associated with this price.
     *
     * @return string|null The tax code.
     */
    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }
}
