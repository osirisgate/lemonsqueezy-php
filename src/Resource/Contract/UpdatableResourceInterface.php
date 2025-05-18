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
 * UpdatableResourceInterface – LemonSqueezy API resource update contract.
 *
 * Defines the contract for resources that support updating an existing entity
 * by providing the new data as an associative array.
 *
 * Implementing classes should handle partial or full updates according to the API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api
 */
interface UpdatableResourceInterface
{
    /**
     * Updates an existing resource with the provided data.
     *
     * Implementations of this method should send a request to the LemonSqueezy API
     * to update the resource. The `$data` parameter is an associative array
     * containing the fields to be updated and their new values. The return type
     * is a generic `Model` as the specific response structure will depend on the
     * type of resource being updated.
     *
     * @param array<string, mixed> $data An associative array containing the data to update.
     * @return Model A model representing the updated resource.
     */
    public function update(array $data): Model;
}
