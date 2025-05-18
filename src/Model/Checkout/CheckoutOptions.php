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
 * CheckoutOptions – Configuration options for a LemonSqueezy checkout.
 *
 * Represents various visual and functional settings for customizing the checkout experience,
 * including embedding options, media display, color customization, and feature toggles
 * such as discount visibility, trial skipping, and subscription preview.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class CheckoutOptions
{
    /**
     * Whether the checkout should be embedded on your website.
     */
    private ?bool $embed = null;

    /**
     * Whether to display media (e.g., product images) on the checkout.
     */
    private ?bool $media = null;

    /**
     * Whether to display the store logo on the checkout.
     */
    private ?bool $logo = null;

    /**
     * Whether to display the product description on the checkout.
     */
    private ?bool $desc = null;

    /**
     * Whether to show the discount code field on the checkout.
     */
    private ?bool $discount = null;

    /**
     * Whether to skip the trial period for subscription products.
     */
    private ?bool $skipTrial = null;

    /**
     * Whether to show a preview of the subscription before checkout.
     */
    private ?bool $subscriptionPreview = null;

    /**
     * The color of the main action button on the checkout (hex code).
     */
    private ?string $buttonColor = null;

    /**
     * The background color of the checkout page (hex code).
     */
    private ?string $backgroundColor = null;

    /**
     * The color of the headings on the checkout (hex code).
     */
    private ?string $headingsColor = null;

    /**
     * The primary text color on the checkout (hex code).
     */
    private ?string $primaryTextColor = null;

    /**
     * The secondary text color on the checkout (hex code).
     */
    private ?string $secondaryTextColor = null;

    /**
     * The color of the links on the checkout (hex code).
     */
    private ?string $linksColor = null;

    /**
     * The color of the borders on the checkout (hex code).
     */
    private ?string $bordersColor = null;

    /**
     * The color of the checkboxes on the checkout (hex code).
     */
    private ?string $checkboxColor = null;

    /**
     * The color of the active states (e.g., focused input fields) on the checkout (hex code).
     */
    private ?string $activeStateColor = null;

    /**
     * The text color of the main action button on the checkout (hex code).
     */
    private ?string $buttonTextColor = null;

    /**
     * The color of the terms and privacy policy links on the checkout (hex code).
     */
    private ?string $termsPrivacyColor = null;

    /**
     * Whether to use a dark theme for the checkout.
     */
    private ?bool $dark = null;

    /**
     * Checks if the embed option is enabled.
     *
     * @return bool|null True if embedding is enabled, false otherwise, or null if not set.
     */
    public function hasEmbed(): ?bool
    {
        return $this->embed;
    }

    /**
     * Checks if media display is enabled.
     *
     * @return bool|null True if media is displayed, false otherwise, or null if not set.
     */
    public function hasMedia(): ?bool
    {
        return $this->media;
    }

    /**
     * Checks if the logo display is enabled.
     *
     * @return bool|null True if the logo is displayed, false otherwise, or null if not set.
     */
    public function hasLogo(): ?bool
    {
        return $this->logo;
    }

    /**
     * Checks if the product description is displayed.
     *
     * @return bool|null True if the description is displayed, false otherwise, or null if not set.
     */
    public function hasDesc(): ?bool
    {
        return $this->desc;
    }

    /**
     * Checks if the discount code field is visible.
     *
     * @return bool|null True if the discount field is visible, false otherwise, or null if not set.
     */
    public function hasDiscount(): ?bool
    {
        return $this->discount;
    }

    /**
     * Checks if skipping the trial period is enabled.
     *
     * @return bool|null True if trial skipping is enabled, false otherwise, or null if not set.
     */
    public function hasSkipTrial(): ?bool
    {
        return $this->skipTrial;
    }

    /**
     * Checks if the subscription preview is enabled.
     *
     * @return bool|null True if the subscription preview is shown, false otherwise, or null if not set.
     */
    public function hasSubscriptionPreview(): ?bool
    {
        return $this->subscriptionPreview;
    }

    /**
     * Returns the button color.
     *
     * @return string|null The button color (hex code), or null if not set.
     */
    public function getButtonColor(): ?string
    {
        return $this->buttonColor;
    }

    /**
     * Returns the background color.
     *
     * @return string|null The background color (hex code), or null if not set.
     */
    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    /**
     * Returns the headings color.
     *
     * @return string|null The headings color (hex code), or null if not set.
     */
    public function getHeadingsColor(): ?string
    {
        return $this->headingsColor;
    }

    /**
     * Returns the primary text color.
     *
     * @return string|null The primary text color (hex code), or null if not set.
     */
    public function getPrimaryTextColor(): ?string
    {
        return $this->primaryTextColor;
    }

    /**
     * Returns the secondary text color.
     *
     * @return string|null The secondary text color (hex code), or null if not set.
     */
    public function getSecondaryTextColor(): ?string
    {
        return $this->secondaryTextColor;
    }

    /**
     * Returns the links color.
     *
     * @return string|null The links color (hex code), or null if not set.
     */
    public function getLinksColor(): ?string
    {
        return $this->linksColor;
    }

    /**
     * Returns the borders color.
     *
     * @return string|null The borders color (hex code), or null if not set.
     */
    public function getBordersColor(): ?string
    {
        return $this->bordersColor;
    }

    /**
     * Returns the checkbox color.
     *
     * @return string|null The checkbox color (hex code), or null if not set.
     */
    public function getCheckboxColor(): ?string
    {
        return $this->checkboxColor;
    }

    /**
     * Returns the active state color.
     *
     * @return string|null The active state color (hex code), or null if not set.
     */
    public function getActiveStateColor(): ?string
    {
        return $this->activeStateColor;
    }

    /**
     * Returns the button text color.
     *
     * @return string|null The button text color (hex code), or null if not set.
     */
    public function getButtonTextColor(): ?string
    {
        return $this->buttonTextColor;
    }

    /**
     * Returns the terms and privacy policy links color.
     *
     * @return string|null The terms privacy color (hex code), or null if not set.
     */
    public function getTermsPrivacyColor(): ?string
    {
        return $this->termsPrivacyColor;
    }

    /**
     * Checks if the dark theme is enabled.
     *
     * @return bool|null True if the dark theme is enabled, false otherwise, or null if not set.
     */
    public function isDark(): ?bool
    {
        return $this->dark;
    }
}
