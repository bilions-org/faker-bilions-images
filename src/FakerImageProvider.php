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

        // set text and center text
        $text = self::getText();
        $font = realpath(dirname(__FILE__).'/ReadexPro-Regular.ttf');
        $size = 30;
        $box = imagettfbbox($size, 0, $font, $text);
        $textWidth = abs($box[2]) - abs($box[0]);
        $textHeight = abs($box[5]) - abs($box[3]);
        $x = round(($width - $textWidth) / 2, 0);
        $y = round(($height + $textHeight) / 2, 0);
        imagettftext($image, $size, 0, $x, $y, $textColor, $font, $text);

        imagecolordeallocate($image, $textColor);
        imagecolordeallocate($image, $background);

        $dir = $dir === null ? '/tmp' : $dir;
        $name = md5(uniqid().time().random_int(10000, 99999));
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
