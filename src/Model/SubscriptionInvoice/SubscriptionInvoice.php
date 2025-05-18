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

namespace Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * SubscriptionInvoice – LemonSqueezy API subscription invoice model.
 *
 * Represents an invoice generated for a subscription within the LemonSqueezy API.
 * This model acts as a container for the detailed information about a subscription
 * invoice, which is accessible through the `SubscriptionInvoiceAttributes` object.
 * These attributes include details such as the associated subscription and order,
 * billing amounts, payment status, dates, and links to download the invoice.
 *
 * By using this class, developers can interact with subscription invoice data in
 * a structured and type-safe manner, facilitating the retrieval and management
 * of invoice information related to subscriptions from the LemonSqueezy API.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/subscription-invoices/the-subscription-invoice-object
 * Refer to the LemonSqueezy API documentation for comprehensive details
 * about the subscription invoice object and its associated attributes.
 */
final class SubscriptionInvoice extends Model
{
    /**
     * @var SubscriptionInvoiceAttributes The attributes of this subscription invoice.
     */
    private SubscriptionInvoiceAttributes $attributes;

    /**
     * Returns the attributes of this subscription invoice.
     *
     * This method provides access to the `SubscriptionInvoiceAttributes` object,
     * which contains all the specific details and properties of this subscription
     * invoice as retrieved from the LemonSqueezy API.
     *
     * @return SubscriptionInvoiceAttributes The attributes of the subscription invoice.
     */
    public function attributes(): SubscriptionInvoiceAttributes
    {
        return $this->attributes;
    }
}
