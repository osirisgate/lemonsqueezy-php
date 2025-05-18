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

namespace Osirisgate\Component\Lemonsqueezy\Model\Variant;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Variant – Represents a product variant in LemonSqueezy.
 *
 * A variant represents a specific version or option of a Product offered
 * on LemonSqueezy. Each variant can have its own unique pricing structure,
 * associated downloadable files, and settings for license key generation
 * and management. This model acts as a container for the `VariantAttributes`
 * object, which holds the detailed information about a particular product variant.
 *
 * By using this model, developers can access and interact with the specific
 * properties of each product variant, such as its name, pricing details,
 * and any associated resources.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/variants/the-variant-object
 * Refer to the LemonSqueezy API documentation for comprehensive details
 * about the variant object and its associated attributes.
 */
final class Variant extends Model
{
    /**
     * @var VariantAttributes The attributes of this product variant.
     */
    private VariantAttributes $attributes;

    /**
     * Returns the attributes of this product variant.
     *
     * This method provides access to the `VariantAttributes` object, which
     * contains all the specific details and properties of this product variant
     * as retrieved from the LemonSqueezy API.
     *
     * @return VariantAttributes The attributes of the product variant.
     */
    public function attributes(): VariantAttributes
    {
        return $this->attributes;
    }
}
