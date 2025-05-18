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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Subscription;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem\OrderItem;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem\SubscriptionItem;
use Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice\SubscriptionInvoice;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * SubscriptionResource – Handles LemonSqueezy subscription resources.
 *
 * Provides methods to list all subscriptions, retrieve a specific subscription,
 * update subscription details, and cancel a subscription.
 * It also offers methods to fetch related resources such as the store, customer,
 * order, order item, product, variant, subscription items, and subscription invoices.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionResource extends Resource implements SubscriptionResourceInterface
{
    /**
     * Cancels a subscription by its ID.
     *
     * Sends a request to the LemonSqueezy API to cancel the subscription with the
     * given ID.
     *
     * @param int $id The ID of the subscription to cancel.
     *
     * @return Subscription A `Subscription` model instance representing the canceled subscription.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     *
     * @url https://docs.lemonsqueezy.com/api/subscriptions/cancel-subscription
     */
    public function cancel(int $id): Subscription
    {
        $responseData = $this->remove(uri: "/subscriptions/{$id}");

        return Subscription::from($responseData);
    }

    /**
     * Lists all subscription records.
     *
     * Retrieves a paginated list of all subscriptions associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down
     * the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Subscription[] An array of `Subscription` model instances representing
     * the retrieved subscriptions.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     *
     * @url https://docs.lemonsqueezy.com/api/subscriptions/list-all-subscriptions
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/subscriptions', filters: $filters, options: $options);

        return Subscription::fromArray($responseData);
    }

    /**
     * Retrieves a single subscription record by its ID.
     *
     * Fetches the details of a specific subscription based on the provided unique
     * identifier.
     *
     * @param int $id The ID of the subscription to retrieve.
     *
     * @return Subscription A `Subscription` model instance representing the requested
     * subscription.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     *
     * @url https://docs.lemonsqueezy.com/api/subscriptions/retrieve-subscription
     */
    public function find(int $id): Subscription
    {
        $responseData = $this->get(uri: "/subscriptions/{$id}");

        return Subscription::from($responseData);
    }

    /**
     * Updates an existing subscription record.
     *
     * Modifies the details of a specific subscription based on the provided data.
     * Only the attributes included in the `$data` array will be updated.
     *
     * @param array{
     * type: 'subscriptions',
     * id: string,
     * attributes: array<string, mixed>
     * } $data The subscription data to update. The array must include the
     * subscription's ID. Refer to the LemonSqueezy API documentation for
     * available attributes and their allowed values.
     *
     * @return Subscription A `Subscription` model instance representing the updated
     * subscription.
     *
     * @throws RuntimeException If the provided payload does not contain the 'id' for the update.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data, subscription not found).
     *
     * @url https://docs.lemonsqueezy.com/api/subscriptions/update-subscription
     */
    public function update(array $data): Subscription
    {
        self::assertThatPayloadHasId($data);
        $responseData = $this->patch(uri: "/subscriptions/{$data['id']}", payload: $data);

        return Subscription::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific subscription.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given
     * subscription ID.
     *
     * @param int $subscriptionId The ID of the subscription whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscriptions/1/store
     */
    public function store(int $subscriptionId): Store
    {
        $responseData = $this->get(uri: "/subscriptions/{$subscriptionId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves the customer associated with a specific subscription.
     *
     * Fetches the details of the customer who owns the subscription with the
     * given ID.
     *
     * @param int $subscriptionId The ID of the subscription whose customer to retrieve.
     *
     * @return Customer A `Customer` model instance representing the associated customer.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscriptions/1/customer
     */
    public function customer(int $subscriptionId): Customer
    {
        $responseData = $this->get(uri: "/subscriptions/{$subscriptionId}/customer");

        return Customer::from($responseData);
    }

    /**
     * Retrieves the order associated with a specific subscription.
     *
     * Fetches the details of the original order that created the subscription
     * with the given ID.
     *
     * @param int $subscriptionId The ID of the subscription whose order to retrieve.
     *
     * @return Order An `Order` model instance representing the associated order.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscriptions/1/order
     */
    public function order(int $subscriptionId): Order
    {
        $responseData = $this->get(uri: "/subscriptions/{$subscriptionId}/order");

        return Order::from($responseData);
    }

    /**
     * Retrieves the order item associated with a specific subscription.
     *
     * Fetches the details of the specific item within the original order that
     * created the subscription with the given ID.
     *
     * @param int $subscriptionId The ID of the subscription whose order item to retrieve.
     *
     * @return OrderItem An `OrderItem` model instance representing the associated order item.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscriptions/1/order-item
     */
    public function orderItem(int $subscriptionId): OrderItem
    {
        $responseData = $this->get(uri: "/subscriptions/{$subscriptionId}/order-item");

        return OrderItem::from($responseData);
    }

    /**
     * Retrieves the product associated with a specific subscription.
     *
     * Fetches the details of the product for which the subscription with the
     * given ID is active.
     *
     * @param int $subscriptionId The ID of the subscription whose product to retrieve.
     *
     * @return Product A `Product` model instance representing the associated product.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscriptions/1/product
     */
    public function product(int $subscriptionId): Product
    {
        $responseData = $this->get(uri: "/subscriptions/{$subscriptionId}/product");

        return Product::from($responseData);
    }

    /**
     * Retrieves the variant associated with a specific subscription.
     *
     * Fetches the details of the specific variant of the product that the
     * subscription with the given ID is for.
     *
     * @param int $subscriptionId The ID of the subscription whose variant to retrieve.
     *
     * @return Variant A `Variant` model instance representing the associated variant.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscriptions/1/variant
     */
    public function variant(int $subscriptionId): Variant
    {
        $responseData = $this->get(uri: "/subscriptions/{$subscriptionId}/variant");

        return Variant::from($responseData);
    }

    /**
     * Retrieves a list of subscription items associated with a specific subscription.
     *
     * Fetches all individual items within the subscription with the given ID.
     *
     * @param int $subscriptionId The ID of the subscription whose subscription items
     * to retrieve.
     *
     * @return SubscriptionItem[] An array of `SubscriptionItem` model instances
     * representing the associated subscription items.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscriptions/1/subscription-items
     */
    public function subscriptionItems(int $subscriptionId): array
    {
        $responseData = $this->get(uri: "/subscriptions/{$subscriptionId}/subscription-items");

        return SubscriptionItem::fromArray($responseData);
    }

    /**
     * Retrieves a list of subscription invoices associated with a specific subscription.
     *
     * Fetches all invoices that have been generated for the subscription with the
     * given ID.
     *
     * @param int $subscriptionId The ID of the subscription whose subscription invoices
     * to retrieve.
     *
     * @return SubscriptionInvoice[] An array of `SubscriptionInvoice` model instances
     * representing the associated subscription invoices.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscriptions/1/subscription-invoices
     */
    public function subscriptionInvoices(int $subscriptionId): array
    {
        $responseData = $this->get(uri: "/subscriptions/{$subscriptionId}/subscription-invoices");

        return SubscriptionInvoice::fromArray($responseData);
    }
}
