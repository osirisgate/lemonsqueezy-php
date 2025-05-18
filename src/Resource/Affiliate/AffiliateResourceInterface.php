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

use Osirisgate\Component\Lemonsqueezy\Model\Store\Store;
use Osirisgate\Component\Lemonsqueezy\Model\User\User;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;

/**
 * AffiliateResourceInterface – LemonSqueezy API affiliate resource interface.
 *
 * Defines the contract for interacting with affiliate resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources, and also
 * specifies methods for fetching related store and user information for an affiliate.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface AffiliateResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface
{
    /**
     * Retrieves the store associated with a specific affiliate.
     *
     * @param int $affiliateId The ID of the affiliate.
     * @return Store The associated store.
     */
    public function store(int $affiliateId): Store;

    /**
     * Retrieves the user associated with a specific affiliate.
     *
     * @param int $affiliateId The ID of the affiliate.
     * @return User The associated user.
     */
    public function user(int $affiliateId): User;
}
