<?php

namespace app\controllers;


use app\components\Controller;
use app\models\forms\CommentForm;
use Yii;
use yii\filters\VerbFilter;

class CommentController extends Controller
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
                    'create' => ['POST'],
                ],
            ],
        ];
    }


    /**
     * Creates a new Comment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CommentForm();

        if ($model->load(Yii::$app->request->post())) {

            $model->author_id = Yii::$app->user->identity->id;
            $model->parent_id = 0;

            $model->save();

            //return $this->redirect(['view', 'id' => $model->id]);
            $status = true;
        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
            $status = false;
        }

        return $status;
    }
}