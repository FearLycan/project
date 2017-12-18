<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Image;
use app\modules\admin\models\Shop;
use Yii;
use yii\helpers\Inflector;

class ShopForm extends Shop
{
    public $file;
    //public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name', 'file'], 'required'],
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nazwa',
            'file' => 'Logo',
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {

            $image = new Image();
            $image->author_id = Yii::$app->user->identity->id;
            $image->name = Inflector::slug($this->name) . '.' . $this->file->extension;
            $image->url = 'images/shop/' . $image->name;
            $image->save();

            $this->file->saveAs('images/shop/' . $image->name);
            //$this->file = null;
            $this->image_id = $image->getPrimaryKey();
            return true;
        } else {
            return false;
        }
    }
}