<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $content
 * @property integer $author_id
 * @property integer $parent_id
 * @property integer $level
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 * @property Item $item
 * @property Comment $parent
 * @property Comment[] $replies
 */
class Comment extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_PENDING = 2;

    const LEVEL_ONE = 1;
    const LEVEL_TWO = 2;
    const LEVEL_THREE = 3;

    const NO_PARENT = 0;

    public $contentLength = 500;


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
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'author_id'], 'required'],
            [['item_id', 'author_id', 'parent_id', 'level', 'status'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'content' => 'Komentarz',
            'author_id' => 'Author',
            'parent_id' => 'Parent',
            'level' => 'Level',
            'status' => 'Status',
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
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Comment::className(), ['id' => 'parent_id']);
    }

    /**
     * @return array
     */
    public function getReplies()
    {
        return self::find()
            ->where(['parent_id' => $this->id])
            ->orderBy(['created_at' => SORT_ASC])
            ->all();
    }

    public function getCommentContent()
    {

        $preg = '{(@[a-zA-Z0-9][^\n\s]*)}';

        $this->content = Html::encode($this->content);

        if (preg_match_all($preg, $this->content, $users)) {


            foreach ($users as $user) {
                $name = str_replace('@', '', $user);
                $u = User::find()->where(['name' => $name])->one();

                if (!empty($u)) {
                    $link = '<a href="/user/' . $u->slug . '">@' . $u->name . '</a>';
                    $content = str_replace($user, $link, $this->content);
                }
            }

            return $content;
        }

        $this->content;

    }
}
