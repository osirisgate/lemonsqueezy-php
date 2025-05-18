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

use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem\OrderItem;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\SubscriptionItem\SubscriptionItem;
use Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice\SubscriptionInvoice;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\CancelableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\UpdatableResourceInterface;

/**
 * SubscriptionResourceInterface – LemonSqueezy API subscription resource interface.
 *
 * Defines the contract for interacting with subscription resources in the LemonSqueezy API.
 * It extends interfaces for listing, retrieving single resources, updating existing
 * resources, and canceling resources. Additionally, it specifies methods for fetching
 * related resources such as the store, customer, order, order item, product, variant,
 * subscription items, and subscription invoices for a given subscription.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface SubscriptionResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface,
    UpdatableResourceInterface,
    CancelableResourceInterface
{
    /**
     * Retrieves the store associated with a specific subscription.
     *
     * @param int $subscriptionId The ID of the subscription.
     * @return Store The associated store.
     */
    public function store(int $subscriptionId): Store;

    /**
     * Retrieves the customer associated with a specific subscription.
     *
     * @param int $subscriptionId The ID of the subscription.
     * @return Customer The associated customer.
     */
    public function customer(int $subscriptionId): Customer;

    /**
     * Retrieves the order associated with a specific subscription.
     *
     * @param int $subscriptionId The ID of the subscription.
     * @return Order The associated order.
     */
    public function order(int $subscriptionId): Order;

    /**
     * Retrieves the order item associated with a specific subscription.
     *
     * @param int $subscriptionId The ID of the subscription.
     * @return OrderItem The associated order item.
     */
    public function orderItem(int $subscriptionId): OrderItem;

    /**
     * Retrieves the product associated with a specific subscription.
     *
     * @param int $subscriptionId The ID of the subscription.
     * @return Product The associated product.
     */
    public function product(int $subscriptionId): Product;

    /**
     * Retrieves the variant associated with a specific subscription.
     *
     * @param int $subscriptionId The ID of the subscription.
     * @return Variant The associated variant.
     */
    public function variant(int $subscriptionId): Variant;

    /**
     * Retrieves a list of subscription items associated with a specific subscription.
     *
     * @param int $subscriptionId The ID of the subscription.
     * @return SubscriptionItem[] An array of associated subscription items.
     */
    public function subscriptionItems(int $subscriptionId): array;

    /**
     * Retrieves a list of subscription invoices associated with a specific subscription.
     *
     * @param int $subscriptionId The ID of the subscription.
     * @return SubscriptionInvoice[] An array of associated subscription invoices.
     */
    public function subscriptionInvoices(int $subscriptionId): array;
}
