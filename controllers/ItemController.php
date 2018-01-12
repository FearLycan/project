<?php

namespace app\controllers;

use app\components\AccessControl;

//use app\models\Category;
//use app\models\CategorySearch;
//use app\models\File;
//use app\models\FileSearch;
//use app\models\User;
use app\models\forms\RegistrationForm;
use app\models\Item;
use app\models\Shop;
use app\models\User;
use Yii;
use app\components\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;

//use yii\validators\ValidationAsset;
//use yii\web\NotFoundHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\forms\LoginForm;

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
        $dataProvider = new ActiveDataProvider([
            'query' => Item::find()->where(['status' => Item::STATUS_ACTIVE]),
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
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

        //die(var_dump($item->tags));

        if (empty($item)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
            'item' => $item,
        ]);
    }
}