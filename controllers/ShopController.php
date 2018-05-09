<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Item;
use app\models\searches\ItemSearch;
use app\models\searches\ShopSearch;
use app\models\Shop;
use Yii;
use yii\web\NotFoundHttpException;

class ShopController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ShopSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($slug)
    {
        $model = Shop::find()
            ->where(['slug' => $slug])
            ->one();

        if (($model === null)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $query = Item::find()->where(['shop_id' => $model->id, 'status' => Shop::STATUS_ACTIVE]);

        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}