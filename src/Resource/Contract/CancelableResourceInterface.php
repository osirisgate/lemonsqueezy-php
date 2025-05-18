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
 * CancelableResourceInterface – LemonSqueezy API cancelable resource contract.
 *
 * Defines the contract for resources that support canceling an entity by its ID.
 * Resources implementing this interface provide a method to cancel entities like
 * subscriptions, orders, or other cancelable LemonSqueezy objects via the API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api
 */
interface CancelableResourceInterface
{
    /**
     * Cancels a specific resource by its ID.
     *
     * Implementations of this method should send a request to the LemonSqueezy API
     * to cancel the resource identified by the given ID. The return type is a
     * generic `Model` as the specific response structure may vary depending on
     * the resource being canceled.
     *
     * @param int $id The unique identifier of the resource to cancel.
     * @return Model A model representing the result of the cancellation operation.
     */
    public function cancel(int $id): Model;
}
