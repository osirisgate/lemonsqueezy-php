<?php

/**
 * LicenseKeyAttributes – LemonSqueezy API License Key Attributes.
 *
 * Contains the detailed attributes of a license key object returned by the LemonSqueezy API.
 * This includes key identification, associated user and product data, activation limits,
 * usage status, and timestamps for creation, update, and expiration.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/license-keys/the-license-key-object
 */

declare(strict_types=1);

namespace Osirisgate\Component\Lemonsqueezy\Model\LicenseKey;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\ExpiresAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

final class LicenseKeyAttributes
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use ExpiresAtTrait;

    /**
     * The ID of the store this license key belongs to.
     */
    private ?int $storeId = null;

    /**
     * The ID of the customer who owns this license key.
     */
    private ?int $customerId = null;

    /**
     * The ID of the order that generated this license key.
     */
    private ?int $orderId = null;

    /**
     * The ID of the specific order item that includes the licensed product.
     */
    private ?int $orderItemId = null;

    /**
     * The ID of the product this license key is for.
     */
    private ?int $productId = null;

    /**
     * The name of the user associated with this license key (if provided during purchase or activation).
     */
    private ?string $userName = null;

    /**
     * The email address of the user associated with this license key (if provided during purchase or activation).
     */
    private ?string $userEmail = null;

    /**
     * The full license key string.
     */
    private ?string $key = null;

    /**
     * A shortened version of the license key for display purposes.
     */
    private ?string $keyShort = null;

    /**
     * The maximum number of times this license key can be activated.
     */
    private ?int $activationLimit = null;

    /**
     * The current number of active instances using this license key.
     */
    private ?int $instancesCount = null;

    /**
     * Indicates whether this license key has been disabled.
     */
    private ?bool $disabled = null;

    /**
     * The current status of the license key (e.g., 'active', 'inactive').
     */
    private ?string $status = null;

    /**
     * The formatted status of the license key for display (e.g., 'Active', 'Inactive').
     */
    private ?string $statusFormatted = null;

    /**
     * Returns the ID of the store.
     *
     * @return int|null The store ID, or null if not set.
     */
    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    /**
     * Returns the ID of the customer.
     *
     * @return int|null The customer ID, or null if not set.
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * Returns the ID of the order.
     *
     * @return int|null The order ID, or null if not set.
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * Returns the ID of the order item.
     *
     * @return int|null The order item ID, or null if not set.
     */
    public function getOrderItemId(): ?int
    {
        return $this->orderItemId;
    }

    /**
     * Returns the ID of the product.
     *
     * @return int|null The product ID, or null if not set.
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * Returns the name of the user associated with the license key.
     *
     * @return string|null The user name, or null if not set.
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * Returns the email address of the user associated with the license key.
     *
     * @return string|null The user email, or null if not set.
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    /**
     * Returns the full license key string.
     *
     * @return string|null The license key, or null if not set.
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Returns the shortened license key string.
     *
     * @return string|null The short license key, or null if not set.
     */
    public function getKeyShort(): ?string
    {
        return $this->keyShort;
    }

    /**
     * Returns the activation limit for the license key.
     *
     * @return int|null The activation limit, or null if not set.
     */
    public function getActivationLimit(): ?int
    {
        return $this->activationLimit;
    }

    /**
     * Returns the current number of active instances.
     *
     * @return int|null The instances count, or null if not set.
     */
    public function getInstancesCount(): ?int
    {
        return $this->instancesCount;
    }

    /**
     * Returns whether the license key is disabled.
     *
     * @return bool|null True if disabled, false otherwise, or null if not set.
     */
    public function getDisabled(): ?bool
    {
        return $this->disabled;
    }

    /**
     * Returns the status of the license key.
     *
     * @return string|null The status (e.g., 'active'), or null if not set.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns the formatted status of the license key.
     *
     * @return string|null The formatted status (e.g., 'Active'), or null if not set.
     */
    public function getStatusFormatted(): ?string
    {
        return $this->statusFormatted;
    }
}
