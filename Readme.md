# 🌐 Osirisgate LemonSqueezy PHP SDK

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-%3E=8.2-8892BF.svg)](https://www.php.net/releases/8.2/)

> Lightweight, developer-first SDK to interact with the LemonSqueezy API.
Built with modern PHP and clean architecture principles. Focused on simplicity,
readability and full control.

---

## 📦 Installation

```bash
composer require osirisgate/lemonsqueezy
```

## ✅ Requirements

* PHP 8.2 or higher

## 🚀 Getting Started

```php
use Osirisgate\Component\Lemonsqueezy\LemonsqueezyClient;

$client = LemonsqueezyClient::init('your-api-key');
```

You can now access all LemonSqueezy resources:

For each resource, some methods are available. You can see the full list of methods in the respective resource class.

You can see in `Resources/` directory the list of all available resources and methods for each resource.

```php

# User Resource: Manage the authenticated user.
$usersResource = $client->users();
// Example: $user = $usersResource->find();

# Store Resource: Manage your LemonSqueezy stores.
$storesResource = $client->stores();
// Example: $stores = $storesResource->all();

# Customer Resource: Manage your customers.
$customersResource = $client->customers();
// Example: $customer = $customersResource->find(123);

# Product Resource: Manage your products.
$productsResource = $client->products();
// Example: $products = $productsResource->all();

# Variant Resource: Manage product variants.
$variantsResource = $client->variants();
// Example: $variant = $variantsResource->find(456);

# Price Resource: Manage pricing options.
$pricesResource = $client->prices();
// Example: $prices = $pricesResource->all();

# File Resource: Manage digital files associated with products.
$filesResource = $client->files();
// Example: $files = $filesResource->all();

# Order Resource: Manage customer orders.
$ordersResource = $client->orders();
// Example: $order = $ordersResource->find(789);

# Order Item Resource: Access individual items within an order.
$orderItemsResource = $client->orderItems();
// Example: $orderItems = $orderItemsResource->all();

# Subscription Resource: Manage recurring subscriptions.
$subscriptionsResource = $client->subscriptions();
// Example: $subscription = $subscriptionsResource->find(101);

# Subscription Invoice Resource: Access invoices for subscriptions.
$subscriptionInvoicesResource = $client->subscriptionInvoices();
// Example: $invoices = $subscriptionInvoicesResource->all();

# Subscription Item Resource: Access individual items within a subscription.
$subscriptionItemsResource = $client->subscriptionItems();
// Example: $subscriptionItems = $subscriptionItemsResource->all();

# Usage Record Resource: Report usage for metered billing.
$usageRecordsResource = $client->usageRecords();
// Example: $usageRecord = $usageRecordsResource->create(...);

# Discount Resource: Manage discount codes.
$discountsResource = $client->discounts();
// Example: $discounts = $discountsResource->all();

# Discount Redemption Resource: Track how discounts are used.
$discountRedemptionsResource = $client->discountRedemptions();
// Example: $redemptions = $discountRedemptionsResource->all();

# License Key Resource: Manage license keys for software.
$licenseKeysResource = $client->licenseKeys();
// Example: $licenseKey = $licenseKeysResource->find('...');

# License Key Instance Resource: Manage specific instances of license keys.
$licenseKeyInstancesResource = $client->licenseKeyInstances();
// Example: $instances = $licenseKeyInstancesResource->all();

# Checkout Resource: Generate checkout URLs.
$checkoutsResource = $client->checkouts();
// Example: $checkoutUrl = $checkoutsResource->create(...);

# Webhook Resource: Manage webhook configurations.
$webhooksResource = $client->webhooks();
// Example: $webhooks = $webhooksResource->all();

# License API Resource: Verify and manage licenses via the API.
$licenseApiResource = $client->licenseApi();
// Example: $license = $licenseApiResource->verify('...');

# Affiliate Resource: Manage affiliate programs.
$affiliatesResource = $client->affiliates();
// Example: $affiliates = $affiliatesResource->all();

```

## 🧪 Run Tests

```bash
vendor/bin/phpunit tests
```

## 🧰 Developer Tools

### ✅ Code style

```bash
composer run phpcs-fix
```

### 🧠 Static analysis

```bash
composer run phpstan
```

Or run both checks at once:

```bash
make check-code-quality
```

## 📜 License

This package is licensed under the [MIT License](LICENSE).

## 👤 Author

**Ulrich Geraud AHOGLA** Software Engineer — Osirisgate

If you have any questions or suggestions, please contact me via [developer@osirisgate.com](mailto:developer@osirisgate.com)
