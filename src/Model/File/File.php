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

use Osirisgate\Component\Lemonsqueezy\Model\Model;

/**
 * File – LemonSqueezy API file model.
 *
 * A file represents a digital good that can be downloaded
 * by a customer after the product has been purchased.
 *
 * @author Ulrich Geraud AHOGLA <developer@osirisgate.com>
 *
 * @url https://docs.lemonsqueezy.com/api/files/the-file-object
 */
final class File extends Model
{
    /**
     * The attributes of the file.
     *
     * This property holds an instance of the FileAttributes class,
     * which contains the detailed information about the file.
     */
    private FileAttributes $attributes;

    /**
     * Returns the attributes of the file.
     *
     * This method provides access to the FileAttributes object
     * associated with this File instance.
     *
     * @return FileAttributes The file attributes.
     */
    public function attributes(): FileAttributes
    {
        return $this->attributes;
    }
}
