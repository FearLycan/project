<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%review}}".
 *
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property string $rating
 * @property string $images
 * @property integer $confirmed_by_purchase
 * @property integer $author_id
 * @property integer $item_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 * @property Item $item
 */
class Review extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;
    const STATUS_REMOVED = 3;

    const CONFIRM_BY_PURCHASE = 1;
    const NOT_CONFIRM_BY_PURCHASE = 0;

    /**
     * @param bool $insert
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
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%review}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'images'], 'string'],
            [['status', 'confirmed_by_purchase', 'author_id'], 'integer'],
            [['rating'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
            'content' => 'Content',
            'status' => 'Status',
            'rating' => 'Rating',
            'images' => 'Images',
            'confirmed_by_purchase' => 'Confirmed By Purchase',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            self::STATUS_ACTIVE => 'Aktywny',
            self::STATUS_INACTIVE => 'Nieaktywny',
            self::STATUS_PENDING => 'Oczekujący',
            self::STATUS_REMOVED => 'Usunięty',
        ];
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return self::getStatusNames()[$this->status];
    }

    public static function getPendingCount()
    {
        return self::find()->where(['status' => self::STATUS_PENDING])->count();
    }
}
