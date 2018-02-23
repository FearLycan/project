<?php

namespace app\models\forms;

use app\models\Comment;
use app\models\Item;

class CommentForm extends Comment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'content'], 'required'],
            [['item_id', 'author_id', 'parent_id'], 'integer'],
            [['content'], 'string'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }
}