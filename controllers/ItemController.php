<?php

namespace app\controllers;

use app\components\Helpers;
use app\models\forms\CommentForm;
use app\models\forms\ItemForm;
use app\models\forms\ReplyForm;
use app\models\Item;
use app\models\searches\CommentSearch;
use app\models\searches\ItemSearch;
use app\models\Shop;
use app\models\Tag;
use app\models\Type;
use Yii;
use app\components\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ItemController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id, $slug)
    {
        /* @var \app\models\Item $item */
        $item = Item::find()->where(['id' => $id, 'slug' => $slug])->one();

        if (empty($item)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $comment = new CommentForm();
        $comment->item_id = $id;

        $reply = new ReplyForm();
        $reply->item_id = $id;

        $similar = $item->getSimilar(2, 6);

        $searchModel = new CommentSearch();
        $commentDataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('view', [
            'item' => $item,
            'similar' => $similar,
            'comment' => $comment,
            'reply' => $reply,
            'commentDataProvider' => $commentDataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new ItemForm();

        $model->scenario = ItemForm::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post())) {

            $model->myFile = UploadedFile::getInstance($model, 'myFile');
            $randomString = Yii::$app->getSecurity()->generateRandomString(10);
            $model->image = Inflector::slug($model->title) . '_' . $randomString . '.' . $model->myFile->extension;
            $model->author_id = Yii::$app->user->identity->id;
            $model->title = Helpers::nameize($model->title);
            $model->slug = Inflector::slug($model->title);

            if ($model->save()) {
                $model->uploadItemImage();
                Tag::saveTags($model->tags, $model->id);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $shops = ArrayHelper::map(Shop::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
                $types = ArrayHelper::map(Type::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');

                return $this->render('create', [
                    'model' => $model,
                    'shops' => $shops,
                    'types' => $types,
                ]);
            }
        } else {
            $shops = ArrayHelper::map(Shop::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
            $types = ArrayHelper::map(Type::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');

            return $this->render('create', [
                'model' => $model,
                'shops' => $shops,
                'types' => $types,
            ]);
        }
    }
}