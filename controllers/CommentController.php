<?php

namespace app\controllers;


use app\components\AccessControl;
use app\components\Controller;
use app\models\Comment;
use app\models\forms\CommentForm;
use app\models\forms\ReplyForm;
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
                    'reply' => ['POST'],
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
        $response = [];

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->author_id = Yii::$app->user->identity->id;
            $model->parent_id = Comment::NO_PARENT;

            if ($model->save()) {
                $response['success'] = true;
                $response['id'] = $model->id;
            }

        } else {
            $response['success'] = false;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $response;
    }

    /**
     * Creates a reply Comment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionReply()
    {
        $model = new ReplyForm();
        $response = [];

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->author_id = Yii::$app->user->identity->id;
            $parent = Comment::find()
                ->where(['id' => $model->parent_id])
                ->one();

            if ($parent->level == Comment::LEVEL_ONE) {
                $model->level = Comment::LEVEL_TWO;
            } else {
                $model->level = Comment::LEVEL_THREE;
            }

            if ($model->save()) {
                $response['success'] = true;
                $response['id'] = $model->id;
            }

        } else {
            $response['success'] = false;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $response;
    }
}