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

namespace Osirisgate\Component\Lemonsqueezy\Model\Store;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Store – LemonSqueezy API store model.
 *
 * Represents a store entity within the LemonSqueezy API.
 * In LemonSqueezy, a store is the central unit that contains all the
 * products, orders, subscriptions, and other related data. Each store
 * operates as a separate billing entity.
 *
 * This class acts as a model to hold the attributes of a store, which
 * are encapsulated within the `StoreAttributes` object. It provides a
 * structured way to access store information retrieved from the API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/stores/the-store-object
 * Refer to the LemonSqueezy API documentation for detailed information
 * about the store object and its associated attributes.
 */
final class Store extends Model
{
    /**
     * @var StoreAttributes The attributes of this store.
     */
    private StoreAttributes $attributes;

    /**
     * Returns the attributes of this store.
     *
     * This method provides access to the `StoreAttributes` object, which
     * contains all the specific details and properties of this store
     * as retrieved from the LemonSqueezy API.
     *
     * @return StoreAttributes The attributes of the store.
     */
    public function attributes(): StoreAttributes
    {
        return $this->attributes;
    }
}
