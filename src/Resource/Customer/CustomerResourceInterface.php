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

use Osirisgate\Component\Lemonsqueezy\Model\Customer\Customer;
use Osirisgate\Component\Lemonsqueezy\Model\LicenseKey\LicenseKey;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Subscription\Subscription;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\CreatableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\UpdatableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;

/**
 * CustomerResourceInterface – LemonSqueezy API customer resource interface.
 *
 * Defines the contract for interacting with customer resources in the LemonSqueezy API.
 * It extends interfaces for listing, retrieving single resources, creating new
 * resources, and updating existing resources. Additionally, it specifies methods
 * for fetching the associated store, orders, subscriptions, and license keys
 * for a given customer.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface CustomerResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface,
    CreatableResourceInterface,
    UpdatableResourceInterface
{
    /**
     * Retrieves the store associated with a specific customer.
     *
     * @param int $customerId The ID of the customer.
     * @return Store The associated store.
     */
    public function store(int $customerId): Store;

    /**
     * Retrieves a list of orders associated with a specific customer.
     *
     * @param int $customerId The ID of the customer.
     * @return Order[] An array of associated orders.
     */
    public function orders(int $customerId): array;

    /**
     * Retrieves a list of subscriptions associated with a specific customer.
     *
     * @param int $customerId The ID of the customer.
     * @return Subscription[] An array of associated subscriptions.
     */
    public function subscriptions(int $customerId): array;

    /**
     * Retrieves a list of license keys associated with a specific customer.
     *
     * @param int $customerId The ID of the customer.
     * @return LicenseKey[] An array of associated license keys.
     */
    public function licenseKeys(int $customerId): array;
}
