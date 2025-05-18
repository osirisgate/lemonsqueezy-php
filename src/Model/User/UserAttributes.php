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

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * UserAttributes – Attributes of a User account.
 *
 * Contains detailed information about a user, such as their full name, email
 * address, a color associated with their account (potentially for UI purposes),
 * the URL of their avatar image, and a boolean indicating whether they have
 * uploaded a custom avatar. It also includes timestamps for when the user
 * account was created and last updated, managed by the `CreatedAtTrait` and
 * `UpdatedAtTrait`.
 *
 * This class encapsulates the specific properties of a LemonSqueezy user
 * account as returned by the API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class UserAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * @var string|null The full name of the user.
     */
    private ?string $name = null;

    /**
     * @var string|null The email address of the user.
     */
    private ?string $email = null;

    /**
     * @var string|null A color associated with the user's account.
     */
    private ?string $color = null;

    /**
     * @var string|null The URL of the user's avatar image.
     */
    private ?string $avatarUrl = null;

    /**
     * @var bool|null Indicates whether the user has uploaded a custom avatar.
     */
    private ?bool $hasCustomAvatar = null;

    /**
     * Returns the full name of the user.
     *
     * @return string|null The user's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Returns the email address of the user.
     *
     * @return string|null The user's email.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Returns the color associated with the user's account.
     *
     * @return string|null The user's color.
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Returns the URL of the user's avatar image.
     *
     * @return string|null The avatar URL.
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    /**
     * Indicates whether the user has uploaded a custom avatar.
     *
     * @return bool|null True if the user has a custom avatar, false otherwise.
     */
    public function hasCustomAvatar(): ?bool
    {
        return $this->hasCustomAvatar;
    }
}
