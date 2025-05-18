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

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\ExpiresAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * CheckoutAttributes – Attributes of a Checkout entity in the LemonSqueezy API.
 *
 * Encapsulates the detailed attributes related to a checkout process,
 * including store and variant IDs, pricing, options, and URLs.
 * This class uses traits for created, updated, and expiration timestamps.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class CheckoutAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use ExpiresAtTrait;

    /**
     * The ID of the store associated with this checkout.
     */
    private ?int $storeId = null;

    /**
     * The ID of the specific product variant being purchased in this checkout.
     */
    private ?int $variantId = null;

    /**
     * An optional custom price (in cents or the smallest currency unit) to override the default variant price.
     */
    private ?int $customPrice = null;

    /**
     * Additional options related to the product being purchased.
     */
    private ?CheckoutProductOptions $productOptions = null;

    /**
     * Configuration options for the checkout page itself.
     */
    private ?CheckoutOptions $checkoutOptions = null;

    /**
     * Custom data that can be passed to the checkout.
     */
    private ?CheckoutData $checkoutData = null;

    /**
     * Information related to the checkout preview, if available.
     */
    private ?CheckoutPreview $preview = null;

    /**
     * Indicates whether the checkout is in test mode.
     */
    private ?bool $testMode = null;

    /**
     * The URL of the LemonSqueezy checkout page.
     */
    private ?string $url = null;

    /**
     * Returns the ID of the store associated with the checkout.
     *
     * @return int|null The store ID, or null if not set.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the ID of the product variant in the checkout.
     *
     * @return int|null The variant ID, or null if not set.
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * Returns the custom price set for the checkout.
     *
     * @return int|null The custom price in cents, or null if not set.
     */
    public function getCustomPrice(): ?int
    {
        return $this->customPrice;
    }

    /**
     * Returns the product options for the checkout.
     *
     * @return CheckoutProductOptions|null The product options, or null if not set.
     */
    public function getProductOptions(): ?CheckoutProductOptions
    {
        return $this->productOptions;
    }

    /**
     * Returns the checkout configuration options.
     *
     * @return CheckoutOptions|null The checkout options, or null if not set.
     */
    public function getCheckoutOptions(): ?CheckoutOptions
    {
        return $this->checkoutOptions;
    }

    /**
     * Returns the custom data associated with the checkout.
     *
     * @return CheckoutData|null The checkout data, or null if not set.
     */
    public function getCheckoutData(): ?CheckoutData
    {
        return $this->checkoutData;
    }

    /**
     * Returns the preview information for the checkout.
     *
     * @return CheckoutPreview|null The checkout preview, or null if not set.
     */
    public function getPreview(): ?CheckoutPreview
    {
        return $this->preview;
    }

    /**
     * Returns whether the checkout is in test mode.
     *
     * @return bool|null True if in test mode, false otherwise, or null if not set.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }

    /**
     * Returns the URL of the LemonSqueezy checkout page.
     *
     * @return string|null The checkout URL, or null if not set.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
}
