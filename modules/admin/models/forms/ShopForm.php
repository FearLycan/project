<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Image;
use app\modules\admin\models\Shop;
use Yii;
use yii\helpers\Inflector;

class ShopForm extends Shop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name', 'image'], 'required'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nazwa',
            'image' => 'Logo',
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

            Image::createThumbnail($url);

            return true;
        } else {
            return false;
        }
    }
}