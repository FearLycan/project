<?php

namespace app\controllers;

use app\models\forms\CommentForm;
use app\models\Item;
use app\models\searches\ItemSearch;
use Yii;
use app\components\Controller;
use yii\web\NotFoundHttpException;

class ItemController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id, $slug)
    {
        $item = Item::find()->where(['id' => $id, 'slug' => $slug])->one();

        if (empty($item)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $comment = new CommentForm();
        $comment->item_id = $id;

        $similar = $item->getSimilar(2,6);

        //die(var_dump($similar));

        return $this->render('view', [
            'item' => $item,
            'similar' => $similar,
            'comment' => $comment,
        ]);
    }
}