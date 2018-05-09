<?php

namespace app\controllers;

use app\components\Controller;
use app\models\Page;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
        $page = Page::find()->where(['slug' => $slug])->one();

        if (empty($page)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
            'page' => $page,
        ]);
    }
}