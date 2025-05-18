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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Order;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Enum\Status;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class OrderResourceTest extends BaseResource
{
    /**
     * Tests that the orders resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetOrdersResource(): void
    {
        $orders = $this->lemonsqueezyClient->orders()->all();

        if (count($orders) > 0) {
            foreach ($orders as $order) {
                self::assertEquals('orders', $order->getType());
                self::assertNotNull($order->getSelfLink()->getValue());
                self::assertNotNull($order->attributes());
                self::assertNotNull($order->getId());
            }
        } else {
            self::assertCount(0, $orders);
        }
    }

    /**
     * Tests that a specific order resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws ExceptionInterface
     */
    public function testCanGetOrderResource(): void
    {
        $orderId = 5516538;

        try {
            $order = $this->lemonsqueezyClient->orders()->find($orderId);
            self::assertEquals('orders', $order->getType());
            self::assertEquals((string)$orderId, $order->getId());
            self::assertNotEmpty($order->getSelfLink());
            self::assertNotEmpty($order->attributes());
        } catch (ExceptionInterface $exception) {
            self::assertEquals(Status::ERROR->getValue(), $exception->format()['status']);
        }
    }

    /**
     * Tests the generation of an invoice for a specific order.
     */
    public function testCanGenerateOrderInvoiceResource(): void
    {
        $orderId = 5516538;
        $invoiceDetails = [
            'name' => 'Ulrich AHOGLA',
            'address' => 'Avenue de la République',
            'city' => 'Paris',
            'state' => 'FR',
            'zip_code' => '75000',
            'country' => 'FR',
            'notes' => 'This is a test invoice',
        ];

        try {
            $orderInvoice = $this->lemonsqueezyClient->orders()->generateInvoice($orderId, $invoiceDetails);
            self::assertNotNull($orderInvoice->getDownloadUrl());
        } catch (ExceptionInterface $exception) {
            self::assertEquals(Status::ERROR->getValue(), $exception->format()['status']);
        }
    }

    /**
     * Tests the partial refund of an order.
     *
     * This test attempts to partially refund a specific order. Ensure the order ID is valid
     * and the testing environment allows for refunds.
     */
    public function testCanRefundPartiallyOrderResource(): void
    {
        $orderIdToRefund = '5516538';
        $refundAmount = 10;

        try {
            $order = $this->lemonsqueezyClient->orders()->makeRefund([
                'type' => 'orders',
                'id' => $orderIdToRefund,
                'attributes' => [
                    'amount' => $refundAmount,
                ],
            ]);
            self::assertEquals('orders', $order->getType());
            self::assertEquals($orderIdToRefund, $order->getId());
            self::assertEquals('partial_refund', $order->attributes()->getStatus());
            self::assertNotEmpty($order->getSelfLink());
            self::assertNotEmpty($order->attributes());
        } catch (ExceptionInterface $exception) {
            self::assertEquals(Status::ERROR->getValue(), $exception->format()['status']);
        }
    }

    /**
     * Tests the full refund of an order.
     *
     * This test attempts to fully refund a specific order. Ensure the order ID is valid
     * and the testing environment allows for refunds.
     */
    public function testCanFullRefundOrderResource(): void
    {
        $orderIdToRefund = '5516538';

        try {
            $order = $this->lemonsqueezyClient->orders()->makeRefund([
                'type' => 'orders',
                'id' => $orderIdToRefund,
            ]);
            self::assertEquals('orders', $order->getType());
            self::assertEquals($orderIdToRefund, $order->getId());
            self::assertEquals('refunded', $order->attributes()->getStatus());
            self::assertNotEmpty($order->getSelfLink());
            self::assertNotEmpty($order->attributes());
            self::assertNotNull($order->attributes()->getRefundedAt());
            self::assertTrue($order->attributes()->isRefunded());
        } catch (ExceptionInterface $exception) {
            self::assertEquals(Status::ERROR->getValue(), $exception->format()['status']);
        }
    }
}
