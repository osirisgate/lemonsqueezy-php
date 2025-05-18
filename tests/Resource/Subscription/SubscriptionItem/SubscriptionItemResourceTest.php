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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Subscription\SubscriptionItem;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionItemResourceTest extends BaseResource
{
    /**
     * Tests that the subscription items resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetSubscriptionItemsResource(): void
    {
        $subscriptionItems = $this->lemonsqueezyClient->subscriptionItems()->all();

        if (count($subscriptionItems) > 0) {
            foreach ($subscriptionItems as $subscriptionItem) {
                self::assertEquals('subscription-items', $subscriptionItem->getType());
                self::assertNotNull($subscriptionItem->getSelfLink()->getValue());
                self::assertNotNull($subscriptionItem->attributes());
                self::assertNotNull($subscriptionItem->getId());
            }
        } else {
            self::assertCount(0, $subscriptionItems);
        }
    }

    /**
     * Tests that a specific subscription item resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws ExceptionInterface
     */
    public function testCanGetSubscriptionItemResource(): void
    {
        $subscriptionItemId = 2148534;

        try {
            $subscriptionItem = $this->lemonsqueezyClient->subscriptionItems()->find($subscriptionItemId);
            self::assertEquals('subscription-items', $subscriptionItem->getType());
            self::assertEquals((string)$subscriptionItemId, $subscriptionItem->getId());
            self::assertNotEmpty($subscriptionItem->getSelfLink());
            self::assertNotEmpty($subscriptionItem->attributes());
            self::assertNotEmpty($subscriptionItem->getId());
        } catch (ExceptionInterface $exception) {
            self::fail('Failed to retrieve subscription item: ' . $exception->getMessage());
        }
    }
}
