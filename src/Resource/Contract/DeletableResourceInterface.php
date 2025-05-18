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
 * DeletableResourceInterface – LemonSqueezy API deletable resource contract.
 *
 * Defines the contract for resources that support deletion of entities via the LemonSqueezy API.
 * Resources implementing this interface provide a method to delete an entity by its identifier.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api
 */
interface DeletableResourceInterface
{
    /**
     * Deletes a specific resource by its ID.
     *
     * Implementations of this method should send a request to the LemonSqueezy API
     * to delete the resource identified by the given ID. The return type is a
     * generic `Model` as the specific response structure may vary depending on
     * the resource being deleted.
     *
     * @param int $id The unique identifier of the resource to delete.
     * @return Model A model representing the result of the deletion operation.
     */
    public function delete(int $id): Model;
}
