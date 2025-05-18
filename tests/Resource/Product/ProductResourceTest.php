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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Product;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class ProductResourceTest extends BaseResource
{
    /**
     * Tests that the products resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetProductsResource(): void
    {
        $products = $this->lemonsqueezyClient->products()->all();

        if (count($products) > 0) {
            foreach ($products as $product) {
                self::assertEquals('products', $product->getType());
                self::assertNotNull($product->getSelfLink()->getValue());
                self::assertNotNull($product->attributes());
                self::assertNotNull($product->getId());
            }
        } else {
            self::assertCount(0, $products);
        }
    }

    /**
     * Tests that a specific product resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws ExceptionInterface
     */
    public function testCanGetProductResource(): void
    {
        $productId = 515890;

        try {
            $product = $this->lemonsqueezyClient->products()->find($productId);
            self::assertEquals('products', $product->getType());
            self::assertEquals((string)$productId, $product->getId());
            self::assertNotEmpty($product->getSelfLink());
            self::assertNotEmpty($product->attributes());
            self::assertNotEmpty($product->getId());
        } catch (ExceptionInterface $exception) {
            self::fail('Failed to retrieve product: ' . $exception->getMessage());
        }
    }
}
