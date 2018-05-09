<?php

namespace app\controllers;

use app\components\AccessControl;
use app\components\Inflector;
use app\models\forms\SettingsForm;
use app\models\Item;
use app\models\Review;
use app\models\searches\ItemSearch;
use app\models\searches\ReviewSearch;
use kartik\growl\Growl;
use Yii;
use app\models\User;
use app\components\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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
                    [
                        'allow' => true,
                        'actions' => [
                            'view',
                            'review',
                        ],
                        'roles' => ['?'],
                    ],
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

        $query = Item::find()->where(['item.status' => Item::getActiveStatuses(), 'item.author_id' => $model->id]);

        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
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

        foreach (User::getSocialMediaTypes() as $type) {
            $model->{$type} = $model->socialLinks[$type];
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->myFile = UploadedFile::getInstance($model, 'myFile');

            if ($model->myFile) {
                $name = Inflector::slug($model->name) . '.' . $model->myFile->extension;

                if($model->avatar != 'blank.gif'){
                    $model->removeAvatarFile();
                }

                $model->setSocialLinks($model->getLinksSettings());
                $model->avatar = $name;
                if ($model->save()) {
                    $model->upload();
                }
            }

            $model->setSocialLinks($model->getLinksSettings());
            $model->save();

            Yii::$app->getSession()
                ->addFlash(Growl::TYPE_SUCCESS, ['Świetnie!', ' Twoja dane zostały zaktualizowane.']);

            return $this->redirect(['user/settings']);
        }

        return $this->render('settings', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionReview($slug)
    {
        $model = User::find()
            ->where(['slug' => $slug])
            ->one();

        if (($model === null)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $query = Review::find()
            ->joinWith(['author'])
            ->where(['user.slug' => $slug])
            ->andWhere(['review.status' => Review::STATUS_ACTIVE]);

        $searchModel = new ReviewSearch();
        $reviewDataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

        return $this->render('review', [
            'reviewDataProvider' => $reviewDataProvider,
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
