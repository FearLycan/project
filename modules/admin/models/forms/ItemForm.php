<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Image;
use app\modules\admin\models\Item;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Tag;
use app\modules\admin\models\Type;
use Yii;
use yii\helpers\Inflector;

class ItemForm extends Item
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $tags;
    public $myFile;

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

            ['tags', 'tag'],

            [['myFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],
            //[['myFile'], 'required', 'on' => static::SCENARIO_CREATE],
            [['myFile'], 'file','skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],


//            [['image'], 'required', 'on' => static::SCENARIO_CREATE],
//            [['image'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],

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
        $randomString = Yii::$app->getSecurity()->generateRandomString(10);
        $name = Inflector::slug($this->title) . '_' . $randomString . '.' . $this->myFile->extension;
        $url = Image::URL . $name;
        $urlThumb = Image::URL_THUMBNAIL . $name;
        $this->image = $name;

        if (!$this->myFile->saveAs($url)) {
            $this->addError('myFile', 'Unable to save the uploaded file');
        }

        Image::createThumbnail($url, $urlThumb, Image::THUMBNAIL_MAX_WIDTH, Image::THUMBNAIL_MAX_HEIGHT);
        Image::changeSize($url, Image::IMAGE_MAX_WIDTH, Image::IMAGE_MAX_HEIGHT);

        return true;
    }


    public function uploadItemImage(){
        $url = Image::URL . $this->image;
        $urlThumb = Image::URL_THUMBNAIL . $this->image;
        if(!$this->myFile->saveAs($url)){
            $this->addError('myFile','Unable to save the uploaded file');
        }
        $this->myFile = $url;
        Image::createThumbnail($url, $urlThumb, Image::THUMBNAIL_MAX_WIDTH, Image::THUMBNAIL_MAX_HEIGHT);
        Image::changeSize($url, Image::IMAGE_MAX_WIDTH, Image::IMAGE_MAX_HEIGHT);
    }

    public function tag($attribute)
    {
        foreach ($this->tags as $tag) {
            /* @var Tag $t */
            $t = Tag::find()->where(['name' => $tag])->one();
            $text = '';
            if (!empty($t) && !$t->isActive()) {
                $text .= '[' . $tag . ']';
            }
        }

        if (!empty($text)) {
            $this->addError('tags', 'Tagi: ' . $text . ' są niedozwolone.');
        }
    }
}