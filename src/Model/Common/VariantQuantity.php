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

namespace Osirisgate\Component\Lemonsqueezy\Model\Common;

/**
 * VariantQuantity – Represents a quantity of a specific product variant.
 *
 * This class holds information about the variant ID and the associated quantity.
 * It is typically used to specify how many units of a variant are included in
 * an order or checkout process.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class VariantQuantity
{
    /**
     * The ID of the product variant.
     */
    private ?int $variantId = null;

    /**
     * The quantity of the specified variant.
     */
    private ?int $quantity = null;

    /**
     * Returns the ID of the product variant.
     *
     * @return int|null The variant ID, or null if not set.
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * Returns the quantity of the variant.
     *
     * @return int|null The quantity, or null if not set.
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }
}
