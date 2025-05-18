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

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseApi;

/**
 * LicenseApiMeta – LemonSqueezy license key metadata model.
 *
 * Represents metadata associated with a license key in the LemonSqueezy API,
 * including references to the store, order, product, variant, and customer information.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class LicenseApiMeta
{
    /**
     * The ID of the store associated with the license key.
     */
    private ?int $storeId = null;

    /**
     * The ID of the order that generated the license key.
     */
    private ?int $orderId = null;

    /**
     * The ID of the specific order item that includes the licensed product.
     */
    private ?int $orderItemId = null;

    /**
     * The ID of the product for which the license key was issued.
     */
    private ?int $productId = null;

    /**
     * The name of the product for which the license key was issued.
     */
    private ?string $productName = null;

    /**
     * The ID of the specific variant of the product.
     */
    private ?int $variantId = null;

    /**
     * The name of the specific variant of the product.
     */
    private ?string $variantName = null;

    /**
     * The ID of the customer who purchased the licensed product.
     */
    private ?int $customerId = null;

    /**
     * The name of the customer who purchased the licensed product.
     */
    private ?string $customerName = null;

    /**
     * The email address of the customer who purchased the licensed product.
     */
    private ?string $customerEmail = null;

    /**
     * Returns the ID of the store.
     *
     * @return int|null The store ID, or null if not set.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the ID of the order.
     *
     * @return int|null The order ID, or null if not set.
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * Returns the ID of the order item.
     *
     * @return int|null The order item ID, or null if not set.
     */
    public function getOrderItemId(): ?int
    {
        return $this->orderItemId;
    }

    /**
     * Returns the ID of the product.
     *
     * @return int|null The product ID, or null if not set.
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * Returns the name of the product.
     *
     * @return string|null The product name, or null if not set.
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * Returns the ID of the variant.
     *
     * @return int|null The variant ID, or null if not set.
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * Returns the name of the variant.
     *
     * @return string|null The variant name, or null if not set.
     */
    public function getVariantName(): ?string
    {
        return $this->variantName;
    }

    /**
     * Returns the ID of the customer.
     *
     * @return int|null The customer ID, or null if not set.
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * Returns the name of the customer.
     *
     * @return string|null The customer name, or null if not set.
     */
    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    /**
     * Returns the email address of the customer.
     *
     * @return string|null The customer email, or null if not set.
     */
    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }
}
