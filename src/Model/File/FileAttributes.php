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

namespace Osirisgate\Component\Lemonsqueezy\Model\File;

use Osirisgate\Component\Lemonsqueezy\Model\Trait\CreatedAtTrait;
use Osirisgate\Component\Lemonsqueezy\Model\Trait\UpdatedAtTrait;

/**
 * FileAttributes – LemonSqueezy API file attributes model.
 *
 * Encapsulates the attributes of a file entity within the LemonSqueezy API,
 * including details such as variant ID, file identifier, name, extension,
 * download URL, size, version, sort order, status, and test mode flag.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class FileAttributes
{
    use CreatedAtTrait;   // Provides the 'createdAt' property and its getter/setter.
    use UpdatedAtTrait;   // Provides the 'updatedAt' property and its getter/setter.

    /**
     * The ID of the product variant this file belongs to.
     */
    private ?int $variantId = null;

    /**
     * A unique identifier for the file.
     */
    private ?string $identifier = null;

    /**
     * The original name of the file.
     */
    private ?string $name = null;

    /**
     * The file extension (e.g., 'pdf', 'zip').
     */
    private ?string $extension = null;

    /**
     * The URL from which the file can be downloaded. This URL is typically signed and may expire.
     */
    private ?string $downloadUrl = null;

    /**
     * The size of the file in bytes.
     */
    private ?int $size = null;

    /**
     * The formatted size of the file for display (e.g., '1.2 MB').
     */
    private ?string $sizeFormatted = null;

    /**
     * The version of the file, if applicable.
     */
    private ?string $version = null;

    /**
     * The sort order of the file relative to other files for the same variant.
     */
    private ?int $sort = null;

    /**
     * The current status of the file (e.g., 'active').
     */
    private ?string $status = null;

    /**
     * Indicates whether the file was created in test mode.
     */
    private ?bool $testMode = null;

    /**
     * Returns the ID of the product variant this file belongs to.
     *
     * @return int|null The variant ID, or null if not set.
     */
    public function getVariantId(): ?int
    {
        return $this->variantId;
    }

    /**
     * Returns the unique identifier of the file.
     *
     * @return string|null The file identifier, or null if not set.
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * Returns the original name of the file.
     *
     * @return string|null The file name, or null if not set.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Returns the file extension.
     *
     * @return string|null The file extension, or null if not set.
     */
    public function getExtension(): ?string
    {
        return $this->extension;
    }

    /**
     * Returns the URL to download the file.
     *
     * @return string|null The download URL, or null if not set.
     */
    public function getDownloadUrl(): ?string
    {
        return $this->downloadUrl;
    }

    /**
     * Returns the size of the file in bytes.
     *
     * @return int|null The file size in bytes, or null if not set.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * Returns the formatted size of the file.
     *
     * @return string|null The formatted file size, or null if not set.
     */
    public function getSizeFormatted(): ?string
    {
        return $this->sizeFormatted;
    }

    /**
     * Returns the version of the file.
     *
     * @return string|null The file version, or null if not set.
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * Returns the sort order of the file.
     *
     * @return int|null The sort order, or null if not set.
     */
    public function getSort(): ?int
    {
        return $this->sort;
    }

    /**
     * Returns the current status of the file.
     *
     * @return string|null The file status, or null if not set.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Returns whether the file was created in test mode.
     *
     * @return bool|null True if in test mode, false otherwise, or null if not set.
     */
    public function isTestMode(): ?bool
    {
        return $this->testMode;
    }
}
