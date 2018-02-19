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
use app\models\Tag;
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

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionJson($phrase)
    {
        $tags = Tag::find()
            ->where(['like', 'name', $phrase])
            ->orderBy(['frequency' => SORT_DESC])
            ->limit(10)
            ->all();

        $results = [];
        /* @var $game Tag */
        foreach ($tags as $tag) {
            $results[] = [
                'id' => $tag->id,
                'name' => $tag->name,
                // 'slug' => $tag->slug,
                'frequency' => $tag->frequency,
            ];
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $results;
    }
}
