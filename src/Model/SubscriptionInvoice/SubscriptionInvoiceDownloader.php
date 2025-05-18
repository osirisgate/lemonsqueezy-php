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

namespace Osirisgate\Component\Lemonsqueezy\Model\SubscriptionInvoice;

use Osirisgate\Component\Lemonsqueezy\Model\ValueObject\InvoiceDownloader;
use Osirisgate\Core\Exception\RuntimeException;

/**
 * SubscriptionInvoiceDownloader – LemonSqueezy API subscription invoice downloader model.
 *
 * Manages the retrieval of the download URL for invoices associated with
 * subscriptions in the LemonSqueezy API. This class extends the base
 * `InvoiceDownloader` value object and implements specific logic to handle
 * subscription invoice data.
 *
 * It performs a validation check to ensure that the 'download_invoice' key
 * exists within the provided data array, which is expected to contain the
 * URL for downloading the invoice. If this key is missing, a `RuntimeException`
 * is thrown to indicate an invalid data structure.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SubscriptionInvoiceDownloader extends InvoiceDownloader
{
    /**
     * Hydrates the invoice downloader with data, specifically looking for the download URL
     * under the 'download_invoice' key.
     *
     * @param array<string, mixed> $data An array containing the subscription invoice information,
     * expected to have a 'download_invoice' key.
     *
     * @throws RuntimeException If the 'download_invoice' key is not present in the provided data.
     */
    protected function hydrate(array $data): void
    {
        if (!array_key_exists('download_invoice', $data)) {
            throw new RuntimeException([
                'message' => 'The {download_invoice} is required to the resource.',
                'details' => [
                    'data' => $data,
                ],
            ]);
        }

        $this->downloadUrl = $data['download_invoice'];
    }
}
