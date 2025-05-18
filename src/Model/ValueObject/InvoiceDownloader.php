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

namespace Osirisgate\Component\Lemonsqueezy\Model\ValueObject;

/**
 * InvoiceDownloader – Abstract base for invoice download handling.
 *
 * Provides a foundational structure for classes that handle the retrieval
 * of invoice download URLs from LemonSqueezy API responses. This abstract
 * class defines a protected `$downloadUrl` property to store the URL and
 * includes a constructor that mandates the implementation of a `hydrate()`
 * method in its subclasses. The `hydrate()` method is responsible for
 * extracting the download URL from the provided data array and setting
 * the `$downloadUrl` property.
 *
 * Additionally, it offers a static `from()` factory method for conveniently
 * creating instances of concrete `InvoiceDownloader` subclasses. Subclasses
 * must implement the `hydrate()` method to define how the download URL is
 * extracted based on the specific structure of the API response for different
 * types of invoices (e.g., order invoices, subscription invoices).
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
abstract class InvoiceDownloader
{
    /**
     * @var string|null The URL for downloading the invoice.
     */
    protected ?string $downloadUrl = null;

    /**
     * Constructor. Calls the abstract hydrate method to initialize the download URL.
     *
     * @param array<string, mixed> $data An array containing the data from which to extract the download URL.
     */
    protected function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * Returns the URL for downloading the invoice.
     *
     * @return string The invoice download URL.
     */
    public function getDownloadUrl(): string
    {
        return $this->downloadUrl;
    }

    /**
     * Static factory method to create a new instance of the implementing class.
     *
     * @param array<string, mixed> $data An array containing the data needed to hydrate the downloader.
     *
     * @return static A new instance of the implementing InvoiceDownloader subclass.
     */
    public static function from(array $data): static
    {
        return new static($data);
    }

    /**
     * Abstract method to be implemented by subclasses to hydrate the download URL
     * from the provided data array.
     *
     * @param array<string, mixed> $data An array containing the data from which to extract the download URL.
     */
    abstract protected function hydrate(array $data): void;
}
