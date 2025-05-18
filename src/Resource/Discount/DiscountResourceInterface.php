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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Discount;

use Osirisgate\Component\Lemonsqueezy\Model\Discount\Discount;
use Osirisgate\Component\Lemonsqueezy\Model\DiscountRedemption\DiscountRedemption;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\CreatableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\DeletableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;

/**
 * DiscountResourceInterface – LemonSqueezy API discount resource interface.
 *
 * Defines the contract for interacting with discount resources in the LemonSqueezy API.
 * It extends interfaces for listing, retrieving single resources, creating new
 * resources, and deleting existing resources. Additionally, it specifies methods
 * for fetching the associated store, variants, and discount redemptions for a
 * given discount.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface DiscountResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface,
    CreatableResourceInterface,
    DeletableResourceInterface
{
    /**
     * Retrieves the store associated with a specific discount.
     *
     * @param int $discountId The ID of the discount.
     * @return Store The associated store.
     */
    public function store(int $discountId): Store;

    /**
     * Retrieves a list of variants associated with a specific discount.
     *
     * @param int $discountId The ID of the discount.
     * @return Variant[] An array of associated variants.
     */
    public function variants(int $discountId): array;

    /**
     * Retrieves a list of discount redemptions associated with a specific discount.
     *
     * @param int $discountId The ID of the discount.
     * @return DiscountRedemption[] An array of associated discount redemptions.
     */
    public function discountRedemptions(int $discountId): array;
}
