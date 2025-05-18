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

use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice\SubscriptionInvoice;
use Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice\SubscriptionInvoiceDownloader;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * SubscriptionInvoiceResourceInterface – LemonSqueezy API subscription invoice resource interface.
 *
 * Defines the contract for interacting with subscription invoice resources in the
 * LemonSqueezy API. It extends interfaces for listing and retrieving single resources.
 * Additionally, it specifies methods for generating invoices, making refunds, and
 * fetching related resources such as the store, subscription, and customer for a
 * given subscription invoice.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/subscription-invoices
 */
interface SubscriptionInvoiceResourceInterface extends ListableResourceInterface, RetrievableResourceInterface
{
    /**
     * Generates a PDF invoice for a specific subscription invoice.
     *
     * @param int $id The ID of the subscription invoice for which to generate the invoice.
     * @param array<string, mixed> $filters Optional filters to apply when generating the invoice.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     * @return SubscriptionInvoiceDownloader An object containing information to download the invoice.
     */
    public function generateInvoice(int $id, array $filters): SubscriptionInvoiceDownloader;

    /**
     * Initiates a refund for a specific subscription invoice.
     *
     * @param array<string, mixed> $data An associative array containing the data for the refund.
     * Refer to the LemonSqueezy API documentation for
     * required parameters (e.g., subscription invoice ID, refund amount).
     * @return SubscriptionInvoice A model representing the updated subscription invoice after the refund.
     */
    public function makeRefund(array $data): SubscriptionInvoice;

    /**
     * Retrieves the store associated with a specific subscription invoice.
     *
     * @param int $subscriptionInvoiceId The ID of the subscription invoice.
     * @return Store The associated store.
     */
    public function store(int $subscriptionInvoiceId): Store;

    /**
     * Retrieves the subscription associated with a specific subscription invoice.
     *
     * @param int $subscriptionInvoiceId The ID of the subscription invoice.
     * @return Subscription The associated subscription.
     */
    public function subscription(int $subscriptionInvoiceId): Subscription;

    /**
     * Retrieves the customer associated with a specific subscription invoice.
     *
     * @param int $subscriptionInvoiceId The ID of the subscription invoice.
     * @return Customer The associated customer.
     */
    public function customer(int $subscriptionInvoiceId): Customer;
}
