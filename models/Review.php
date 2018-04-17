<?php

namespace app\models;

use Yii;

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
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 */
class Review extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;
    const STATUS_REMOVED = 3;

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
}
