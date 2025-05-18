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

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\File\File;
use Osirisgate\Component\Lemonsqueezy\Model\Price\Price;
use Osirisgate\Component\Lemonsqueezy\Model\Product\Product;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * VariantResource – Handles LemonSqueezy variant resources.
 *
 * Provides methods to list all product variants and retrieve a specific variant by its ID.
 * It also offers methods to fetch the associated product, files, and price.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class VariantResource extends Resource implements VariantResourceInterface
{
    /**
     * Lists all product variant records.
     *
     * Retrieves a paginated list of all variants associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Variant[] An array of `Variant` model instances representing the
     * retrieved variants.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/variants/list-all-variants
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/variants', filters: $filters, options: $options);

        return Variant::fromArray($responseData);
    }

    /**
     * Retrieves a single product variant record by its ID.
     *
     * Fetches the details of a specific variant based on the provided unique
     * identifier.
     *
     * @param int $id The ID of the variant to retrieve.
     *
     * @return Variant A `Variant` model instance representing the requested variant.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., variant not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/variants/retrieve-variant
     */
    public function find(int $id): Variant
    {
        $responseData = $this->get(uri: "/variants/{$id}");

        return Variant::from($responseData);
    }

    /**
     * Retrieves the product associated with a specific variant.
     *
     * Fetches the details of the product that the variant with the given ID
     * belongs to.
     *
     * @param int $variantId The ID of the variant whose product to retrieve.
     *
     * @return Product A `Product` model instance representing the associated product.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., variant not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/variants/1/product
     */
    public function product(int $variantId): Product
    {
        $responseData = $this->get(uri: "/variants/{$variantId}/product");

        return Product::from($responseData);
    }

    /**
     * Retrieves a list of files associated with a specific variant.
     *
     * Fetches all file records that are linked to the variant with the given ID.
     *
     * @param int $variantId The ID of the variant whose files to retrieve.
     *
     * @return File[] An array of `File` model instances representing the associated
     * files.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., variant not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/variants/1/files
     */
    public function files(int $variantId): array
    {
        $responseData = $this->get(uri: "/variants/{$variantId}/files");

        return File::fromArray($responseData);
    }

    /**
     * Retrieves the price associated with a specific variant.
     *
     * Fetches the details of the price model that is applied to the variant
     * with the given ID.
     *
     * @param int $variantId The ID of the variant whose price to retrieve.
     *
     * @return Price A `Price` model instance representing the associated price.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., variant not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/variants/1/price-model
     */
    public function price(int $variantId): Price
    {
        $responseData = $this->get(uri: "/variants/{$variantId}/price-model");

        return Price::from($responseData);
    }
}
