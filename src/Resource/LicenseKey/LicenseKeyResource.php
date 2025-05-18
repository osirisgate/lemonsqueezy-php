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

namespace Osirisgate\Component\Lemonsqueezy\Resource\LicenseKey;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKeyInstance\LicenseKeyInstance;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem\OrderItem;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * LicenseKeyResource – LemonSqueezy License Keys resource handler.
 *
 * Provides management of license keys: listing, retrieval, and updating.
 * It also offers methods to fetch related resources such as the store, customer,
 * order, order item, product, and associated license key instances.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class LicenseKeyResource extends Resource implements LicenseKeyResourceInterface
{
    /**
     * Lists all license key records.
     *
     * Retrieves a paginated list of all license keys associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down
     * the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return LicenseKey[] An array of `LicenseKey` model instances representing
     * the retrieved license keys.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/license-keys/list-all-license-keys
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/license-keys', filters: $filters, options: $options);

        return LicenseKey::fromArray($responseData);
    }

    /**
     * Retrieves a single license key record by its ID.
     *
     * Fetches the details of a specific license key based on the provided unique
     * identifier.
     *
     * @param int $id The ID of the license key to retrieve.
     *
     * @return LicenseKey A `LicenseKey` model instance representing the requested
     * license key.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/license-keys/retrieve-license-key
     */
    public function find(int $id): LicenseKey
    {
        $responseData = $this->get(uri: "/license-keys/{$id}");

        return LicenseKey::from($responseData);
    }

    /**
     * Updates an existing license key record.
     *
     * Modifies the details of a specific license key based on the provided data.
     * Only the attributes included in the `$data` array will be updated.
     *
     * @param array{
     * type: 'license-keys',
     * id: string,
     * attributes: array{
     * activation_limit?: int,
     * expires_at?: string,
     * disabled?: bool
     * }
     * } $data The license key data to update. The array must include the
     * license key's ID. Refer to the LemonSqueezy API documentation for
     * available attributes and their allowed values.
     *
     * @return LicenseKey A `LicenseKey` model instance representing the updated
     * license key.
     *
     * @throws RuntimeException If the provided payload does not contain the 'id' for the update.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data, license key not found).
     */
    public function update(array $data): LicenseKey
    {
        self::assertThatPayloadHasId($data);
        $responseData = $this->patch(uri: "/license-keys/{$data['id']}", payload: $data);

        return LicenseKey::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific license key.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given
     * license key ID.
     *
     * @param int $licenseKeyId The ID of the license key whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/license-keys/1/store
     */
    public function store(int $licenseKeyId): Store
    {
        $responseData = $this->get(uri: "/license-keys/{$licenseKeyId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves the customer associated with a specific license key.
     *
     * Fetches the details of the customer that is linked to the given license
     * key ID.
     *
     * @param int $licenseKeyId The ID of the license key whose customer to retrieve.
     *
     * @return Customer A `Customer` model instance representing the associated customer.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/license-keys/1/customer
     */
    public function customer(int $licenseKeyId): Customer
    {
        $responseData = $this->get(uri: "/license-keys/{$licenseKeyId}/customer");

        return Customer::from($responseData);
    }

    /**
     * Retrieves the order associated with a specific license key.
     *
     * Fetches the details of the order that generated the given license key ID.
     *
     * @param int $licenseKeyId The ID of the license key whose order to retrieve.
     *
     * @return Order An `Order` model instance representing the associated order.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/license-keys/1/order
     */
    public function order(int $licenseKeyId): Order
    {
        $responseData = $this->get(uri: "/license-keys/{$licenseKeyId}/order");

        return Order::from($responseData);
    }

    /**
     * Retrieves the order item associated with a specific license key.
     *
     * Fetches the details of the specific item within the order that generated
     * the given license key ID.
     *
     * @param int $licenseKeyId The ID of the license key whose order item to retrieve.
     *
     * @return OrderItem An `OrderItem` model instance representing the associated order item.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/license-keys/1/order-item
     */
    public function orderItem(int $licenseKeyId): OrderItem
    {
        $responseData = $this->get(uri: "/license-keys/{$licenseKeyId}/order-item");

        return OrderItem::from($responseData);
    }

    /**
     * Retrieves the product associated with a specific license key.
     *
     * Fetches the details of the product for which the given license key ID is valid.
     *
     * @param int $licenseKeyId The ID of the license key whose product to retrieve.
     *
     * @return Product A `Product` model instance representing the associated product.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/license-keys/1/product
     */
    public function product(int $licenseKeyId): Product
    {
        $responseData = $this->get(uri: "/license-keys/{$licenseKeyId}/product");

        return Product::from($responseData);
    }

    /**
     * Retrieves a list of license key instances associated with a specific license key.
     *
     * Fetches all instances (activations) that have been created for the given
     * license key ID.
     *
     * @param int $licenseKeyId The ID of the license key whose instances to retrieve.
     *
     * @return LicenseKeyInstance[] An array of `LicenseKeyInstance` model instances
     * representing the associated license key instances.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., license key not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/license-keys/1/license-key-instances
     */
    public function licenseKeyInstances(int $licenseKeyId): array
    {
        $responseData = $this->get(uri: "/license-keys/{$licenseKeyId}/license-key-instances");

        return LicenseKeyInstance::fromArray($responseData);
    }
}
