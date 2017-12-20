<?php

namespace app\models;

use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\imagine\Image as Img;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;


class Image
{

    const THUMBNAIL_MAX_WIDTH = 250;
    const THUMBNAIL_MAX_HEIGHT = 250;

    const IMAGE_MAX_WIDTH = 1024;
    const IMAGE_MAX_HEIGHT = 1024;


    public static function createThumbnail($url, $width, $height)
    {
        Img::getImagine()->open($url)->thumbnail(new Box($width, $height))
            ->save($url, ['quality' => 90]);
    }

    public static function changeSize($url)
    {
        Img::getImagine()->open($url)->thumbnail(new Box(static::IMAGE_MAX_WIDTH, static::IMAGE_MAX_HEIGHT))
            ->save($url, ['quality' => 99]);
    }
}
