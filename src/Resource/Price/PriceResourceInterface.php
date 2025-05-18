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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Price;

use Osirisgate\Component\Lemonsqueezy\Model\Price\Price;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * PriceResourceInterface – LemonSqueezy API price resource interface.
 *
 * Defines the contract for interacting with price resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources. Additionally,
 * it specifies a method for fetching the associated variant for a given price.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface PriceResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface
{
    /**
     * Retrieves the variant associated with a specific price.
     *
     * @param int $priceId The ID of the price.
     * @return Variant The associated variant.
     */
    public function variant(int $priceId): Variant;
}
