<?php

namespace app\models;


use yii\imagine\Image as Img;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;


class Image
{

    const THUMBNAIL_MAX_WIDTH = 250;
    const THUMBNAIL_MAX_HEIGHT = 250;

    const IMAGE_MAX_WIDTH = 700;
    const IMAGE_MAX_HEIGHT = 700;

    const URL = 'images/item/';
    const URL_THUMBNAIL = 'images/item/thumbnail/';


    public static function createThumbnail($url, $urlSave ,$width, $height)
    {
        Img::getImagine()->open($url)->thumbnail(new Box($width, $height))
            ->save($urlSave, ['quality' => 90]);
    }

    public static function changeSize($url, $width, $height)
    {
        Img::getImagine()->open($url)->thumbnail(new Box($width, $height))
            ->save($url, ['quality' => 99]);
    }
}
