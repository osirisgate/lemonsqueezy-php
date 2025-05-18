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

namespace Osirisgate\Component\Lemonsqueezy\Model\Subscription;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\ResumesAtTrait;

/**
 * SubscriptionPause – LemonSqueezy API subscription pause model.
 *
 * Represents the details of a subscription's pause state within the
 * LemonSqueezy API. This class encapsulates information about how the
 * subscription is paused, specifically the 'mode' of the pause (e.g.,
 * 'indefinitely' or 'until_date'), and the date when the subscription
 * is scheduled to resume, if applicable.
 *
 * It utilizes the `ResumesAtTrait` to manage the resume date attribute.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionPause
{
    use ResumesAtTrait;

    /**
     * @var string|null The mode of the subscription pause. Possible values
     * might include 'indefinitely' or 'until_date'.
     */
    private ?string $mode = null;

    /**
     * Returns the mode of the subscription pause.
     *
     * @return string|null The pause mode.
     */
    public function getMode(): ?string
    {
        return $this->mode;
    }
}
