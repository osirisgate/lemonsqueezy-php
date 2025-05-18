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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Order;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\DiscountRedemption\DiscountRedemption;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderInvoiceDownloader;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem\OrderItem;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * OrderResource – Handles LemonSqueezy order resources.
 *
 * Provides methods to list all orders, retrieve a specific order,
 * generate an invoice for an order, and issue a refund on an order.
 * It also offers methods to fetch related resources such as the store, customer,
 * order items, subscriptions, license keys, and discount redemptions.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class OrderResource extends Resource implements OrderResourceInterface
{
    /**
     * Lists all order records.
     *
     * Retrieves a paginated list of all orders associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Order[] An array of `Order` model instances representing the retrieved orders.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     *
     * @url https://docs.lemonsqueezy.com/api/orders/list-all-orders
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/orders', filters: $filters, options: $options);

        return Order::fromArray($responseData);
    }

    /**
     * Retrieves a single order record by its ID.
     *
     * Fetches the details of a specific order based on the provided unique identifier.
     *
     * @param int $id The ID of the order to retrieve.
     *
     * @return Order A `Order` model instance representing the requested order.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order not found).
     *
     * @url https://docs.lemonsqueezy.com/api/orders/retrieve-order
     */
    public function find(int $id): Order
    {
        $responseData = $this->get(uri: "/orders/{$id}");

        return Order::from($responseData);
    }

    /**
     * Generates a PDF invoice for a specific order.
     *
     * Sends a request to the LemonSqueezy API to generate a PDF invoice for the
     * order with the given ID.
     *
     * @param int $id The ID of the order for which to generate the invoice.
     * @param array<string, mixed> $filters Optional filters to apply when generating the invoice.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     * @return OrderInvoiceDownloader An object containing information to download the invoice.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request.
     *
     * @url https://docs.lemonsqueezy.com/api/orders/generate-order-invoice
     */
    public function generateInvoice(int $id, array $filters): OrderInvoiceDownloader
    {
        $responseData = $this->post(
            uri: "/orders/{$id}/generate-invoice",
            filters: $filters,
            withNestedFilter: false,
            fieldName: 'meta.urls'
        );

        return OrderInvoiceDownloader::from([
            'download_url' => $responseData['download_invoice'],
        ]);
    }

    /**
     * Issues a refund for a specific order.
     *
     * Sends a request to the LemonSqueezy API to initiate a refund for the order
     * with the given ID. The `$data` array should contain the necessary information
     * for the refund.
     *
     * @param array{
     * type: "orders",
     * id: string,
     * attributes: array{
     * amount?: int
     * }
     * } $data The data to refund an order. The array must include the order's ID.
     * Refer to the LemonSqueezy API documentation for
     * required parameters (e.g., refund amount).
     *
     * @return Order A model representing the updated order after the refund.
     *
     * @throws RuntimeException If the provided payload does not contain the 'id' for the refund.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data, order not found).
     *
     * @url https://docs.lemonsqueezy.com/api/orders/issue-refund
     */
    public function makeRefund(array $data): Order
    {
        self::assertThatPayloadHasId($data);
        $responseData = $this->post(
            uri: "/orders/{$data['id']}/refund",
            payload: $data,
        );

        return Order::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific order.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given
     * order ID.
     *
     * @param int $orderId The ID of the order whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/orders/1/store
     */
    public function store(int $orderId): Store
    {
        $responseData = $this->get(uri: "/orders/{$orderId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves the customer associated with a specific order.
     *
     * Fetches the details of the customer who placed the order with the given ID.
     *
     * @param int $orderId The ID of the order whose customer to retrieve.
     *
     * @return Customer A `Customer` model instance representing the associated customer.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/orders/1/customer
     */
    public function customer(int $orderId): Customer
    {
        $responseData = $this->get(uri: "/orders/{$orderId}/customer");

        return Customer::from($responseData);
    }

    /**
     * Retrieves a list of order items associated with a specific order.
     *
     * Fetches all individual items included in the order with the given ID.
     *
     * @param int $orderId The ID of the order whose order items to retrieve.
     *
     * @return OrderItem[] An array of `OrderItem` model instances representing the associated order items.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/orders/1/order-items
     */
    public function orderItems(int $orderId): array
    {
        $responseData = $this->get(uri: "/orders/{$orderId}/order-items");

        return OrderItem::fromArray($responseData);
    }

    /**
     * Retrieves a list of subscriptions associated with a specific order.
     *
     * Fetches all subscription records that were created as part of the order
     * with the given ID.
     *
     * @param int $orderId The ID of the order whose subscriptions to retrieve.
     *
     * @return Subscription[] An array of `Subscription` model instances representing
     * the associated subscriptions.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/orders/1/subscriptions
     */
    public function subscriptions(int $orderId): array
    {
        $responseData = $this->get(uri: "/orders/{$orderId}/subscriptions");

        return Subscription::fromArray($responseData);
    }

    /**
     * Retrieves a list of license keys associated with a specific order.
     *
     * Fetches all license key records that were generated as part of the order
     * with the given ID.
     *
     * @param int $orderId The ID of the order whose license keys to retrieve.
     *
     * @return LicenseKey[] An array of `LicenseKey` model instances representing
     * the associated license keys.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/orders/1/license-keys
     */
    public function licenseKeys(int $orderId): array
    {
        $responseData = $this->get(uri: "/orders/{$orderId}/license-keys");

        return LicenseKey::fromArray($responseData);
    }

    /**
     * Retrieves a list of discount redemptions associated with a specific order.
     *
     * Fetches all discount redemption records that were applied to the order
     * with the given ID.
     *
     * @param int $orderId The ID of the order whose discount redemptions to retrieve.
     *
     * @return DiscountRedemption[] An array of `DiscountRedemption` model instances
     * representing the associated discount redemptions.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., order not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/orders/1/discount-redemptions
     */
    public function discountRedemptions(int $orderId): array
    {
        $responseData = $this->get(uri: "/orders/{$orderId}/discount-redemptions");

        return DiscountRedemption::fromArray($responseData);
    }
}
