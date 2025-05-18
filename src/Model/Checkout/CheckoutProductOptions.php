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
 * CheckoutProductOptions – LemonSqueezy API checkout product options model.
 *
 * Represents customizable product options available during the checkout process,
 * including product name, description, media links, redirect URLs, and receipt texts.
 * Also includes an array of enabled variant IDs for the product.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class CheckoutProductOptions
{
    /**
     * The name of the product as it will appear on the checkout.
     */
    private ?string $name = null;

    /**
     * The description of the product displayed on the checkout.
     */
    private ?string $description = null;

    /**
     * An array of URLs to media (e.g., images, videos) associated with the product,
     * which can be displayed on the checkout.
     *
     * @var string[]
     */
    private array $media = [];

    /**
     * The URL to redirect the customer to after a successful checkout.
     */
    private ?string $redirectUrl = null;

    /**
     * Custom text for the button displayed on the receipt page.
     */
    private ?string $receiptButtonText = null;

    /**
     * A URL that the receipt button will link to.
     */
    private ?string $receiptLinkUrl = null;

    /**
     * A thank you note displayed on the receipt page after a successful purchase.
     */
    private ?string $receiptThankYouNote = null;

    /**
     * An array of IDs of the product variants that are enabled for this checkout.
     *
     * @var int[]
     */
    private array $enabledVariants = [];

    /**
     * Returns the name of the product for the checkout.
     *
     * @return string|null The product name, or null if not set.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Returns the description of the product for the checkout.
     *
     * @return string|null The product description, or null if not set.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Returns the array of media URLs for the product.
     *
     * @return string[] An array of media URLs.
     */
    public function getMedia(): array
    {
        return $this->media;
    }

    /**
     * Returns the URL to redirect to after checkout.
     *
     * @return string|null The redirect URL, or null if not set.
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    /**
     * Returns the custom text for the receipt button.
     *
     * @return string|null The receipt button text, or null if not set.
     */
    public function getReceiptButtonText(): ?string
    {
        return $this->receiptButtonText;
    }

    /**
     * Returns the URL linked to by the receipt button.
     *
     * @return string|null The receipt link URL, or null if not set.
     */
    public function getReceiptLinkUrl(): ?string
    {
        return $this->receiptLinkUrl;
    }

    /**
     * Returns the thank you note displayed on the receipt.
     *
     * @return string|null The receipt thank you note, or null if not set.
     */
    public function getReceiptThankYouNote(): ?string
    {
        return $this->receiptThankYouNote;
    }

    /**
     * Returns the array of enabled variant IDs for the product.
     *
     * @return int[] An array of enabled variant IDs.
     */
    public function getEnabledVariants(): array
    {
        return $this->enabledVariants;
    }
}
