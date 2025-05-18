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

namespace Osirisgate\Component\Lemonsqueezy;

use Osirisgate\Component\Lemonsqueezy\Resource\Affiliate\AffiliateResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Affiliate\AffiliateResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Checkout\CheckoutResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Checkout\CheckoutResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Customer\CustomerResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Customer\CustomerResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Discount\DiscountResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Discount\DiscountResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\DiscountRedemption\DiscountRedemptionResource;
use Osirisgate\Component\Lemonsqueezy\Resource\DiscountRedemption\DiscountRedemptionResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\File\FileResource;
use Osirisgate\Component\Lemonsqueezy\Resource\File\FileResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseApi\LicenseApiResource;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseApi\LicenseApiResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseKey\LicenseKeyResource;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseKey\LicenseKeyResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseKeyInstance\LicenseKeyInstanceResource;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseKeyInstance\LicenseKeyInstanceResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Order\OrderItem\OrderItemResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Order\OrderItem\OrderItemResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Order\OrderResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Order\OrderResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Price\PriceResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Price\PriceResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Product\ProductResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Product\ProductResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Store\StoreResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Store\StoreResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Subscription\SubscriptionItem\SubscriptionItemResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Subscription\SubscriptionItem\SubscriptionItemResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Subscription\SubscriptionResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Subscription\SubscriptionResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\SubscriptionInvoice\SubscriptionInvoiceResource;
use Osirisgate\Component\Lemonsqueezy\Resource\SubscriptionInvoice\SubscriptionInvoiceResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\UsageRecord\UsageRecordResource;
use Osirisgate\Component\Lemonsqueezy\Resource\UsageRecord\UsageRecordResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\User\UserResource;
use Osirisgate\Component\Lemonsqueezy\Resource\User\UserResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Variant\VariantResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Variant\VariantResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Webhook\WebhookResource;
use Osirisgate\Component\Lemonsqueezy\Resource\Webhook\WebhookResourceInterface;

/**
 * LemonSqueezy API client by Osirisgate.
 *
 * Final implementation of the LemonsqueezyClientInterface.
 * Provides a concrete client to interact with LemonSqueezy API resources
 * using a central API key. Lazily instantiates each resource when called.
 *
 * @author      Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url        https://docs.lemonsqueezy.com/api
 */
final readonly class LemonsqueezyClient implements LemonsqueezyClientInterface
{
    private function __construct(
        private string $apiKey
    ) {
    }

    /**
     * Initializes a new instance of the LemonSqueezyClient with the provided API key.
     *
     * @param string $apiKey The LemonSqueezy API key.
     */
    public static function init(string $apiKey): self
    {
        return new self($apiKey);
    }

    /**
     * Returns the API key used by this client.
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Provides access to the User API resource.
     */
    public function users(): UserResourceInterface
    {
        return UserResource::init($this);
    }

    /**
     * Provides access to the Store API resource.
     */
    public function stores(): StoreResourceInterface
    {
        return StoreResource::init($this);
    }

    /**
     * Provides access to the Customer API resource.
     */
    public function customers(): CustomerResourceInterface
    {
        return CustomerResource::init($this);
    }

    /**
     * Provides access to the Product API resource.
     */
    public function products(): ProductResourceInterface
    {
        return ProductResource::init($this);
    }

    /**
     * Provides access to the Variant API resource.
     */
    public function variants(): VariantResourceInterface
    {
        return VariantResource::init($this);
    }

    /**
     * Provides access to the Price API resource.
     */
    public function prices(): PriceResourceInterface
    {
        return PriceResource::init($this);
    }

    /**
     * Provides access to the File API resource.
     */
    public function files(): FileResourceInterface
    {
        return FileResource::init($this);
    }

    /**
     * Provides access to the Order API resource.
     */
    public function orders(): OrderResourceInterface
    {
        return OrderResource::init($this);
    }

    /**
     * Provides access to the Order Item API resource.
     */
    public function orderItems(): OrderItemResourceInterface
    {
        return OrderItemResource::init($this);
    }

    /**
     * Provides access to the Subscription API resource.
     */
    public function subscriptions(): SubscriptionResourceInterface
    {
        return SubscriptionResource::init($this);
    }

    /**
     * Provides access to the Subscription Invoice API resource.
     */
    public function subscriptionInvoices(): SubscriptionInvoiceResourceInterface
    {
        return SubscriptionInvoiceResource::init($this);
    }

    /**
     * Provides access to the Subscription Item API resource.
     */
    public function subscriptionItems(): SubscriptionItemResourceInterface
    {
        return SubscriptionItemResource::init($this);
    }

    /**
     * Provides access to the Usage Record API resource.
     */
    public function usageRecords(): UsageRecordResourceInterface
    {
        return UsageRecordResource::init($this);
    }

    /**
     * Provides access to the Discount API resource.
     */
    public function discounts(): DiscountResourceInterface
    {
        return DiscountResource::init($this);
    }

    /**
     * Provides access to the Discount Redemption API resource.
     */
    public function discountRedemptions(): DiscountRedemptionResourceInterface
    {
        return DiscountRedemptionResource::init($this);
    }

    /**
     * Provides access to the License Key API resource.
     */
    public function licenseKeys(): LicenseKeyResourceInterface
    {
        return LicenseKeyResource::init($this);
    }

    /**
     * Provides access to the License Key Instance API resource.
     */
    public function licenseKeyInstances(): LicenseKeyInstanceResourceInterface
    {
        return LicenseKeyInstanceResource::init($this);
    }

    /**
     * Provides access to the Checkout API resource.
     */
    public function checkouts(): CheckoutResourceInterface
    {
        return CheckoutResource::init($this);
    }

    /**
     * Provides access to the Webhook API resource.
     */
    public function webhooks(): WebhookResourceInterface
    {
        return WebhookResource::init($this);
    }

    /**
     * Provides access to the LicenseApi API resource.
     */
    public function licenseApi(): LicenseApiResourceInterface
    {
        return LicenseApiResource::init($this);
    }

    /**
     * Provides access to the Affiliate API resource.
     */
    public function affiliates(): AffiliateResourceInterface
    {
        return AffiliateResource::init($this);
    }
}
