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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Store;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class StoreResourceTest extends BaseResource
{
    /**
     * Tests that the stores resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetStoresResource(): void
    {
        $stores = $this->lemonsqueezyClient->stores()->all();

        foreach ($stores as $store) {
            self::assertEquals('stores', $store->getType());
            self::assertNotNull($store->getSelfLink()->getValue());
            self::assertNotNull($store->attributes());
            self::assertNotNull($store->getId());
        }
    }

    /**
     * Tests that a specific store resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetStoreResource(): void
    {
        $storeId = 178624;

        try {
            $store = $this->lemonsqueezyClient->stores()->find($storeId);

            self::assertEquals('stores', $store->getType());
            self::assertEquals((string)$storeId, $store->getId());
            self::assertNotNull($store->getSelfLink()->getValue());
            self::assertNotNull($store->attributes());
            self::assertNotNull($store->getId());
        } catch (ExceptionInterface $exception) {
            self::fail('Failed to retrieve store: ' . $exception->getMessage());
        }
    }
}
