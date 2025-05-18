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

namespace Osirisgate\Component\Lemonsqueezy\Model\User;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * User – Represents a personal user account.
 *
 * A user represents your personal user account that you use to log into Lemon Squeezy.
 * This model acts as a container for the `UserAttributes` object, which holds
 * the specific details and properties of your user account as retrieved from
 * the LemonSqueezy API. These attributes typically include information such
 * as your name, email address, and timestamps related to your account.
 *
 * By using this model, developers can access and interact with their user
 * account information in a structured and type-safe manner.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/users/the-user-object
 * Refer to the LemonSqueezy API documentation for comprehensive details
 * about the user object and its associated attributes.
 */
final class User extends Model
{
    /**
     * @var UserAttributes The attributes of this user.
     */
    private UserAttributes $attributes;

    /**
     * Returns the attributes of this user.
     *
     * This method provides access to the `UserAttributes` object, which
     * contains all the specific details and properties of this user
     * account as retrieved from the LemonSqueezy API.
     *
     * @return UserAttributes The attributes of the user.
     */
    public function attributes(): UserAttributes
    {
        return $this->attributes;
    }
}
