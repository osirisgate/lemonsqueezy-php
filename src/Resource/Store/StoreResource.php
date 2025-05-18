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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Store;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Discount\Discount;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Model\Webhook\Webhook;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * StoreResource – Handles LemonSqueezy store resources.
 *
 * Provides methods to list all stores and retrieve a specific store.
 * It also offers methods to fetch related resources such as products, orders,
 * subscriptions, discounts, license keys, and webhooks associated with a given store.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class StoreResource extends Resource implements StoreResourceInterface
{
    /**
     * Lists all store records.
     *
     * Retrieves a paginated list of all stores associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Store[] An array of `Store` model instances representing the retrieved stores.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws HttpException If an error occurs during the HTTP request.
     *
     * @url https://docs.lemonsqueezy.com/api/stores/list-all-stores
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/stores', filters: $filters, options: $options);

        return Store::fromArray($responseData);
    }

    /**
     * Retrieves a single store record by its ID.
     *
     * Fetches the details of a specific store based on the provided unique identifier.
     *
     * @param int $id The ID of the store to retrieve.
     *
     * @return Store A `Store` model instance representing the requested store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., store not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/stores/retrieve-store
     */
    public function find(int $id): Store
    {
        $responseData = $this->get(uri: "/stores/{$id}");

        return Store::from($responseData);
    }

    /**
     * Retrieves a list of products associated with a specific store.
     *
     * Fetches all product records that are linked to the store with the given ID.
     *
     * @param int $storeId The ID of the store whose products to retrieve.
     *
     * @return Product[] An array of `Product` model instances representing the associated products.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., store not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/stores/1/products
     */
    public function products(int $storeId): array
    {
        $responseData = $this->get(uri: "/stores/{$storeId}/products");

        return Product::fromArray($responseData);
    }

    /**
     * Retrieves a list of orders associated with a specific store.
     *
     * Fetches all order records that belong to the store with the given ID.
     *
     * @param int $storeId The ID of the store whose orders to retrieve.
     *
     * @return Order[] An array of `Order` model instances representing the associated orders.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., store not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/stores/1/orders
     */
    public function orders(int $storeId): array
    {
        $responseData = $this->get(uri: "/stores/{$storeId}/orders");

        return Order::fromArray($responseData);
    }

    /**
     * Retrieves a list of subscriptions associated with a specific store.
     *
     * Fetches all subscription records that are associated with the store with
     * the given ID.
     *
     * @param int $storeId The ID of the store whose subscriptions to retrieve.
     *
     * @return Subscription[] An array of `Subscription` model instances representing
     * the associated subscriptions.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., store not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/stores/1/subscriptions
     */
    public function subscriptions(int $storeId): array
    {
        $responseData = $this->get(uri: "/stores/{$storeId}/subscriptions");

        return Subscription::fromArray($responseData);
    }

    /**
     * Retrieves a list of discounts associated with a specific store.
     *
     * Fetches all discount records that are available in the store with the given ID.
     *
     * @param int $storeId The ID of the store whose discounts to retrieve.
     *
     * @return Discount[] An array of `Discount` model instances representing the associated discounts.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., store not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/stores/1/discounts
     */
    public function discounts(int $storeId): array
    {
        $responseData = $this->get(uri: "/stores/{$storeId}/discounts");

        return Discount::fromArray($responseData);
    }

    /**
     * Retrieves a list of license keys associated with a specific store.
     *
     * Fetches all license key records that were generated for products in the
     * store with the given ID.
     *
     * @param int $storeId The ID of the store whose license keys to retrieve.
     *
     * @return LicenseKey[] An array of `LicenseKey` model instances representing
     * the associated license keys.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., store not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/stores/1/license-keys
     */
    public function licenseKeys(int $storeId): array
    {
        $responseData = $this->get(uri: "/stores/{$storeId}/license-keys");

        return LicenseKey::fromArray($responseData);
    }

    /**
     * Retrieves a list of webhooks associated with a specific store.
     *
     * Fetches all webhook records that are configured for the store with the
     * given ID.
     *
     * @param int $storeId The ID of the store whose webhooks to retrieve.
     *
     * @return Webhook[] An array of `Webhook` model instances representing the associated webhooks.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., store not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/stores/1/webhooks
     */
    public function webhooks(int $storeId): array
    {
        $responseData = $this->get(uri: "/stores/{$storeId}/webhooks");

        return Webhook::fromArray($responseData);
    }
}
