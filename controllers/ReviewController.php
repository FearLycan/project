<?php

namespace app\controllers;

use app\components\AccessControl;
use app\components\Controller;
use app\models\forms\ReviewForm;
use app\models\Item;
use app\models\Review;
use app\models\User;
use kartik\growl\Growl;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ReviewController extends Controller
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
                    'bump' => ['POST'],
                ],
            ],
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
        ];
    }


    /**
     * @param $id
     * @param $slug
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate($id, $slug)
    {
        /* @var \app\models\Item $item */
        $item = Item::find()->where(['id' => $id, 'slug' => $slug])->one();

        if (empty($item)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new ReviewForm();
        $model->item_id = $id;
        $model->author_id = Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post())) {
            $model->myFiles = UploadedFile::getInstances($model, 'myFiles');
            $model->status = Review::STATUS_PENDING;

            $model->save();

            if ($model->upload()) {
                Yii::$app->getSession()
                    ->addFlash(Growl::TYPE_SUCCESS, ['Świetnie!',' Twoja recenzja została zapisana i <strong>oczekuje na akceptację</strong>']);

                $model->images = json_encode($model->names);
                $model->save(false, ['images']);

                return $this->redirect(['item/view', 'id' => $id, 'slug' => $slug]);
            } else {
                Yii::$app->getSession()
                    ->addFlash(Growl::TYPE_WARNING, ['Uwaga!',' Wystapił błąd podczas zapisywania recenzji']);
            }
        }

        return $this->render('create', [
            'item' => $item,
            'model' => $model,
        ]);
    }
}
