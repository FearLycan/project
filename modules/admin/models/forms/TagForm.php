<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Tag;

class TagForm extends Tag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frequency'], 'integer'],
            [['name', 'status', 'frequency'], 'required'],
            [['status'], 'in', 'range' => array_keys(static::getStatuses())],
            [['name', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }
}