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

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Model;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem\OrderItem;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * OrderItemResource – Handles LemonSqueezy order item resources.
 *
 * Provides methods to list all order items and retrieve a specific order item.
 * It also offers methods to fetch the associated order, product, and variant
 * for a given order item.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class OrderItemResource extends Resource implements OrderItemResourceInterface
{
    /**
     * Lists all order item records.
     *
     * Retrieves a paginated list of all order items associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down
     * the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return OrderItem[] An array of `OrderItem` model instances representing
     * the retrieved order items.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/order-items/list-all-order-items
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/order-items', filters: $filters, options: $options);

        return OrderItem::fromArray($responseData);
    }

    /**
     * Retrieves a single order item record by its ID.
     *
     * Fetches the details of a specific order item based on the provided unique
     * identifier.
     *
     * @param int $id The ID of the order item to retrieve.
     *
     * @return OrderItem A `OrderItem` model instance representing the requested
     * order item.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order item not found).
     *
     * @url https://docs.lemonsqueezy.com/api/order-items/retrieve-order-item
     */
    public function find(int $id): Model
    {
        $responseData = $this->get(uri: "/order-items/{$id}");

        return OrderItem::from($responseData);
    }

    /**
     * Retrieves the order associated with a specific order item.
     *
     * Fetches the details of the order that contains the order item with the
     * given ID.
     *
     * @param int $orderItemId The ID of the order item whose order to retrieve.
     *
     * @return Order An `Order` model instance representing the associated order.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/order-items/1/order
     */
    public function order(int $orderItemId): Order
    {
        $responseData = $this->get(uri: "/order-items/{$orderItemId}/order");

        return Order::from($responseData);
    }

    /**
     * Retrieves the product associated with a specific order item.
     *
     * Fetches the details of the product that corresponds to the order item with
     * the given ID.
     *
     * @param int $orderItemId The ID of the order item whose product to retrieve.
     *
     * @return Product A `Product` model instance representing the associated product.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/order-items/1/product
     */
    public function product(int $orderItemId): Product
    {
        $responseData = $this->get(uri: "/order-items/{$orderItemId}/product");

        return Product::from($responseData);
    }

    /**
     * Retrieves the variant associated with a specific order item.
     *
     * Fetches the details of the specific variant of the product that the order
     * item with the given ID represents.
     *
     * @param int $orderItemId The ID of the order item whose variant to retrieve.
     *
     * @return Variant A `Variant` model instance representing the associated variant.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order item not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/order-items/1/variant
     */
    public function variant(int $orderItemId): Variant
    {
        $responseData = $this->get(uri: "/order-items/{$orderItemId}/variant");

        return Variant::from($responseData);
    }
}
