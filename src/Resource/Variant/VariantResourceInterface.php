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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Variant;

use Osirisgate\Component\Lemonsqueezy\Model\File\File;
use Osirisgate\Component\Lemonsqueezy\Model\Price\Price;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * VariantResourceInterface – LemonSqueezy API variant resource interface.
 *
 * Defines the contract for interacting with variant resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources. Additionally,
 * it specifies methods for fetching the associated product, files, and price for a
 * given variant.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface VariantResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface
{
    /**
     * Retrieves the product associated with a specific variant.
     *
     * @param int $variantId The ID of the variant.
     * @return Product The associated product.
     */
    public function product(int $variantId): Product;

    /**
     * Retrieves a list of files associated with a specific variant.
     *
     * @param int $variantId The ID of the variant.
     * @return File[] An array of associated files.
     */
    public function files(int $variantId): array;

    /**
     * Retrieves the price associated with a specific variant.
     *
     * @param int $variantId The ID of the variant.
     * @return Price The associated price.
     */
    public function price(int $variantId): Price;
}
