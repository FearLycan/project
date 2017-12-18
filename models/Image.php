<?php

namespace app\models;

use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\imagine\Image as Img;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $author_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 */
class Image extends ActiveRecord
{

    const THUMBNAIL_MAX_WIDTH = 250;
    const THUMBNAIL_MAX_HEIGHT = 250;

    const IMAGE_MAX_WIDTH = 1024;
    const IMAGE_MAX_HEIGHT = 1024;


    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'url'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function createThumbnail()
    {
        $image = Image::find()->where(['product_id' => $this->id])->one();

        Img::getImagine()->open('images/products/' . $image->name)->thumbnail(new Box(static::THUMBNAIL_MAX_WIDTH, static::IMAGE_MAX_HEIGHT))
            ->save('images/products/thumb/' . $image->name, ['quality' => 90]);

    }

    public function changeSize()
    {
        $image = Image::find()->where(['product_id' => $this->id])->one();

        Img::getImagine()->open('images/products/' . $image->name)->thumbnail(new Box(static::IMAGE_MAX_WIDTH, static::IMAGE_MAX_HEIGHT))
            ->save('images/products/' . $image->name, ['quality' => 99]);

        $img = Img::getImagine()->open('images/products/' . $image->name);

        $image->width = $img->getSize()->getWidth();
        $image->height = $img->getSize()->getHeight();

        $image->save(['width', 'height']);

    }
}
