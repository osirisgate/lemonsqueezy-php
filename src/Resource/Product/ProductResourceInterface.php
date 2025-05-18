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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Product;

use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * ProductResourceInterface – LemonSqueezy API product resource interface.
 *
 * Defines the contract for interacting with product resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources. Additionally,
 * it specifies methods for fetching the associated store and variants for a given product.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface ProductResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface
{
    /**
     * Retrieves the store associated with a specific product.
     *
     * @param int $productId The ID of the product.
     * @return Store The associated store.
     */
    public function store(int $productId): Store;

    /**
     * Retrieves a list of variants associated with a specific product.
     *
     * @param int $productId The ID of the product.
     * @return Variant[] An array of associated variants.
     */
    public function variants(int $productId): array;
}
