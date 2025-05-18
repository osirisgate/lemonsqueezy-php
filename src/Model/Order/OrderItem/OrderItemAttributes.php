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

namespace Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * OrderItemAttributes – LemonSqueezy API order item attributes model.
 *
 * Represents the specific details and properties of a single item within
 * a LemonSqueezy order. This class encapsulates information such as the
 * identifiers of the related order, product, variant, and price, as well
 * as the names of the product and variant, the price of the item, the
 * quantity ordered, and whether the order item was part of a test mode order.
 *
 * It utilizes traits for managing timestamp-related attributes (created at
 * and updated at).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class OrderItemAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * @var int|null The ID of the order this item belongs to.
     */
    private ?int $orderId = null;

    /**
     * @var int|null The ID of the product associated with this order item.
     */
    private ?int $productId = null;

    /**
     * @var int|null The ID of the specific variant of the product for this order item.
     */
    private ?int $variantId = null;

    /**
     * @var int|null The ID of the price option selected for this order item.
     */
    private ?int $priceId = null;

    /**
     * @var string|null The name of the product for this order item.
     */
    private ?string $productName = null;

    /**
     * @var string|null The name of the variant of the product for this order item.
     */
    private ?string $variantName = null;

    /**
     * @var int|null The price of this order item (in cents/smallest currency unit).
     */
    private ?int $price = null;

    /**
     * @var int|null The quantity of this item ordered.
     */
    private ?int $quantity = null;

    /**
     * @var bool|null Indicates whether this order item was created in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the order this item belongs to.
     *
     * @return int|null The order ID.
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * Returns the ID of the product associated with this order item.
     *
     * @return int|null The product ID.
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * Returns the ID of the specific variant of the product for this order item.
     *
     * @return int|null The variant ID.
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * Returns the ID of the price option selected for this order item.
     *
     * @return int|null The price ID.
     */
    public function getPriceId(): ?int
    {
        return $this->priceId;
    }

    /**
     * Returns the name of the product for this order item.
     *
     * @return string|null The product name.
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    /**
     * Returns the name of the variant of the product for this order item.
     *
     * @return string|null The variant name.
     */
    public function getVariantName(): ?string
    {
        return $this->variantName;
    }

    /**
     * Returns the price of this order item.
     *
     * @return int|null The price (in cents/smallest currency unit).
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * Returns the quantity of this item ordered.
     *
     * @return int|null The quantity.
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Indicates whether this order item was created in test mode.
     *
     * @return bool|null True if in test mode, false otherwise.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
