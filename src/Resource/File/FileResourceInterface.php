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

use Osirisgate\Component\Lemonsqueezy\Model\File\File;
use Osirisgate\Component\Lemonsqueezy\Model\Variant\Variant;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\ListableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Contract\RetrievableResourceInterface;
use Osirisgate\Component\Lemonsqueezy\Resource\Resource;

/**
 * FileResourceInterface – LemonSqueezy API file resource interface.
 *
 * Defines the contract for interacting with file resources in the LemonSqueezy API.
 * It extends interfaces for listing and retrieving single resources. Additionally,
 * it specifies a method for fetching the associated variant for a given file.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
interface FileResourceInterface extends
    ListableResourceInterface,
    RetrievableResourceInterface
{
    /**
     * Retrieves the variant associated with a specific file.
     *
     * @param int $fileId The ID of the file.
     * @return Variant The associated variant.
     */
    public function variant(int $fileId): Variant;
}
