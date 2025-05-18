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
 * RetrievableUniqueResourceInterface – LemonSqueezy API unique resource retrieval contract.
 *
 * Defines the contract for resources that support retrieving a single unique entity
 * without requiring an identifier, typically for "current" or "self" resources.
 *
 * For example, retrieving the current authenticated user or the store details
 * associated with the API key. Implementations of this interface will fetch
 * a single resource based on the context of the API key or session.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api
 */
interface RetrievableUniqueResourceInterface
{
    /**
     * Retrieves a single, unique resource.
     *
     * Implementations of this method should send a request to the LemonSqueezy API
     * to retrieve a single entity that is unique to the current context (e.g.,
     * the authenticated user). No specific identifier is required. The return
     * type is a generic `Model` as the specific model type will depend on the
     * resource being retrieved.
     *
     * @return Model A model representing the retrieved unique resource.
     */
    public function find(): Model;
}
