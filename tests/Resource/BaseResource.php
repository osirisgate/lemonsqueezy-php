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

namespace Osirisgate\Component\Lemonsqueezy\Tests\Resource;

use Osirisgate\Component\Lemonsqueezy\LemonsqueezyClient;
use Osirisgate\Component\Lemonsqueezy\LemonsqueezyClientInterface;
use PHPUnit\Framework\TestCase;

/**
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
abstract class BaseResource extends TestCase
{
    protected LemonsqueezyClientInterface $lemonsqueezyClient;

    /**
     * Sets up the test environment before each test.
     *
     * Initializes the LemonSqueezy client using the API test key from the environment variables.
     * This ensures that each test has a fresh instance of the client.
     */
    protected function setUp(): void
    {
        /** @var string|bool|null $apiKey */
        $apiKey = $_ENV['LEMONSQUEEZY_API_TEST_KEY'] ?? false;

        if (!$apiKey || !is_string($apiKey)) {
            $this->markTestSkipped('LEMONSQUEEZY_API_TEST_KEY environment variable not set or is not a string.');
        }

        $this->lemonsqueezyClient = LemonsqueezyClient::init($apiKey);
    }
}
