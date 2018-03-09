<?php

namespace app\models\forms;


use app\models\Comment;
use app\models\Item;

class ReplyForm extends Comment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'content', 'parent_id'], 'required'],
            [['item_id', 'author_id', 'parent_id'], 'integer'],
            [['content'], 'string', 'max' => $this->contentLength],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }
}