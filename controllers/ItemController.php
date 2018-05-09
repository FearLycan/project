<?php

namespace app\controllers;

use app\components\AccessControl;
use app\components\Helpers;
use app\models\forms\ItemForm;
use app\models\Item;
use app\models\ItemTag;
use app\models\Review;
use app\models\searches\ItemSearch;
use app\models\searches\ReviewSearch;
use app\models\Shop;
use app\models\Tag;
use app\models\Type;
use app\models\User;
use Yii;
use app\components\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ItemController extends Controller
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
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'view',
                        ],
                        'roles' => ['?'],
                    ],
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

        $similar = $item->getSimilar(2, 6);

        $query = Review::find()
            ->where(['item_id' => $id, 'status' => Review::STATUS_ACTIVE]);

        $searchModel = new ReviewSearch();
        $reviewDataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

        return $this->render('view', [
            'item' => $item,
            'similar' => $similar,
            'reviewDataProvider' => $reviewDataProvider,
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
            $model->status = Item::STATUS_PENDING;

            if ($model->save()) {
                $model->uploadItemImage();
                Tag::saveTags($model->tags, $model->id);
                return $this->redirect(['view', 'slug' => $model->slug]);
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

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = ItemForm::find()
            ->where(['id' => $id, 'author_id' => Yii::$app->user->identity->id])
            ->andWhere(['in', 'status', [Item::STATUS_ACTIVE, Item::STATUS_PENDING, Item::STATUS_ARCHIVES]])
            ->one();

        if(empty($model)){
            $this->notFound();
        }

        $model->scenario = ItemForm::SCENARIO_UPDATE;

        $tags = ItemTag::find()->where(['item_id' => $id])->all();
        $tab = [];
        foreach ($tags as $key => $tag) {
            array_push($tab, $tag->tag->name);
        }
        $model->tags = $tab;

        if ($model->load(Yii::$app->request->post())) {

            if ($model->tags != $tab) {
                ItemTag::deleteConnect($model->id);
                Tag::saveTags($model->tags, $model->id);
            }

            $model->myFile = UploadedFile::getInstance($model, 'myFile');

            if ($model->myFile) {
                //usunięcie starych obrazków
                $model->removeImageFile();


                $randomString = Yii::$app->getSecurity()->generateRandomString(10);
                $model->image = Inflector::slug($model->title) . '_' . $randomString . '.' . $model->myFile->extension;
                $model->slug = Inflector::slug($model->title);


                if ($model->save()) {
                    $model->uploadItemImage();
                    $model->save(false, ['image']);
                } else {
                    $shops = ArrayHelper::map(Shop::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
                    $types = ArrayHelper::map(Type::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');

                    return $this->render('update', [
                        'model' => $model,
                        'shops' => $shops,
                        'types' => $types,
                    ]);
                }
            }

            $model->status = Item::STATUS_PENDING;
            $model->save();

            return $this->redirect(['item/view', 'id' => $model->id, 'slug' => $model->slug]);
        } else {

            $shops = ArrayHelper::map(Shop::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
            $types = ArrayHelper::map(Type::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');

            return $this->render('update', [
                'model' => $model,
                'shops' => $shops,
                'types' => $types,
            ]);
        }
    }

    public function actionCollection()
    {
        $query = Item::find()
            ->where(['author_id' => Yii::$app->user->identity->id])
            ->andWhere(['in', 'status', Item::getStatuses()]);

        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

        return $this->render('collection', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }
}