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
        string $imageExtension = 'jpg'
    ) {
        $img = imagecreate($width, $height);
        $fontcolor = imagecolorallocate($img, 120, 60, 200);
        imagestring($img, 12, 150, 120, "Demo Text1", $fontcolor);

        $dir = $dir === null ? sys_get_temp_dir() : $dir; // GNU/Linux / OS X / Windows compatible
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = $name . "." . $imageExtension;
        $filePath = $dir . DIRECTORY_SEPARATOR . $filename;

        // save file
        file_put_contents($filePath, $img);
        return $isFullPath ? $filePath : $filename;
    }
}
