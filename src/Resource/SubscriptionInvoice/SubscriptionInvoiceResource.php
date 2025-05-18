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

namespace Osirisgate\Component\Lemonsqueezy\Resource\SubscriptionInvoice;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice\SubscriptionInvoice;
use Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice\SubscriptionInvoiceDownloader;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * SubscriptionInvoiceResource – Handles LemonSqueezy subscription invoice resources.
 *
 * Provides methods to list all subscription invoices, retrieve a specific subscription invoice,
 * generate an invoice for a subscription, and issue refunds on subscription invoices.
 * It also offers methods to fetch the associated store, subscription, and customer.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionInvoiceResource extends Resource implements SubscriptionInvoiceResourceInterface
{
    /**
     * Lists all subscription invoice records.
     *
     * Retrieves a paginated list of all subscription invoices associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down
     * the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return SubscriptionInvoice[] An array of `SubscriptionInvoice` model instances
     * representing the retrieved subscription invoices.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/subscription-invoices/list-all-subscription-invoices
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/subscription-invoices', filters: $filters, options: $options);

        return SubscriptionInvoice::fromArray($responseData);
    }

    /**
     * Retrieves a single subscription invoice record by its ID.
     *
     * Fetches the details of a specific subscription invoice based on the provided
     * unique identifier.
     *
     * @param int $id The ID of the subscription invoice to retrieve.
     *
     * @return SubscriptionInvoice A `SubscriptionInvoice` model instance representing
     * the requested subscription invoice.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., subscription invoice not found).
     *
     * @url https://docs.lemonsqueezy.com/api/subscription-invoices/retrieve-subscription-invoice
     */
    public function find(int $id): SubscriptionInvoice
    {
        $responseData = $this->get(uri: "/subscription-invoices/{$id}");

        return SubscriptionInvoice::from($responseData);
    }

    /**
     * Generates a PDF invoice for a specific subscription.
     *
     * Sends a request to the LemonSqueezy API to generate a PDF invoice for the
     * subscription invoice with the given ID.
     *
     * @param int $id The ID of the subscription invoice for which to generate the invoice.
     * @param array<string, mixed> $filters Optional filters to apply when generating the invoice.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return SubscriptionInvoiceDownloader An object containing information to
     * download the generated invoice.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request.
     *
     * @url https://docs.lemonsqueezy.com/api/subscription-invoices/generate-subscription-invoice
     */
    public function generateInvoice(int $id, array $filters): SubscriptionInvoiceDownloader
    {
        $responseData = $this->post(
            uri: "/subscription-invoices/{$id}/generate-invoice",
            filters: $filters,
            withNestedFilter: false,
            fieldName: 'meta.urls'
        );

        return SubscriptionInvoiceDownloader::from($responseData);
    }

    /**
     * Issues a refund for a specific subscription invoice.
     *
     * Sends a request to the LemonSqueezy API to initiate a refund for the
     * subscription invoice with the given ID. The `$data` array should contain
     * the necessary information for the refund.
     *
     * @param array{
     * type: "subscription-invoices",
     * id: string,
     * attributes: array{
     * amount?: int
     * }
     * } $data The data to refund a subscription invoice. The array must include
     * the subscription invoice's ID. Refer to the LemonSqueezy API documentation
     * for required parameters (e.g., refund amount).
     *
     * @return SubscriptionInvoice A model representing the updated subscription
     * invoice after the refund.
     *
     * @throws RuntimeException If the provided payload does not contain the 'id'
     * for the refund.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g.,
     * invalid data, subscription invoice not found).
     *
     * @url https://docs.lemonsqueezy.com/api/subscription-invoices/issue-refund
     */
    public function makeRefund(array $data): SubscriptionInvoice
    {
        self::assertThatPayloadHasId($data);

        $responseData = $this->post(
            uri: "/subscription-invoices/{$data['id']}/refund",
            payload: $data,
        );

        return SubscriptionInvoice::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific subscription invoice.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given
     * subscription invoice ID.
     *
     * @param int $subscriptionInvoiceId The ID of the subscription invoice whose
     * store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g.,
     * subscription invoice not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscription-invoices/1/store
     */
    public function store(int $subscriptionInvoiceId): Store
    {
        $responseData = $this->get(uri: "/subscription-invoices/{$subscriptionInvoiceId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves the subscription associated with a specific subscription invoice.
     *
     * Fetches the details of the subscription for which the invoice with the
     * given ID was generated.
     *
     * @param int $subscriptionInvoiceId The ID of the subscription invoice whose
     * subscription to retrieve.
     *
     * @return Subscription A `Subscription` model instance representing the
     * associated subscription.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g.,
     * subscription invoice not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscription-invoices/1/subscription
     */
    public function subscription(int $subscriptionInvoiceId): Subscription
    {
        $responseData = $this->get(uri: "/subscription-invoices/{$subscriptionInvoiceId}/subscription");

        return Subscription::from($responseData);
    }

    /**
     * Retrieves the customer associated with a specific subscription invoice.
     *
     * Fetches the details of the customer who is associated with the subscription
     * invoice with the given ID.
     *
     * @param int $subscriptionInvoiceId The ID of the subscription invoice whose
     * customer to retrieve.
     *
     * @return Customer A `Customer` model instance representing the associated
     * customer.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g.,
     * subscription invoice not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/subscription-invoices/1/customer
     */
    public function customer(int $subscriptionInvoiceId): Customer
    {
        $responseData = $this->get(uri: "/subscription-invoices/{$subscriptionInvoiceId}/customer");

        return Customer::from($responseData);
    }
}
