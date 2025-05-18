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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Customer;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * CustomerResource – LemonSqueezy API customer resource handler.
 *
 * Provides methods to create, list, retrieve, and update customer records from the LemonSqueezy API.
 * This resource implements the full CRUD interaction (except delete) via the `/customers` endpoints.
 * It also offers methods to fetch related resources such as the customer's store, orders,
 * subscriptions, and license keys.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class CustomerResource extends Resource implements CustomerResourceInterface
{
    /**
     * Lists all customer records.
     *
     * Retrieves a paginated list of all customers associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Customer[] An array of `Customer` model instances representing the retrieved customers.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/customers/list-all-customers
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/customers', filters: $filters, options: $options);

        return Customer::fromArray($responseData);
    }

    /**
     * Retrieves a single customer record by its ID.
     *
     * Fetches the details of a specific customer based on the provided unique identifier.
     *
     * @param int $id The ID of the customer to retrieve.
     *
     * @return Customer A `Customer` model instance representing the requested customer.
     *
     * @throws HttpException If an error occurs during the HTTP request (e.g., customer not found).
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/customers/retrieve-customer
     */
    public function find(int $id): Customer
    {
        $responseData = $this->get(uri: "/customers/{$id}");

        return Customer::from($responseData);
    }

    /**
     * Creates a new customer.
     *
     * Initiates the creation of a new customer record with the provided data.
     *
     * @param array{
     * type: string,
     * attributes: array{
     * name: string,
     * email: string,
     * city?: string,
     * region?: string,
     * country?: string
     * },
     * relationships: array{
     * store: array{
     * data: array{
     * type: string,
     * id: string
     * }
     * }
     * }
     * } $data The customer data to be created. Refer to the LemonSqueezy API
     * documentation for the specific structure and allowed parameters.
     *
     * @return Customer A `Customer` model instance representing the newly created customer.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data).
     */
    public function create(array $data): Customer
    {
        $responseData = $this->post(uri: '/customers', payload: $data);

        return Customer::from($responseData);
    }

    /**
     * Updates an existing customer record.
     *
     * Modifies the details of a specific customer based on the provided data.
     * Only the attributes included in the `$data` array will be updated.
     *
     * @param array{
     * type: string,
     * id: string,
     * attributes: array{
     * name?: string,
     * email?: string,
     * city?: string,
     * region?: string,
     * country?: string,
     * status?: 'archived'
     * }
     * } $data The data to update the customer with. The array must include the
     * customer's ID. Refer to the LemonSqueezy API documentation for
     * available attributes and their allowed values.
     *
     * @return Customer A `Customer` model instance representing the updated customer.
     *
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data, customer not found).
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If the provided payload does not contain the 'id' for the update.
     */
    public function update(array $data): Customer
    {
        self::assertThatPayloadHasId($data);

        $responseData = $this->patch(uri: "/customers/{$data['id']}", payload: $data);

        return Customer::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific customer.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given
     * customer ID.
     *
     * @param int $customerId The ID of the customer whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws HttpException If an error occurs during the HTTP request (e.g., customer not found).
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/customers/1/store
     */
    public function store(int $customerId): Store
    {
        $responseData = $this->get(uri: "/customers/{$customerId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves a list of orders associated with a specific customer.
     *
     * Fetches all order records that are linked to the customer with the given ID.
     *
     * @param int $customerId The ID of the customer whose orders to retrieve.
     *
     * @return Order[] An array of `Order` model instances representing the associated orders.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., customer not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/customers/1/orders
     */
    public function orders(int $customerId): array
    {
        $responseData = $this->get(uri: "/customers/{$customerId}/orders");

        return Order::fromArray($responseData);
    }

    /**
     * Retrieves a list of subscriptions associated with a specific customer.
     *
     * Fetches all subscription records that are linked to the customer with the
     * given ID.
     *
     * @param int $customerId The ID of the customer whose subscriptions to retrieve.
     *
     * @return Subscription[] An array of `Subscription` model instances representing
     * the associated subscriptions.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., customer not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/customers/1/subscriptions
     */
    public function subscriptions(int $customerId): array
    {
        $responseData = $this->get(uri: "/customers/{$customerId}/subscriptions");

        return Subscription::fromArray($responseData);
    }

    /**
     * Retrieves a list of license keys associated with a specific customer.
     *
     * Fetches all license key records that are linked to the customer with the
     * given ID.
     *
     * @param int $customerId The ID of the customer whose license keys to retrieve.
     *
     * @return LicenseKey[] An array of `LicenseKey` model instances representing
     * the associated license keys.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., customer not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/customers/1/license-keys
     */
    public function licenseKeys(int $customerId): array
    {
        $responseData = $this->get(uri: "/customers/{$customerId}/license-keys");

        return LicenseKey::fromArray($responseData);
    }
}
