<?php

namespace app\controllers;

use app\models\Item;
use app\models\Tag;
use app\components\Controller;
use yii\data\ActiveDataProvider;

class TagController extends Controller
{
    public function actionView($name)
    {
        $query = Item::find()->joinWith('tags')->where(['tag.name' => $name]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 40,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
            'tag' => $name,
        ]);
    }
}