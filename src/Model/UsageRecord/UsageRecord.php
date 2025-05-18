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

namespace Osirisgate\Component\Lemonsqueezy\Model\UsageRecord;

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * UsageRecord – Represents a usage record in LemonSqueezy.
 *
 * This model encapsulates the specific attributes of a UsageRecord, which
 * tracks the consumption of usage-based billing features by a subscription
 * item in the LemonSqueezy API. It serves as a container for the
 * `UsageRecordAttributes` object, providing structured access to the details
 * of a single usage event.
 *
 * By using this model, developers can work with usage record data in an
 * object-oriented manner, making it easier to retrieve and manage information
 * about how customers are utilizing metered billing features.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/usage-records/the-usage-record-object
 * Refer to the LemonSqueezy API documentation for comprehensive details
 * about the usage record object and its associated attributes.
 */
final class UsageRecord extends Model
{
    /**
     * @var UsageRecordAttributes The attributes of this usage record.
     */
    private UsageRecordAttributes $attributes;

    /**
     * Returns the attributes of this usage record.
     *
     * This method provides access to the `UsageRecordAttributes` object, which
     * contains all the specific details and properties of this usage record
     * as retrieved from the LemonSqueezy API.
     *
     * @return UsageRecordAttributes The attributes of the usage record.
     */
    public function attributes(): UsageRecordAttributes
    {
        return $this->attributes;
    }
}
