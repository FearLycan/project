<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Type;

class TypeForm extends Type
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name', 'status'], 'required'],
            [['status'], 'in', 'range' => array_keys(static::getStatuses())],
        ];
    }
}