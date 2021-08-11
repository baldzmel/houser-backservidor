<?php

namespace App\Helpers;


use App\Helpers\Exceptions\UnknownTypeException;

class File
{
    /**
     * @param string $mime
     * @return string
     * @throws UnknownTypeException
     */
    public static function mimeToExtension($mime)
    {
        switch($mime) {
            case 'image/jpeg':
            case 'image/pjpeg':
                return '.jpg';

            case 'image/png':
                return '.png';

            case 'image/gif':
                return '.gif';

            case 'image/webp':
                return '.webp';

            default:
                throw new UnknownTypeException($mime);
        }
    }
}