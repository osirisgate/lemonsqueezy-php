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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Checkout;

use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\CreatableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * CheckoutResourceInterface – LemonSqueezy API checkout resource interface.
 *
 * Defines the contract for interacting with checkout resources in the LemonSqueezy API.
 * It extends interfaces for listing, retrieving single resources, and creating new
 * resources. Additionally, it specifies methods for fetching the associated store
 * and variant for a given checkout.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface CheckoutResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface,
    CreatableResourceInterface
{
    /**
     * Retrieves the store associated with a specific checkout.
     *
     * @param int $checkoutId The ID of the checkout.
     * @return Store The associated store.
     */
    public function store(int $checkoutId): Store;

    /**
     * Retrieves the variant associated with a specific checkout.
     *
     * @param int $checkoutId The ID of the checkout.
     * @return Variant The associated variant.
     */
    public function variant(int $checkoutId): Variant;
}
