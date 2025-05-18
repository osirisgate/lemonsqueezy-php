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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Order\OrderItem;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class OrderItemResourceTest extends BaseResource
{
    /**
     * Tests that the order items resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetOrderItemsResource(): void
    {
        $orderItems = $this->lemonsqueezyClient->orderItems()->all();

        if (count($orderItems) > 0) {
            foreach ($orderItems as $orderItem) {
                self::assertEquals('order-items', $orderItem->getType());
                self::assertNotNull($orderItem->getSelfLink()->getValue());
                self::assertNotNull($orderItem->attributes());
                self::assertNotNull($orderItem->getId());
            }
        } else {
            self::assertCount(0, $orderItems);
        }
    }

    /**
     * Tests that a specific order item resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws ExceptionInterface
     */
    public function testCanGetOrderItemResource(): void
    {
        $orderItemId = 5455783;

        try {
            $orderItem = $this->lemonsqueezyClient->orderItems()->find($orderItemId);
            self::assertEquals('order-items', $orderItem->getType());
            self::assertEquals((string)$orderItemId, $orderItem->getId());
            self::assertNotEmpty($orderItem->getSelfLink());
            self::assertNotEmpty($orderItem->attributes());
        } catch (ExceptionInterface $exception) {
            self::fail('Failed to retrieve order item: ' . $exception->getMessage());
        }
    }
}
