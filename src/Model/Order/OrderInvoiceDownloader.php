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

namespace Osirisgate\Component\Lemonsqueezy\Model\Order;

use Osirisgate\Component\Lemonsqueezy\Model\ValueObject\InvoiceDownloader;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * OrderInvoiceDownloader – LemonSqueezy API order invoice downloader model.
 *
 * Handles the downloading of invoice files for orders in the LemonSqueezy API.
 * This class extends the `InvoiceDownloader` value object and specifically
 * manages the retrieval of the invoice download URL associated with an order.
 * It includes a validation step to ensure that the necessary 'download_url'
 * key exists within the provided data.
 *
 * If the 'download_url' is missing, this class will throw a `RuntimeException`
 * to indicate an invalid data structure.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class OrderInvoiceDownloader extends InvoiceDownloader
{
    /**
     * Hydrates the invoice downloader with data, specifically looking for the download URL.
     *
     * @param array<string, mixed> $data An array containing the invoice information,
     * expected to have a 'download_url' key.
     *
     * @throws RuntimeException If the 'download_url' key is not present in the provided data.
     */
    protected function hydrate(array $data): void
    {
        if (!array_key_exists('download_url', $data)) {
            throw new RuntimeException([
                'message' => 'The {download_url} is required to the resource.',
                'details' => [
                    'data' => $data,
                ],
            ]);
        }

        $this->downloadUrl = $data['download_url'];
    }
}
