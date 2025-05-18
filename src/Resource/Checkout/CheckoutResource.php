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

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Checkout\Checkout;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * CheckoutResource – LemonSqueezy API checkout resource handler.
 *
 * Provides methods to create, list, and retrieve checkout records from the LemonSqueezy API.
 * This resource implements listing all checkouts, creating new checkouts, and retrieving
 * a single checkout by its ID, utilizing the `/checkouts` endpoints. It also provides
 * methods to fetch the associated store and variant for a given checkout.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class CheckoutResource extends Resource implements CheckoutResourceInterface
{
    /**
     * Creates a new checkout.
     *
     * Initiates the creation of a new checkout session with the specified data.
     * This allows you to generate a checkout URL for your customers to complete
     * their purchase.
     *
     * @param array{
     *      type: 'checkouts',
     *      attributes: array{
     *          custom_price?: int,
     *          product_options?: array{enabled_variants: list<int>},
     *          checkout_options?: array{button_color?: string},
     *          checkout_data?: array{
     *              discount_code?: string,
     *              custom?: array<string, mixed>
     *          },
     *          expires_at?: string, // ISO 8601 date
     *          preview?: bool
     *      },
     *      relationships: array{
     *          store: array{
     *              data: array{type: 'stores', id: string}
     *          },
     *          variant: array{
     *              data: array{type: 'variants', id: string}
     *          }
     *      }
     * } $data The checkout data to create. Refer to the LemonSqueezy API
     * documentation for the specific structure and allowed parameters.
     *
     * @return Checkout A `Checkout` model instance representing the newly created checkout.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., invalid data).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/checkouts/create-checkout
     */
    public function create(array $data): Checkout
    {
        $responseData = $this->post(uri: '/checkouts', payload: $data);

        return Checkout::from($responseData);
    }

    /**
     * Lists all checkout records.
     *
     * Retrieves a paginated list of all checkout sessions associated with your
     * LemonSqueezy account. You can optionally provide filters to narrow down
     * the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Checkout[] An array of `Checkout` model instances representing the retrieved checkouts.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/checkouts/list-all-checkouts
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/checkouts', filters: $filters, options: $options);

        return Checkout::fromArray($responseData);
    }

    /**
     * Retrieves a single checkout record by its ID.
     *
     * Fetches the details of a specific checkout session based on the provided
     * unique identifier.
     *
     * @param int $id The ID of the checkout to retrieve.
     *
     * @return Checkout A `Checkout` model instance representing the requested checkout.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., checkout not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/checkouts/retrieve-checkout
     */
    public function find(int $id): Checkout
    {
        $responseData = $this->get(uri: "/checkouts/{$id}");

        return Checkout::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific checkout.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given
     * checkout ID.
     *
     * @param int $checkoutId The ID of the checkout whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., checkout not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/checkouts/ac470bd4-7c41-474d-b6cd-0f296f5be02a/store
     */
    public function store(int $checkoutId): Store
    {
        $responseData = $this->get(uri: "/checkouts/{$checkoutId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves the variant associated with a specific checkout.
     *
     * Fetches the details of the product variant that is linked to the given
     * checkout ID.
     *
     * @param int $checkoutId The ID of the checkout whose variant to retrieve.
     *
     * @return Variant A `Variant` model instance representing the associated variant.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., checkout not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/checkouts/ac470bd4-7c41-474d-b6cd-0f296f5be02a/variant
     */
    public function variant(int $checkoutId): Variant
    {
        $responseData = $this->get(uri: "/checkouts/{$checkoutId}/variant");

        return Variant::from($responseData);
    }
}
