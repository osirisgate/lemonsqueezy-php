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

namespace Osirisgate\Component\Lemonsqueezy\Model\Affiliate;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * AffiliateAttributes – LemonSqueezy API affiliate attributes value object.
 *
 * Encapsulates the detailed attributes of an affiliate entity as
 * provided by the LemonSqueezy API.
 *
 * Includes store and user identification, user contact info,
 * affiliate status, associated products, notes, and earnings information.
 *
 * Uses traits for createdAt and updatedAt timestamps.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class AffiliateAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /**
     * The ID of the store associated with the affiliate.
     */
    private ?int $storeId = null;

    /**
     * The ID of the user who is the affiliate.
     */
    private ?int $userId = null;

    /**
     * The name of the affiliate user.
     */
    private ?string $userName = null;

    /**
     * The email address of the affiliate user.
     */
    private ?string $userEmail = null;

    /**
     * The custom domain used for the affiliate's share links.
     */
    private ?string $shareDomain = null;

    /**
     * The current status of the affiliate (e.g., 'active', 'pending', 'rejected').
     */
    private ?string $status = null;

    /**
     * An array of product IDs associated with the affiliate.
     */
    private ?array $products = null;

    /**
     * Any notes provided during the affiliate application process.
     */
    private ?string $applicationNote = null;

    /**
     * The total earnings of the affiliate in cents (or the smallest currency unit).
     */
    private ?int $totalEarnings = null;

    /**
     * The unpaid earnings of the affiliate in cents (or the smallest currency unit).
     */
    private ?int $unpaidEarnings = null;

    /**
     * Returns the store ID associated with the affiliate.
     *
     * @return int|null The store ID, or null if not set.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the user ID of the affiliate.
     *
     * @return int|null The user ID, or null if not set.
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * Returns the name of the affiliate user.
     *
     * @return string|null The user name, or null if not set.
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * Returns the email address of the affiliate user.
     *
     * @return string|null The user email, or null if not set.
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    /**
     * Returns the custom share domain of the affiliate.
     *
     * @return string|null The share domain, or null if not set.
     */
    public function getShareDomain(): ?string
    {
        return $this->shareDomain;
    }

    /**
     * Returns the current status of the affiliate.
     *
     * @return string|null The status, or null if not set.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns the array of product IDs associated with the affiliate.
     *
     * @return array|null The product IDs, or null if not set.
     */
    public function getProducts(): ?array
    {
        return $this->products;
    }

    /**
     * Returns the application note provided by the affiliate.
     *
     * @return string|null The application note, or null if not set.
     */
    public function getApplicationNote(): ?string
    {
        return $this->applicationNote;
    }

    /**
     * Returns the total earnings of the affiliate.
     *
     * @return int|null The total earnings in cents, or null if not set.
     */
    public function getTotalEarnings(): ?int
    {
        return $this->totalEarnings;
    }

    /**
     * Returns the unpaid earnings of the affiliate.
     *
     * @return int|null The unpaid earnings in cents, or null if not set.
     */
    public function getUnpaidEarnings(): ?int
    {
        return $this->unpaidEarnings;
    }
}
