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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Affiliate;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\Affiliate\Affiliate;
use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\User\User;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * AffiliateResource – LemonSqueezy API affiliate resource handler.
 *
 * Provides methods to retrieve and list affiliate records from the LemonSqueezy API.
 * This resource implements both listing all affiliates and retrieving a single
 * affiliate by its ID, utilizing the `/affiliates` endpoints. It also provides
 * methods to fetch the associated store and user for a given affiliate.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class AffiliateResource extends Resource implements AffiliateResourceInterface
{
    /**
     * Lists all affiliate records.
     *
     * Retrieves a paginated list of all affiliates associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return Affiliate[] An array of `Affiliate` model instances representing the retrieved affiliates.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/affiliates/list-all-affiliates
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/affiliates', filters: $filters, options: $options);

        return Affiliate::fromArray($responseData);
    }

    /**
     * Retrieves a single affiliate record by its ID.
     *
     * Fetches the details of a specific affiliate based on the provided unique identifier.
     *
     * @param int $id The ID of the affiliate to retrieve.
     *
     * @return Affiliate An `Affiliate` model instance representing the requested affiliate.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., affiliate not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/affiliates/retrieve-affiliate
     */
    public function find(int $id): Affiliate
    {
        $responseData = $this->get(uri: "/affiliates/{$id}");

        return Affiliate::from($responseData);
    }

    /**
     * Retrieves the store associated with a specific affiliate.
     *
     * Fetches the details of the LemonSqueezy store that is linked to the given affiliate ID.
     *
     * @param int $affiliateId The ID of the affiliate whose store to retrieve.
     *
     * @return Store A `Store` model instance representing the associated store.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., affiliate not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/affiliates/1/store
     */
    public function store(int $affiliateId): Store
    {
        $responseData = $this->get(uri: "/affiliates/{$affiliateId}/store");

        return Store::from($responseData);
    }

    /**
     * Retrieves the user associated with a specific affiliate.
     *
     * Fetches the details of the LemonSqueezy user account that is linked to the given affiliate ID.
     *
     * @param int $affiliateId The ID of the affiliate whose user to retrieve.
     *
     * @return User A `User` model instance representing the associated user.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., affiliate not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/affiliates/1/user
     */
    public function user(int $affiliateId): User
    {
        $responseData = $this->get(uri: "/affiliates/{$affiliateId}/user");

        return User::from($responseData);
    }
}
