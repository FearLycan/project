<?php

namespace app\controllers;

use app\components\AccessControl;
//use app\models\Category;
//use app\models\CategorySearch;
//use app\models\File;
//use app\models\FileSearch;
//use app\models\User;
use Yii;
use app\components\Controller;
use yii\filters\VerbFilter;
//use yii\validators\ValidationAsset;
//use yii\web\NotFoundHttpException;
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
                    [
                        'allow' => true,
                        'actions' => [
                            'login'
                        ],
                        'roles' => ['?'],
                    ]
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            Yii::$app->user->identity->last_login_at = date('Y-m-d H:i:s');
            Yii::$app->user->identity->save(false, ['last_login_at']);

            return $this->goHome();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Action logout current user.
     *
     * @return Response
     */
    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
        }

        return $this->goHome();
    }


    public function actionRegistration()
    {
        return $this->render('registration', [
           // 'model' => $model,
        ]);
    }

    public function actionReset()
    {
        return $this->render('reset', [
            // 'model' => $model,
        ]);
    }

}
