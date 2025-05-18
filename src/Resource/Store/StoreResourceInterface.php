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

use Osirisgate\Component\Lemonsqueezy\Model\Discount\Discount;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Model\Webhook\Webhook;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * StoreResourceInterface – LemonSqueezy API store resource interface.
 *
 * Defines the contract for interacting with store resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources. Additionally,
 * it specifies methods for fetching related resources such as products, orders,
 * subscriptions, discounts, license keys, and webhooks associated with a given store.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface StoreResourceInterface extends ListableResourceInterface, RetrievableResourceInterface
{
    /**
     * Retrieves a list of products associated with a specific store.
     *
     * @param int $storeId The ID of the store.
     * @return Product[] An array of associated products.
     */
    public function products(int $storeId): array;

    /**
     * Retrieves a list of orders associated with a specific store.
     *
     * @param int $storeId The ID of the store.
     * @return Order[] An array of associated orders.
     */
    public function orders(int $storeId): array;

    /**
     * Retrieves a list of subscriptions associated with a specific store.
     *
     * @param int $storeId The ID of the store.
     * @return Subscription[] An array of associated subscriptions.
     */
    public function subscriptions(int $storeId): array;

    /**
     * Retrieves a list of discounts associated with a specific store.
     *
     * @param int $storeId The ID of the store.
     * @return Discount[] An array of associated discounts.
     */
    public function discounts(int $storeId): array;

    /**
     * Retrieves a list of license keys associated with a specific store.
     *
     * @param int $storeId The ID of the store.
     * @return LicenseKey[] An array of associated license keys.
     */
    public function licenseKeys(int $storeId): array;

    /**
     * Retrieves a list of webhooks associated with a specific store.
     *
     * @param int $storeId The ID of the store.
     * @return Webhook[] An array of associated webhooks.
     */
    public function webhooks(int $storeId): array;
}
