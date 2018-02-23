<?php

namespace app\controllers;


use app\components\AccessControl;
use app\components\Controller;
use app\models\forms\CommentForm;
use app\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Response;

class CommentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'statuses' => [
                            User::STATUS_ACTIVE,
                        ],
                    ],
                ],
            ],
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
        $response['success'] = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->author_id = Yii::$app->user->identity->id;
            $model->parent_id = 0;

            if ($model->save()) {
                $response['success'] = true;
            }

        } else {
            $response['success'] = false;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $response;
    }
}