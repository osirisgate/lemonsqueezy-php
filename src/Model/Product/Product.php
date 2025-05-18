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

namespace Osirisgate\Component\Lemonsqueezy\Model\Product;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Product – LemonSqueezy API product model.
 *
 * Represents a product entity within the LemonSqueezy API.
 * Products are the digital or physical goods that merchants offer to their customers.
 * This class serves as a container for the detailed attributes of a product,
 * which are accessible through the `ProductAttributes` object.
 *
 * By using this model, developers can interact with product data in a structured
 * and object-oriented way, making it easier to retrieve and manage product
 * information from the LemonSqueezy API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/products/the-product-object
 * Refer to the LemonSqueezy API documentation for comprehensive details
 * about the product object and its associated attributes.
 */
final class Product extends Model
{
    /**
     * @var ProductAttributes The attributes of this product.
     */
    private ProductAttributes $attributes;

    /**
     * Returns the attributes of this product.
     *
     * This method provides access to the `ProductAttributes` object, which
     * contains all the specific details and properties of this product
     * as retrieved from the LemonSqueezy API.
     *
     * @return ProductAttributes The attributes of the product.
     */
    public function attributes(): ProductAttributes
    {
        return $this->attributes;
    }
}
