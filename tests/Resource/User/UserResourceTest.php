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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource\User;

use Osirisgate\Component\Lemonsqueezy\Tests\Resource\BaseResource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class UserResourceTest extends BaseResource
{
    /**
     * Tests that the authenticated user resource can be retrieved and its basic structure is valid.
     *
     * @throws RuntimeException
     * @throws ExceptionInterface
     */
    public function testCanGetUserResource(): void
    {
        try {
            $user = $this->lemonsqueezyClient->users()->find();
            self::assertEquals('users', $user->getType());
            self::assertNotEmpty($user->getSelfLink());
            self::assertNotEmpty($user->attributes());
            self::assertNotEmpty($user->getId());
        } catch (ExceptionInterface $exception) {
            self::fail('Failed to retrieve user: ' . $exception->getMessage());
        }
    }
}
