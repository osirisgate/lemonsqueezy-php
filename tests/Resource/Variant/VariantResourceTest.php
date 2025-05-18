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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\Variant;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class VariantResourceTest extends BaseResource
{
    /**
     * Tests that the variants resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws HttpException
     * @throws ExceptionInterface
     */
    public function testCanGetVariantsResource(): void
    {
        $variants = $this->lemonsqueezyClient->variants()->all();

        if (count($variants) > 0) {
            foreach ($variants as $variant) {
                self::assertEquals('variants', $variant->getType());
                self::assertNotNull($variant->getSelfLink()->getValue());
                self::assertNotNull($variant->attributes());
                self::assertNotNull($variant->getId());
            }
        } else {
            self::assertCount(0, $variants);
        }
    }

    /**
     * Tests that a specific variant resource can be retrieved by its ID and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws ExceptionInterface
     */
    public function testCanGetVariantResource(): void
    {
        $variantId = 805030;

        try {
            $variant = $this->lemonsqueezyClient->variants()->find($variantId);
            self::assertEquals('variants', $variant->getType());
            self::assertEquals((string)$variantId, $variant->getId());
            self::assertNotEmpty($variant->getSelfLink());
            self::assertNotEmpty($variant->attributes());
            self::assertNotEmpty($variant->getId());
        } catch (ExceptionInterface $exception) {
            self::fail('Failed to retrieve variant: ' . $exception->getMessage());
        }
    }
}
