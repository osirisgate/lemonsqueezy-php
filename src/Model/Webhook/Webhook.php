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

namespace Osirisgate\Component\Lemonsqueezy\Model\Webhook;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * Webhook – Represents a webhook resource from Lemon Squeezy.
 *
 * This class encapsulates the webhook model, providing access to its attributes.
 * A webhook in Lemon Squeezy allows you to receive real-time notifications
 * about events that occur in your account, such as new orders, subscription
 * updates, and more. This model acts as a container for the `WebhookAttributes`
 * object, which holds the specific details and configuration of a webhook.
 *
 * By using this model, developers can interact with webhook data in a structured
 * and type-safe manner, allowing them to retrieve and manage information about
 * their webhook endpoints and settings.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/webhooks/the-webhook-object
 * Refer to the LemonSqueezy API documentation for comprehensive details
 * about the webhook object and its associated attributes.
 */
final class Webhook extends Model
{
    /**
     * @var WebhookAttributes The attributes of this webhook.
     */
    private WebhookAttributes $attributes;

    /**
     * Returns the attributes of this webhook.
     *
     * This method provides access to the `WebhookAttributes` object, which
     * contains all the specific details and properties of this webhook
     * as retrieved from the LemonSqueezy API.
     *
     * @return WebhookAttributes The attributes of the webhook.
     */
    public function attributes(): WebhookAttributes
    {
        return $this->attributes;
    }
}
