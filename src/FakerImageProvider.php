<?php

namespace Bilions\FakerImages;

use Faker\Factory;
use Faker\Provider\Base;

class FakerImageProvider extends Base
{
    public static function image(
        string $dir = null,
        int $width = 640,
        int $height = 480,
        string $imageExtension = 'png'
    ) {
        list($r, $g, $b) = self::getBackgroundColor();
        $image = imagecreate($width, $height);
        $background = imagecolorallocate($image, $r, $g, $b);
        $textColor = imagecolorallocate($image, 255, 255, 255);
        imagecolordeallocate($image, $textColor);
        imagecolordeallocate($image, $background);

        $dir = $dir === null ? '/tmp' : $dir;
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = $name . "." . $imageExtension;
        $filePath = $dir . DIRECTORY_SEPARATOR . $filename;
        imagejpeg($image, $filePath);
        return $filePath;
    }

    public static function getText()
    {
        $faker = Factory::create();
        return $faker->word();
    }

    public static function getBackgroundColor()
    {
        $colors = [
            [235, 64, 52],
            [235, 156, 52],
            [235, 229, 52],
            [147, 235, 52],
            [52, 235, 168],
            [52, 122, 235],
            [177, 52, 235],
        ];
        $index = rand(0, count($colors) -1);
        return $colors[$index];
    }
}
