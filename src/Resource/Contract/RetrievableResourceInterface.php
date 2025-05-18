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
 * RetrievableResourceInterface – LemonSqueezy API single resource retrieval contract.
 *
 * Defines the contract for resources that support retrieving a single entity
 * by its unique identifier via the LemonSqueezy API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api
 */
interface RetrievableResourceInterface
{
    /**
     * Retrieves a single resource by its unique identifier.
     *
     * Implementations of this method should send a request to the LemonSqueezy API
     * to retrieve the entity with the given ID. The return type is a generic
     * `Model` as the specific model type will depend on the resource being retrieved.
     *
     * @param int $id The unique identifier of the resource to retrieve.
     * @return Model A model representing the retrieved resource.
     */
    public function find(int $id): Model;
}
