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

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * ProductResource – Handles LemonSqueezy product resources.
 *
 * Provides methods to list all products and retrieve a specific product.
 * It also offers methods to fetch the associated store and variants for a given product.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class ProductResource extends Resource implements ProductResourceInterface
{
    /**
     * Lists all product records.
     *
     * Retrieves a paginated list of all products associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Product[] An array of `Product` model instances representing the retrieved products.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     *
     * @url https://docs.lemonsqueezy.com/api/products/list-all-products
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/products', filters: $filters, options: $options);

        return Product::fromArray($responseData);
    }

    /**
     * Retrieves a single product record by its ID.
     *
     * Fetches the details of a specific product based on the provided unique identifier.
     *
     * @param int $id The ID of the product to retrieve.
     *
     * @return Product A `Product` model instance representing the requested product.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., product not found).
     *
     * @url https://docs.lemonsqueezy.com/api/products/retrieve-product
     */
    public function find(int $id): Product
    {
        $responseData = $this->get(uri: "/products/{$id}");

        return Product::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific product.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given
     * product ID.
     *
     * @param int $productId The ID of the product whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., product not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/products/1/store
     */
    public function store(int $productId): Store
    {
        $responseData = $this->get(uri: "/products/{$productId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves a list of variants associated with a specific product.
     *
     * Fetches all variant records that are linked to the product with the given ID.
     *
     * @param int $productId The ID of the product whose variants to retrieve.
     *
     * @return Variant[] An array of `Variant` model instances representing the associated variants.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., product not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/products/1/variants
     */
    public function variants(int $productId): array
    {
        $responseData = $this->get(uri: "/products/{$productId}/variants");

        return Variant::fromArray($responseData);
    }
}
