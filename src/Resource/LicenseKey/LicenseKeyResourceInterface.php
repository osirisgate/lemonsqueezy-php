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

use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKeyInstance\LicenseKeyInstance;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Order\OrderItem\OrderItem;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\UpdatableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;

/**
 * LicenseKeyResourceInterface – LemonSqueezy License Keys resource interface.
 *
 * Defines the contract for interacting with license key resources in the LemonSqueezy API.
 * It extends interfaces for listing, retrieving single resources, and updating
 * existing resources. Additionally, it specifies methods for fetching related
 * resources such as the store, customer, order, order item, product, and license
 * key instances for a given license key.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface LicenseKeyResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface,
    UpdatableResourceInterface
{
    /**
     * Retrieves the store associated with a specific license key.
     *
     * @param int $licenseKeyId The ID of the license key.
     * @return Store The associated store.
     */
    public function store(int $licenseKeyId): Store;

    /**
     * Retrieves the customer associated with a specific license key.
     *
     * @param int $licenseKeyId The ID of the license key.
     * @return Customer The associated customer.
     */
    public function customer(int $licenseKeyId): Customer;

    /**
     * Retrieves the order associated with a specific license key.
     *
     * @param int $licenseKeyId The ID of the license key.
     * @return Order The associated order.
     */
    public function order(int $licenseKeyId): Order;

    /**
     * Retrieves the order item associated with a specific license key.
     *
     * @param int $licenseKeyId The ID of the license key.
     * @return OrderItem The associated order item.
     */
    public function orderItem(int $licenseKeyId): OrderItem;

    /**
     * Retrieves the product associated with a specific license key.
     *
     * @param int $licenseKeyId The ID of the license key.
     * @return Product The associated product.
     */
    public function product(int $licenseKeyId): Product;

    /**
     * Retrieves a list of license key instances associated with a specific license key.
     *
     * @param int $licenseKeyId The ID of the license key.
     * @return LicenseKeyInstance[] An array of associated license key instances.
     */
    public function licenseKeyInstances(int $licenseKeyId): array;
}
