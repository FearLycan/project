<?php

namespace app\models\forms;

use app\models\Image;
use app\models\Item;
use app\models\Shop;
use app\models\Tag;
use app\models\Type;
use Yii;
use yii\helpers\Inflector;

class ItemForm extends Item
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $tags;
    public $myFile;
    public $descriptionLength = 260;

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
            [['description'], 'string', 'max' => $this->descriptionLength],
            [['shop_id', 'type_id', 'status', 'title', 'url', 'gender', 'tags'], 'required'],

            [['url'], 'url', 'defaultScheme' => ['http', 'https']],
            ['tags', 'tag'],

            [['myFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],
            [['myFile'], 'required', 'on' => static::SCENARIO_CREATE],

            [['gender'], 'in', 'range' => array_keys(static::getGendersNames())],

            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tytuł',
            'description' => 'Opis produktu',
            'url' => 'Link do sklepu',
            'myFile' => 'Grafika',
            'gender' => 'Dla kogo',
            'shop_id' => 'Sklep',
            'type_id' => 'Typ',
            'status' => 'Status',
            'tags' => 'Tagi',
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


    public function uploadItemImage()
    {
        $url = Image::URL . $this->image;
        $urlThumb = Image::URL_THUMBNAIL . $this->image;
        if (!$this->myFile->saveAs($url)) {
            $this->addError('myFile', 'Unable to save the uploaded file');
            return false;
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