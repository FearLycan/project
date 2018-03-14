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

    /**
     * Get options for Select2 widget in offer form.
     *
     * @param string $phrase
     * @param int $page
     * @return array
     */
    public function actionList($phrase, $page = 1)
    {
        $limit = 20;

        $tags = Tag::find()->select(['id', 'name'])
            ->where(['status' => Tag::STATUS_ACTIVE])
            ->andWhere(['like', 'name', $phrase])
            ->limit($limit)
            ->offset(($page - 1) * $limit)
            ->all();

        $results = [];
        /* @var $tag Tag */
        foreach ($tags as $tag) {

            $results[] = [
                'id' => $tag->name,
                'name' => $tag->name,
            ];
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'results' => $results,
            'pagination' => [
                'page' => $page,
                'more' => count($results) === $limit,
            ],
        ];
    }
}