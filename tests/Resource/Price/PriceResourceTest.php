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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Price;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class PriceResourceTest extends BaseResource
{
    /**
     * Tests that the prices resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetPricesResource(): void
    {
        $prices = $this->lemonsqueezyClient->prices()->all();

        if (count($prices) > 0) {
            foreach ($prices as $price) {
                self::assertEquals('prices', $price->getType());
                self::assertNotNull($price->getSelfLink()->getValue());
                self::assertNotNull($price->attributes());
                self::assertNotNull($price->getId());
            }
        } else {
            self::assertCount(0, $prices);
        }
    }

    /**
     * Tests that a specific price resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws ExceptionInterface
     */
    public function testCanGetPriceResource(): void
    {
        $priceId = 1241667; // Replace with a valid price ID for testing

        try {
            $price = $this->lemonsqueezyClient->prices()->find($priceId);
            self::assertEquals('prices', $price->getType());
            self::assertEquals((string)$priceId, $price->getId());
            self::assertNotEmpty($price->getSelfLink());
            self::assertNotEmpty($price->attributes());
            self::assertNotEmpty($price->getId());
        } catch (ExceptionInterface $exception) {
            self::fail('Failed to retrieve price: ' . $exception->getMessage());
        }
    }
}
