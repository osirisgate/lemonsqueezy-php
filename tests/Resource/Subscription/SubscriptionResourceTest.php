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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Subscription;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionResourceTest extends BaseResource
{
    /**
     * Tests that the subscriptions resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetSubscriptionsResource(): void
    {
        $subscriptions = $this->lemonsqueezyClient->subscriptions()->all();

        if (count($subscriptions) > 0) {
            foreach ($subscriptions as $subscription) {
                self::assertEquals('subscriptions', $subscription->getType());
                self::assertNotNull($subscription->getSelfLink()->getValue());
                self::assertNotNull($subscription->attributes());
                self::assertNotNull($subscription->getId());
            }
        } else {
            self::assertCount(0, $subscriptions);
        }
    }

    /**
     * Tests that a specific subscription resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws ExceptionInterface
     */
    public function testCanGetSubscriptionResource(): void
    {
        $subscriptionId = 1208802;

        try {
            $subscription = $this->lemonsqueezyClient->subscriptions()->find($subscriptionId);
            self::assertEquals('subscriptions', $subscription->getType());
            self::assertEquals((string)$subscriptionId, $subscription->getId());
            self::assertNotEmpty($subscription->getSelfLink());
            self::assertNotEmpty($subscription->attributes());
            self::assertNotEmpty($subscription->getId());
        } catch (ExceptionInterface $exception) {
            self::fail('Failed to retrieve subscription: ' . $exception->getMessage());
        }
    }
}
