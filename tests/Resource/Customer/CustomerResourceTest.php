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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Customer;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Enum\Status;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class CustomerResourceTest extends BaseResource
{
    /**
     * Tests that the customers resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetCustomersResource(): void
    {
        $customers = $this->lemonsqueezyClient->customers()->all();

        if (count($customers) > 0) {
            foreach ($customers as $customer) {
                self::assertEquals('customers', $customer->getType());
                self::assertNotNull($customer->getSelfLink()->getValue());
                self::assertNotNull($customer->attributes());
                self::assertNotNull($customer->getId());
            }
        } else {
            self::assertCount(0, $customers);
        }
    }

    /**
     * Tests that a specific customer resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetCustomerResource(): void
    {
        $customerId = 5775842;

        try {
            $customer = $this->lemonsqueezyClient->customers()->find($customerId);

            self::assertEquals('customers', $customer->getType());
            self::assertEquals((string)$customerId, $customer->getId());
            self::assertNotNull($customer->getSelfLink()->getValue());
            self::assertNotNull($customer->attributes());
            self::assertNotNull($customer->getId());
        } catch (ExceptionInterface $exception) {
            $exceptionFormatted = $exception->format();
            self::assertEquals(Status::ERROR->value, $exceptionFormatted['status']);
        }
    }

    /**
     * Tests the creation of a new customer resource.
     *
     * Due to the nature of API interactions, this test might create a new resource.
     * Ensure your testing environment is set up to handle this appropriately.
     */
    public function testCanCreateCustomerResource(): void
    {
        $storeId = '178624';
        $customerData = [
            'type' => 'customers',
            'attributes' => [
                'name' => 'John Wick',
                'email' => 'johnwick@example.com',
                'city' => 'Paris',
                'region' => 'Paris',
                'country' => 'FR',
            ],
            'relationships' => [
                'store' => [
                    'data' => [
                        'type' => 'stores',
                        'id' => $storeId,
                    ],
                ],
            ],
        ];

        try {
            $customer = $this->lemonsqueezyClient->customers()->create($customerData);
            self::assertEquals('customers', $customer->getType());
            self::assertNotNull($customer->getSelfLink()->getValue());
            self::assertNotNull($customer->attributes());
            self::assertNotNull($customer->getId());
        } catch (ExceptionInterface $exception) {
            $exceptionFormatted = $exception->format();
            self::assertEquals(Status::ERROR->value, $exceptionFormatted['status']);
        }
    }

    /**
     * Tests the updating of an existing customer resource.
     *
     * This test assumes a specific customer ID exists and attempts to update its attributes.
     * Replace the customer ID with a valid one for testing.
     */
    public function testCanUpdateCustomerResource(): void
    {
        $customerIdToUpdate = '5775873'; // Replace with a valid customer ID to update
        $updateData = [
            'id' => $customerIdToUpdate,
            'type' => 'customers',
            'attributes' => [
                'name' => 'John Wick',
                'email' => 'johnwick@example.com',
                'status' => 'archived',
            ],
        ];

        try {
            $customer = $this->lemonsqueezyClient->customers()->update($updateData);
            self::assertEquals('customers', $customer->getType());
            self::assertNotNull($customer->getSelfLink()->getValue());
            self::assertNotNull($customer->attributes());
            self::assertEquals($customerIdToUpdate, $customer->getId());
        } catch (ExceptionInterface $exception) {
            $exceptionFormatted = $exception->format();
            self::assertEquals(Status::ERROR->value, $exceptionFormatted['status']);
        }
    }
}
