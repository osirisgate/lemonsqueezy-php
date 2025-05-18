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

namespace Osirisgate\Component\Lemonsqueezy\Resource\DiscountRedemption;

use Osirisgate\Component\Lemonsqueezy\Model\Discount\Discount;
use Osirisgate\Component\Lemonsqueezy\Model\Order\Order;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;

/**
 * DiscountRedemptionResourceInterface – LemonSqueezy API discount redemption resource interface.
 *
 * Defines the contract for interacting with discount redemption resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources. Additionally, it
 * specifies methods for fetching the associated discount and order for a given
 * discount redemption.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface DiscountRedemptionResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface
{
    /**
     * Retrieves the discount associated with a specific discount redemption.
     *
     * @param int $discountRedemptionId The ID of the discount redemption.
     * @return Discount The associated discount.
     */
    public function discount(int $discountRedemptionId): Discount;

    /**
     * Retrieves the order associated with a specific discount redemption.
     *
     * @param int $discountRedemptionId The ID of the discount redemption.
     * @return Order The associated order.
     */
    public function order(int $discountRedemptionId): Order;
}
