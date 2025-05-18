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

use Osirisgate\Component\Lemonsqueezy\Model\Common\VariantQuantity;

/**
 * CheckoutData – Customer and order data for a checkout in the LemonSqueezy API.
 *
 * Encapsulates customer information such as email, name, billing address,
 * tax number, discount code, custom fields, and the quantities of variants purchased.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class CheckoutData
{
    /**
     * The email address of the customer initiating the checkout.
     */
    private ?string $email = null;

    /**
     * The full name of the customer.
     */
    private ?string $name = null;

    /**
     * The billing address information for the customer.
     */
    private ?BillingAddress $billingAddress = null;

    /**
     * The tax identification number of the customer, if applicable.
     */
    private ?string $taxNumber = null;

    /**
     * A discount code to be applied to the checkout.
     */
    private ?string $discountCode = null;

    /**
     * An array of custom data fields associated with the checkout.
     * The keys of the array are the custom field names, and the values are their corresponding values.
     *
     * @var array<string, mixed>
     */
    private array $custom = [];

    /**
     * An array of variant quantities, specifying the quantity of each variant being purchased.
     * Each element in the array is an instance of the VariantQuantity class.
     *
     * @var VariantQuantity[]
     */
    private array $variantQuantities = [];

    /**
     * Returns the email address of the customer.
     *
     * @return string|null The customer's email address, or null if not set.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Returns the name of the customer.
     *
     * @return string|null The customer's name, or null if not set.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Returns the billing address of the customer.
     *
     * @return BillingAddress|null The customer's billing address, or null if not set.
     */
    public function getBillingAddress(): ?BillingAddress
    {
        return $this->billingAddress;
    }

    /**
     * Returns the tax identification number of the customer.
     *
     * @return string|null The customer's tax number, or null if not set.
     */
    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    /**
     * Returns the discount code applied to the checkout.
     *
     * @return string|null The discount code, or null if not set.
     */
    public function getDiscountCode(): ?string
    {
        return $this->discountCode;
    }

    /**
     * Returns the custom data associated with the checkout.
     *
     * @return array<string, mixed> An array of custom data, or an empty array if none is set.
     */
    public function getCustom(): array
    {
        return $this->custom;
    }

    /**
     * Returns the array of variant quantities.
     *
     * @return VariantQuantity[] An array of VariantQuantity objects.
     */
    public function getVariantQuantities(): array
    {
        return $this->variantQuantities;
    }
}
