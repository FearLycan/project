<?php

namespace app\controllers;

use app\models\forms\SettingsForm;
use Yii;
use app\models\User;
use app\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($slug)
    {
        $model = User::find()
            ->where(['slug' => $slug])
            ->one();

        if (($model === null)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionSettings()
    {
        $model = SettingsForm::find()
            ->where(['id' => Yii::$app->user->identity->id])
            ->one();

        if (($model === null)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        foreach (User::getSocialMediaTypes() as $type){
            $model->{$type} = $model->socialLinks[$type];
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->setSocialLinks($model->getLinksSettings());
            $model->save();
            return $this->redirect(['user/settings']);
        }

        return $this->render('settings', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
