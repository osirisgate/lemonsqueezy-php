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

namespace Osirisgate\Component\Lemonsqueezy\Model\Checkout;

/**
 * BillingAddress – Billing address details for a checkout in the LemonSqueezy API.
 *
 * Represents the billing address information associated with a checkout,
 * currently including country and postal/ZIP code.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class BillingAddress
{
    /**
     * The billing country code (e.g., 'US', 'FR').
     */
    private ?string $country = null;

    /**
     * The billing postal or ZIP code.
     */
    private ?string $zip = null;

    /**
     * Returns the billing country code.
     *
     * @return string|null The billing country code, or null if not set.
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Returns the billing postal or ZIP code.
     *
     * @return string|null The billing postal or ZIP code, or null if not set.
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }
}
