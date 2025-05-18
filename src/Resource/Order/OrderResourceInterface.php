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

use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\DiscountRedemption\DiscountRedemption;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderInvoiceDownloader;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem\OrderItem;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * OrderResourceInterface – LemonSqueezy API order resource interface.
 *
 * Defines the contract for interacting with order resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources. Additionally,
 * it specifies methods for generating invoices, making refunds, and fetching
 * related resources such as the store, customer, order items, subscriptions,
 * license keys, and discount redemptions for a given order.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/orders
 */
interface OrderResourceInterface extends ListableResourceInterface, RetrievableResourceInterface
{
    /**
     * Generates a PDF invoice for a specific order.
     *
     * @param int $id The ID of the order for which to generate the invoice.
     * @param array<string, mixed> $filters Optional filters to apply when generating the invoice.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     * @return OrderInvoiceDownloader An object containing information to download the invoice.
     */
    public function generateInvoice(int $id, array $filters): OrderInvoiceDownloader;

    /**
     * Initiates a refund for a specific order.
     *
     * @param array<string, mixed> $data An associative array containing the data for the refund.
     * Refer to the LemonSqueezy API documentation for
     * required parameters (e.g., order ID, refund amount).
     * @return Order A model representing the updated order after the refund.
     */
    public function makeRefund(array $data): Order;

    /**
     * Retrieves the store associated with a specific order.
     *
     * @param int $orderId The ID of the order.
     * @return Store The associated store.
     */
    public function store(int $orderId): Store;

    /**
     * Retrieves the customer associated with a specific order.
     *
     * @param int $orderId The ID of the order.
     * @return Customer The associated customer.
     */
    public function customer(int $orderId): Customer;

    /**
     * Retrieves a list of order items associated with a specific order.
     *
     * @param int $orderId The ID of the order.
     * @return OrderItem[] An array of associated order items.
     */
    public function orderItems(int $orderId): array;

    /**
     * Retrieves a list of subscriptions associated with a specific order.
     *
     * @param int $orderId The ID of the order.
     * @return Subscription[] An array of associated subscriptions.
     */
    public function subscriptions(int $orderId): array;

    /**
     * Retrieves a list of license keys associated with a specific order.
     *
     * @param int $orderId The ID of the order.
     * @return LicenseKey[] An array of associated license keys.
     */
    public function licenseKeys(int $orderId): array;

    /**
     * Retrieves a list of discount redemptions associated with a specific order.
     *
     * @param int $orderId The ID of the order.
     * @return DiscountRedemption[] An array of associated discount redemptions.
     */
    public function discountRedemptions(int $orderId): array;
}
