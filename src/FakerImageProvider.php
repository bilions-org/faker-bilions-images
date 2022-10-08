<?php

namespace Bilions\FakerImages;

use Faker\Provider\Base as BaseProvider;

class FakerImageProvider extends BaseProvider
{
    /**
     * Download a remote image from picsum api to disk and return its filename/path
     *
     * Requires curl, or allow_url_fopen to be on in php.ini.
     *
     * @example '/path/to/dir/13b73edae8443990be1aa8f1a483bc27.jpg'
     */
    public static function image(
        string $dir = null,
        int $width = 640,
        int $height = 480,
        bool $isFullPath = true,
        int $id = null,
        bool $randomize = true,
        bool $gray = false,
        int $blur = null,
        string $imageExtension = null
    ): string {
        return $dir;
    }
}
