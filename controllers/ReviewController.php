<?php

namespace app\controllers;

use app\components\Controller;
use app\models\forms\ReviewForm;
use app\models\Item;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ReviewController extends Controller
{
    public function actionCreate($id, $slug)
    {
        /* @var \app\models\Item $item */
        $item = Item::find()->where(['id' => $id, 'slug' => $slug])->one();

        if (empty($item)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new ReviewForm();

        $model->scenario = ReviewForm::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post())) {
            $model->myFile = UploadedFile::getInstance($model, 'myFile');
        }

        return $this->render('create', [
            'item' => $item,
            'model' => $model,
        ]);
    }
}
