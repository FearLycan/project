<?php

namespace app\models;

use app\components\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%item}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $url
 * @property string $image
 * @property string $description
 * @property integer $gender
 * @property integer $shop_id
 * @property integer $type_id
 * @property integer $status
 * @property integer $author_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 * @property Shop $shop
 * @property Type $type
 * @property ItemTag[] $itemTags
 * @property Tag[] $tags
 */
class Item extends ActiveRecord
{
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    const GENDER_KID = 'kid';

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_PENDING = 2;
    const STATUS_ARCHIVES = 3;


    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
//            'slug' => [
//                'class' => SluggableBehavior::className(),
//                'attribute' => 'title',
//            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'type_id', 'status', 'author_id'], 'integer'],
            [['shop_id', 'type_id', 'author_id'], 'required'],
            [['created_at', 'updated_at', 'gender', 'description'], 'string'],
            [['title', 'slug', 'url', 'image'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
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
            'title' => 'Title',
            'slug' => 'Slug',
            'url' => 'Url',
            'image' => 'Image',
            'gender' => 'Gender',
            'shop_id' => 'Shop ID',
            'type_id' => 'Type ID',
            'status' => 'Status',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            static::STATUS_ACTIVE => 'Aktywny',
            static::STATUS_PENDING => 'Oczekujący',
            static::STATUS_INACTIVE => 'Nieaktywny',
            static::STATUS_ARCHIVES => 'Archiwum',
        ];
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return self::getStatusNames()[$this->status];
    }

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            static::STATUS_ACTIVE,
            static::STATUS_PENDING,
            static::STATUS_INACTIVE,
            static::STATUS_ARCHIVES,
        ];
    }

    /**
     * @return array
     */
    public static function getActiveStatuses()
    {
        return [
            static::STATUS_ACTIVE,
            static::STATUS_ARCHIVES,
        ];
    }

    /**
     * @return string[]
     */
    public static function getGendersNames()
    {
        return [
            static::GENDER_MALE => 'Męski',
            static::GENDER_FEMALE => 'Żeński',
            static::GENDER_KID => 'Dziecięcy'
        ];
    }

    /**
     * @return string
     */
    public function getGenderName()
    {
        return static::getGendersNames()[$this->gender];
    }

    /**
     * @return array
     */
    public static function getGenders()
    {
        return [
            static::GENDER_MALE,
            static::GENDER_FEMALE,
            static::GENDER_KID
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemTags()
    {
        return $this->hasMany(ItemTag::className(), ['item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('{{%item_tag}}', ['item_id' => 'id']);
    }

    public function removeImageFile()
    {
        if (file_exists(Image::URL . $this->image && Image::URL_THUMBNAIL . $this->image)) {
            unlink(Image::URL . $this->image);
            unlink(Image::URL_THUMBNAIL . $this->image);
        }
    }

    /**
     * @param $n
     * @return array|ActiveRecord[]
     */
    public function getSimilar($tagLimit = 2, $itemLimit = 6)
    {
        $ids = ItemTag::find()
            ->select(['tag_id'])
            ->where(['item_id' => $this->id])
            ->orderBy(new Expression('rand()'))
            ->limit($tagLimit)
            ->asArray()
            ->all();

        $ids = ArrayHelper::getColumn($ids, 'tag_id');

        $items = self::find()
            ->joinWith('tags')
            ->where(['tag.id' => $ids])
            ->andWhere(['!=', 'item.id', $this->id])
            ->orderBy(new Expression('rand()'))
            ->limit($itemLimit)
            ->all();

        return $items;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return in_array($this->status, self::getActiveStatuses());
    }
}
