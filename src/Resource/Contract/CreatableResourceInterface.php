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
 * CreatableResourceInterface – LemonSqueezy API creatable resource contract.
 *
 * Defines the contract for resources that support creating new entities via the LemonSqueezy API.
 * Resources implementing this interface provide a method to create an entity with given data.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api
 */
interface CreatableResourceInterface
{
    /**
     * Creates a new resource with the given data.
     *
     * Implementations of this method should send a request to the LemonSqueezy API
     * to create a new entity based on the provided associative array of data.
     * The return type is a generic `Model` as the specific response structure
     * will depend on the type of resource being created.
     *
     * @param array<string, mixed> $data An associative array containing the data for the new resource.
     * @return Model A model representing the newly created resource.
     */
    public function create(array $data): Model;
}
