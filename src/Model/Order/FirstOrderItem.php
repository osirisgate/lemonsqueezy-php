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

namespace Osirisgate\Component\Lemonsqueezy\Model\Order;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * FirstOrderItem – LemonSqueezy API order item model.
 *
 * Represents a single item within an order in the LemonSqueezy API.
 * Encapsulates details about the product, variant, quantity, price, and metadata.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class FirstOrderItem
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * The unique identifier of the order item.
     */
    private ?int $id = null;

    /**
     * The ID of the order this item belongs to.
     */
    private ?int $orderId = null;

    /**
     * The ID of the product in this order item.
     */
    private ?int $productId = null;

    /**
     * The ID of the specific variant of the product in this order item.
     */
    private ?int $variantId = null;

    /**
     * The name of the product in this order item.
     */
    private ?string $productName = null;

    /**
     * The name of the specific variant of the product in this order item.
     */
    private ?string $variantName = null;

    /**
     * The price of one unit of this item in cents (or the smallest currency unit).
     */
    private ?int $price = null;

    /**
     * The quantity of this item in the order.
     */
    private ?int $quantity = null;

    /**
     * Indicates whether this order item was created in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the order item.
     *
     * @return int|null The order item ID, or null if not set.
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * Returns the ID of the product.
     *
     * @return int|null The product ID, or null if not set.
     */
    public function getProductId(): ?int
    {
        return $this->productId;
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
     * Returns the name of the product.
     *
     * @return string|null The product name, or null if not set.
     */
    public function getProductName(): ?string
    {
        return $this->productName;
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
     * Returns the price of the item.
     *
     * @return int|null The price in cents, or null if not set.
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * Returns the quantity of the item.
     *
     * @return int|null The quantity, or null if not set.
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Returns whether the order item was created in test mode.
     *
     * @return bool|null True if in test mode, false otherwise, or null if not set.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
