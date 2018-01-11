<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Page;

class PageForm extends Page
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->status = static::STATUS_ACTIVE;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }
}