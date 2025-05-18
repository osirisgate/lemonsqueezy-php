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

namespace Osirisgate\Component\Lemonsqueezy\Resource\Contract;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * ListableResourceInterface – LemonSqueezy API listable resource contract.
 *
 * Defines the contract for resources that support retrieving a list of entities
 * via the LemonSqueezy API, optionally filtered by given criteria.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api
 */
interface ListableResourceInterface
{
    /**
     * Retrieves a list of resources, optionally filtered.
     *
     * Implementations of this method should send a request to the LemonSqueezy API
     * to retrieve a collection of entities. The `$filters` parameter allows for
     * specifying criteria to narrow down the results. The return type is an array
     * of generic `Model` instances, as the specific model type will depend on
     * the resource being listed.
     *
     * @param array<string, mixed> $filters An optional associative array of filter parameters.
     * @param array<string, mixed> $options An optional associative array of options parameters.
     * Refer to the LemonSqueezy API documentation for
     * available filter options for each resource.
     * @return Model[] An array of models representing the retrieved resources.
     */
    public function all(array $filters = [], array $options = []): array;
}
