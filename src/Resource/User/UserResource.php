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

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\User\User;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * UserResource – Handles the LemonSqueezy user resource.
 *
 * Provides a method to retrieve the currently authenticated user's details.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class UserResource extends Resource implements UserResourceInterface
{
    /**
     * Retrieves the currently authenticated user's details.
     *
     * Sends a request to the LemonSqueezy API to fetch information about the
     * user associated with the API key used for authentication.
     *
     * @return User A `User` model instance representing the authenticated user.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., authentication failure).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://docs.lemonsqueezy.com/api/users/retrieve-user
     */
    public function find(): User
    {
        $responseData = $this->get('/users/me');

        return User::from($responseData);
    }
}
