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

namespace Osirisgate\Component\Lemonsqueezy\Model\Variant;

/**
 * VariantLink – Represents a hyperlink related to a product variant.
 *
 * Contains the title (display text) and the actual URL of a link associated
 * with a product variant in LemonSqueezy. These links can provide additional
 * information or resources related to the variant.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class VariantLink
{
    /**
     * @var string|null The title or display text of the link.
     */
    private ?string $title = null;

    /**
     * @var string|null The URL of the link.
     */
    private ?string $url = null;

    /**
     * Returns the title of the link.
     *
     * @return string|null The link title.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Returns the URL of the link.
     *
     * @return string|null The link URL.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
}
