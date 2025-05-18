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

namespace Osirisgate\Component\Lemonsqueezy\Resource\File;

use Osirisgate\Component\HttpClient\Request\Exception\HttpException;
use Osirisgate\Component\Lemonsqueezy\Model\File\File;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;
use Osirisgate\Core\Exception\ExceptionInterface;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * FileResource – LemonSqueezy API file resource handler.
 *
 * Provides methods to list and retrieve file records from the LemonSqueezy API.
 * Supports listing all files and retrieving a single file by its ID.
 * It also offers a method to fetch the associated variant for a specific file.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class FileResource extends Resource implements FileResourceInterface
{
    /**
     * Lists all file records.
     *
     * Retrieves a paginated list of all files associated with your LemonSqueezy
     * account. You can optionally provide filters to narrow down the results.
     *
     * @param array<string, mixed> $filters An optional array of filters to apply to the list.
     * @param array<string, mixed> $options An optional array of options to apply to the list.
     * Refer to the LemonSqueezy API documentation for
     * available filter parameters.
     *
     * @return File[] An array of `File` model instances representing the retrieved files.
     *
     * @throws HttpException If an error occurs during the HTTP request.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     *
     * @url https://docs.lemonsqueezy.com/api/files/list-all-files
     */
    public function all(array $filters = [], array $options = []): array
    {
        $responseData = $this->get(uri: '/files', filters: $filters, options: $options);

        return File::fromArray($responseData);
    }

    /**
     * Retrieves a single file record by its ID.
     *
     * Fetches the details of a specific file based on the provided unique identifier.
     *
     * @param int $id The ID of the file to retrieve.
     *
     * @return File A `File` model instance representing the requested file.
     *
     * @throws RuntimeException If an unexpected error occurs during processing.
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., file not found).
     *
     * @url https://docs.lemonsqueezy.com/api/files/retrieve-file
     */
    public function find(int $id): File
    {
        $responseData = $this->get(uri: "/files/{$id}");

        return File::from($responseData);
    }

    /**
     * Retrieves the variant associated with a specific file.
     *
     * Fetches the details of the product variant that is linked to the given file ID.
     *
     * @param int $fileId The ID of the file whose variant to retrieve.
     *
     * @return Variant A `Variant` model instance representing the associated variant.
     *
     * @throws ExceptionInterface If a general exception related to the API occurs.
     * @throws HttpException If an error occurs during the HTTP request (e.g., file not found).
     * @throws RuntimeException If an unexpected error occurs during processing.
     *
     * @url https://api.lemonsqueezy.com/v1/files/1/variant
     */
    public function variant(int $fileId): Variant
    {
        $responseData = $this->get(uri: "/files/{$fileId}/variant");

        return Variant::from($responseData);
    }
}
