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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Order\OrderItem;

use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * OrderItemResourceInterface – LemonSqueezy API order item resource interface.
 *
 * Defines the contract for interacting with order item resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources. Additionally,
 * it specifies methods for fetching the associated order, product, and variant
 * for a given order item.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface OrderItemResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface
{
    /**
     * Retrieves the order associated with a specific order item.
     *
     * @param int $orderItemId The ID of the order item.
     * @return Order The associated order.
     */
    public function order(int $orderItemId): Order;

    /**
     * Retrieves the product associated with a specific order item.
     *
     * @param int $orderItemId The ID of the order item.
     * @return Product The associated product.
     */
    public function product(int $orderItemId): Product;

    /**
     * Retrieves the variant associated with a specific order item.
     *
     * @param int $orderItemId The ID of the order item.
     * @return Variant The associated variant.
     */
    public function variant(int $orderItemId): Variant;
}
