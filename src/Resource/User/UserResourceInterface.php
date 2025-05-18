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

namespace Osirisgate\Component\Lemonsqueezy\Resource\User;

use Osirisgate\Component\Lemonsqueezy\Model\User\User;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableUniqueResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;

/**
 * UserResourceInterface – LemonSqueezy API user resource interface.
 *
 * Defines the contract for interacting with the user resource in the LemonSqueezy API.
 * It extends the interface for retrieving a unique resource, as there is typically
 * only one authenticated user context to fetch.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface UserResourceInterface extends RetrievableUniqueResourceInterface
{
}
