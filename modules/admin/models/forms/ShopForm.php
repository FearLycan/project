<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Image;
use app\modules\admin\models\Shop;
use Yii;
use yii\helpers\Inflector;

class ShopForm extends Shop
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->status = static::STATUS_ACTIVE;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'string', 'max' => 255],
            [['status'], 'in', 'range' => array_keys(static::getStatuses())],
            [['name', 'url', 'status', 'color'], 'required'],
            [['image'], 'required', 'on' => static::SCENARIO_CREATE],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nazwa Sklepu',
            'image' => 'Logo',
            'url' => 'Link do strony sklepu',
            'color' => 'Kolor',
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $name = Inflector::slug($this->name) . '.' . $this->image->extension;

            $url = 'images/shop/' . $name;

            $this->image->saveAs($url);

            $this->image = $name;
            $this->author_id = Yii::$app->user->identity->id;

            //Image::createThumbnail($url, Shop::THUMBNAIL_MAX_WIDTH, Shop::THUMBNAIL_MAX_HEIGHT);

            return true;
        } else {
            return false;
        }
    }
}