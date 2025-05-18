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

use Osirisgate\Component\Lemonsqueezy\Resource\Affiliate\AffiliateResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Checkout\CheckoutResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Customer\CustomerResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Discount\DiscountResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\DiscountRedemption\DiscountRedemptionResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\File\FileResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseApi\LicenseApiResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseKey\LicenseKeyResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\LicenseKeyInstance\LicenseKeyInstanceResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Order\OrderItem\OrderItemResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Order\OrderResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Price\PriceResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Product\ProductResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Store\StoreResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Subscription\SubscriptionItem\SubscriptionItemResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Subscription\SubscriptionResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\SubscriptionInvoice\SubscriptionInvoiceResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\UsageRecord\UsageRecordResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\User\UserResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Variant\VariantResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Webhook\WebhookResourceInterface;

/**
 * LemonSqueezy API client interface by Osirisgate.
 *
 * Provides a consistent contract for interacting with all LemonSqueezy API resources.
 * This interface defines the methods that a concrete LemonSqueezy API client must
 * implement, acting as a service gateway to access endpoints for various resources
 * such as products, customers, orders, licenses, webhooks, subscriptions, and more.
 * It ensures that all client implementations offer a standardized way to interact
 * with the different parts of the LemonSqueezy API.
 *
 * @author      Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url         https://docs.lemonsqueezy.com/api
 *
 * Example usage:
 * ```php
 * $client = LemonsqueezyClient::init('your-api-key');
 * $products = $client->products()->all();
 * ```
 */
interface LemonsqueezyClientInterface
{
    /**
     * Initializes a new instance of the LemonSqueezyClient with the provided API key.
     *
     * @param string $apiKey Your LemonSqueezy API key.
     *
     * @return self A new instance of the LemonSqueezyClient.
     */
    public static function init(string $apiKey): self;

    /**
     * Returns the API key used by this client.
     *
     * @return string The LemonSqueezy API key.
     */
    public function getApiKey(): string;

    /**
     * Provides access to the User API resource.
     *
     * @return UserResourceInterface The User API resource interface.
     */
    public function users(): UserResourceInterface;

    /**
     * Provides access to the Store API resource.
     *
     * @return StoreResourceInterface The Store API resource interface.
     */
    public function stores(): StoreResourceInterface;

    /**
     * Provides access to the Customer API resource.
     *
     * @return CustomerResourceInterface The Customer API resource interface.
     */
    public function customers(): CustomerResourceInterface;

    /**
     * Provides access to the Product API resource.
     *
     * @return ProductResourceInterface The Product API resource interface.
     */
    public function products(): ProductResourceInterface;

    /**
     * Provides access to the Variant API resource.
     *
     * @return VariantResourceInterface The Variant API resource interface.
     */
    public function variants(): VariantResourceInterface;

    /**
     * Provides access to the Price API resource.
     *
     * @return PriceResourceInterface The Price API resource interface.
     */
    public function prices(): PriceResourceInterface;

    /**
     * Provides access to the File API resource.
     *
     * @return FileResourceInterface The File API resource interface.
     */
    public function files(): FileResourceInterface;

    /**
     * Provides access to the Order API resource.
     *
     * @return OrderResourceInterface The Order API resource interface.
     */
    public function orders(): OrderResourceInterface;

    /**
     * Provides access to the Order Item API resource.
     *
     * @return OrderItemResourceInterface The Order Item API resource interface.
     */
    public function orderItems(): OrderItemResourceInterface;

    /**
     * Provides access to the Subscription API resource.
     *
     * @return SubscriptionResourceInterface The Subscription API resource interface.
     */
    public function subscriptions(): SubscriptionResourceInterface;

    /**
     * Provides access to the Subscription Invoice API resource.
     *
     * @return SubscriptionInvoiceResourceInterface The Subscription Invoice API resource interface.
     */
    public function subscriptionInvoices(): SubscriptionInvoiceResourceInterface;

    /**
     * Provides access to the Subscription Item API resource.
     *
     * @return SubscriptionItemResourceInterface The Subscription Item API resource interface.
     */
    public function subscriptionItems(): SubscriptionItemResourceInterface;

    /**
     * Provides access to the Usage Record API resource.
     *
     * @return UsageRecordResourceInterface The Usage Record API resource interface.
     */
    public function usageRecords(): UsageRecordResourceInterface;

    /**
     * Provides access to the Discount API resource.
     *
     * @return DiscountResourceInterface The Discount API resource interface.
     */
    public function discounts(): DiscountResourceInterface;

    /**
     * Provides access to the Discount Redemption API resource.
     *
     * @return DiscountRedemptionResourceInterface The Discount Redemption API resource interface.
     */
    public function discountRedemptions(): DiscountRedemptionResourceInterface;

    /**
     * Provides access to the License Key API resource.
     *
     * @return LicenseKeyResourceInterface The License Key API resource interface.
     */
    public function licenseKeys(): LicenseKeyResourceInterface;

    /**
     * Provides access to the License Key Instance API resource.
     *
     * @return LicenseKeyInstanceResourceInterface The License Key Instance API resource interface.
     */
    public function licenseKeyInstances(): LicenseKeyInstanceResourceInterface;

    /**
     * Provides access to the Checkout API resource.
     *
     * @return CheckoutResourceInterface The Checkout API resource interface.
     */
    public function checkouts(): CheckoutResourceInterface;

    /**
     * Provides access to the Webhook API resource.
     *
     * @return WebhookResourceInterface The Webhook API resource interface.
     */
    public function webhooks(): WebhookResourceInterface;

    /**
     * Provides access to the License API resource.
     *
     * @return LicenseApiResourceInterface The License API resource interface.
     */
    public function licenseApi(): LicenseApiResourceInterface;

    /**
     * Provides access to the Affiliate API resource.
     *
     * @return AffiliateResourceInterface The Affiliate API resource interface.
     */
    public function affiliates(): AffiliateResourceInterface;
}
