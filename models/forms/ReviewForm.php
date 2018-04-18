<?php

namespace app\models\forms;

use app\models\Review;

class ReviewForm extends Review
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $myFile;

    public function rules()
    {
        return [
            [['content', 'images'], 'string'],
            [['confirmed_by_purchase'], 'integer'],
            [['rating'], 'number'],

            [['myFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],
            [['myFile'], 'required', 'on' => static::SCENARIO_CREATE],
        ];
    }
}