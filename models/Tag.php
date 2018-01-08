<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 * @property integer $author_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ItemTag[] $itemTags
 * @property Item[] $items
 * @property User $author
 */
class Tag extends ActiveRecord
{
    //statusy
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

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
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frequency', 'author_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'frequency' => 'Frequency',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemTags()
    {
        return $this->hasMany(ItemTag::className(), ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['id' => 'item_id'])->viaTable('{{%item_tag}}', ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return string[]
     */
    public static function getStatusNames()
    {
        return [
            static::STATUS_ACTIVE => 'Aktywny',
            static::STATUS_INACTIVE => 'Nieaktywny',
        ];
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return User::getStatusNames()[$this->status];
    }

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            static::STATUS_ACTIVE,
            static::STATUS_INACTIVE,
        ];
    }

    public function frequencyIncrement()
    {
        $this->frequency = $this->frequency + 1;
        $this->save(false, ['frequency']);
    }

    public function isActive()
    {
        if ($this->status == self::STATUS_ACTIVE) {
            return true;
        }

        return false;
    }
}
