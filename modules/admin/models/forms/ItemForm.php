<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Image;
use app\modules\admin\models\Item;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Type;
use Yii;
use yii\helpers\Inflector;

class ItemForm extends Item
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $tags;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->status = static::STATUS_ACTIVE;
        $this->gender = static::GENDER_MALE;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'type_id'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
            [['shop_id', 'type_id', 'status', 'title', 'url', 'gender', 'tags'], 'required'],
            //[['tags'], 'required'],
            //[['tags'], 'safe'],

            //['tags', 'tag'],

            [['image'], 'required', 'on' => static::SCENARIO_CREATE],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],

            [['status'], 'in', 'range' => array_keys(static::getStatuses())],
            [['gender'], 'in', 'range' => array_keys(static::getGendersNames())],

            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $randomString = Yii::$app->getSecurity()->generateRandomString(10);
            $name = Inflector::slug($this->title) . '_' . $randomString . '.' . $this->image->extension;

            $url = Image::URL . $name;
            $urlThumb = Image::URL_THUMBNAIL . $name;

            $this->image->saveAs($url);
            $this->image->saveAs($urlThumb);

            $this->image = $name;

            Image::createThumbnail($url, $urlThumb, Image::THUMBNAIL_MAX_WIDTH, Image::THUMBNAIL_MAX_HEIGHT);
            Image::changeSize($url, Image::IMAGE_MAX_WIDTH, Image::IMAGE_MAX_HEIGHT);

            return true;
        } else {
            return false;
        }
    }

//    public function tag($attribute)
//    {
//        //print_r($this->tags);
//
//
//        $this->addError($attribute, $this->tags);
//
//    }
}