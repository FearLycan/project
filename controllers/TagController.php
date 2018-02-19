<?php

namespace app\controllers;

use app\models\Item;
use app\models\Tag;
use app\components\Controller;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Response;

class TagController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
               //     'json' => ['POST'],
                ],
            ],
        ];
    }

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