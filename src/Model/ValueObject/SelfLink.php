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
 * SelfLink – Represents a self-referential link.
 *
 * Encapsulates a URL string that refers to the resource itself. This is
 * commonly found in API responses following the HATEOAS (Hypermedia as the
 * Engine of Application State) principle, allowing clients to navigate
 * and interact with resources based on links provided within the responses.
 *
 * This class provides a simple way to store and access the 'self' link of a
 * resource.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 */
final class SelfLink
{
    /**
     * @var string The URL of the self-referential link.
     */
    private string $self;

    /**
     * Returns the value of the self-referential link (the URL).
     *
     * @return string The self-referential URL.
     */
    public function getValue(): string
    {
        return $this->self;
    }
}
