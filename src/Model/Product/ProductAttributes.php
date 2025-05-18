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

namespace Osirisgate\Component\Lemonsqueezy\Model\Product;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * ProductAttributes – LemonSqueezy API product attributes model.
 *
 * Represents the detailed attributes of a product retrieved from the
 * LemonSqueezy API. This class provides access to various properties
 * associated with a product, such as the identifier of the store it belongs to,
 * its name, a unique slug, a description, its current status, a formatted
 * status for display, URLs for thumbnail images (both regular and large),
 * pricing information (including a single price, a formatted price, a range
 * of prices if applicable, and their formatted versions), an indication of
 * whether the product supports "pay what you want" pricing, a direct URL
 * to purchase the product, and a boolean indicating if the product was
 * created or is in test mode.
 *
 * The class utilizes traits for managing timestamp-related attributes
 * (created at and updated at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class ProductAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * @var int|null The ID of the store that owns this product.
     */
    private ?int $storeId = null;

    /**
     * @var string|null The name of the product.
     */
    private ?string $name = null;

    /**
     * @var string|null A unique, human-readable identifier for the product.
     */
    private ?string $slug = null;

    /**
     * @var string|null A detailed description of the product.
     */
    private ?string $description = null;

    /**
     * @var string|null The current status of the product (e.g., 'active', 'inactive').
     */
    private ?string $status = null;

    /**
     * @var string|null A formatted version of the product's status for display.
     */
    private ?string $statusFormatted = null;

    /**
     * @var string|null The URL of the product's thumbnail image.
     */
    private ?string $thumbUrl = null;

    /**
     * @var string|null The URL of a larger version of the product's thumbnail image.
     */
    private ?string $largeThumbUrl = null;

    /**
     * @var int|null The base price of the product in cents/smallest currency unit (if applicable).
     */
    private ?int $price = null;

    /**
     * @var string|null A formatted version of the product's base price for display.
     */
    private ?string $priceFormatted = null;

    /**
     * @var int|null The starting price of the product in cents/smallest currency unit (for price ranges).
     */
    private ?int $fromPrice = null;

    /**
     * @var int|null The ending price of the product in cents/smallest currency unit (for price ranges).
     */
    private ?int $toPrice = null;

    /**
     * @var bool|null Indicates whether the product supports "pay what you want" pricing.
     */
    private ?bool $payWhatYouWant = null;

    /**
     * @var string|null The URL to directly purchase the product.
     */
    private ?string $buyNowUrl = null;

    /**
     * @var string|null A formatted version of the starting price for display.
     */
    private ?string $fromPriceFormatted = null;

    /**
     * @var string|null A formatted version of the ending price for display.
     */
    private ?string $toPriceFormatted = null;

    /**
     * @var bool|null Indicates whether the product was created or is in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the store that owns this product.
     *
     * @return int|null The store ID.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the name of the product.
     *
     * @return string|null The product name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Returns the unique slug of the product.
     *
     * @return string|null The product slug.
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * Returns the description of the product.
     *
     * @return string|null The product description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Returns the current status of the product.
     *
     * @return string|null The product status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns the formatted status of the product for display.
     *
     * @return string|null The formatted product status.
     */
    public function getStatusFormatted(): ?string
    {
        return $this->statusFormatted;
    }

    /**
     * Returns the URL of the product's thumbnail image.
     *
     * @return string|null The thumbnail URL.
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumbUrl;
    }

    /**
     * Returns the URL of the larger thumbnail image.
     *
     * @return string|null The large thumbnail URL.
     */
    public function getLargeThumbUrl(): ?string
    {
        return $this->largeThumbUrl;
    }

    /**
     * Returns the base price of the product.
     *
     * @return int|null The base price in cents/smallest currency unit.
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * Returns the formatted base price of the product for display.
     *
     * @return string|null The formatted price.
     */
    public function getPriceFormatted(): ?string
    {
        return $this->priceFormatted;
    }

    /**
     * Returns the starting price of the product (for price ranges).
     *
     * @return int|null The starting price in cents/smallest currency unit.
     */
    public function getFromPrice(): ?int
    {
        return $this->fromPrice;
    }

    /**
     * Returns the ending price of the product (for price ranges).
     *
     * @return int|null The ending price in cents/smallest currency unit.
     */
    public function getToPrice(): ?int
    {
        return $this->toPrice;
    }

    /**
     * Indicates whether the product supports "pay what you want".
     *
     * @return bool|null True if "pay what you want" is enabled, false otherwise.
     */
    public function isPayWhatYouWant(): ?bool
    {
        return $this->payWhatYouWant;
    }

    /**
     * Returns the URL to directly purchase the product.
     *
     * @return string|null The "buy now" URL.
     */
    public function getBuyNowUrl(): ?string
    {
        return $this->buyNowUrl;
    }

    /**
     * Returns the formatted starting price for display.
     *
     * @return string|null The formatted starting price.
     */
    public function getFromPriceFormatted(): ?string
    {
        return $this->fromPriceFormatted;
    }

    /**
     * Returns the formatted ending price for display.
     *
     * @return string|null The formatted ending price.
     */
    public function getToPriceFormatted(): ?string
    {
        return $this->toPriceFormatted;
    }

    /**
     * Indicates whether the product was created or is in test mode.
     *
     * @return bool|null True if in test mode, false otherwise.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
