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

namespace Osirisgate\Component\Lemonsqueezy\Exception;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Core\Exception\ExceptionInterface;

/**
 * Provides a utility method to convert a generic {@see ExceptionInterface}
 * into an {@see HttpException}.
 *
 * This abstract class acts as a helper within the LemonSqueezy SDK context
 * to standardize exception handling by transforming custom exceptions
 * into HTTP-specific exceptions.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
abstract class Exception
{
    /**
     * Converts an object implementing {@see ExceptionInterface} into an {@see HttpException}.
     *
     * This method takes any exception that conforms to the {@see ExceptionInterface}
     * and wraps its core information (status code, message, and details)
     * into a new {@see HttpException}. This is useful for ensuring that
     * exceptions within the LemonSqueezy integration are represented as
     * HTTP exceptions, which can be more easily handled by HTTP clients
     * or frameworks.
     *
     * @param ExceptionInterface $exception The original exception to convert.
     * @return ExceptionInterface An instance of {@see HttpException} containing the information
     * from the original exception.
     */
    public static function throw(ExceptionInterface $exception): ExceptionInterface
    {
        return new HttpException([
            'status_code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'details' => $exception->getDetails(),
        ]);
    }
}
