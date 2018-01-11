<?php

namespace app\modules\admin\controllers;

use app\components\Helpers;
use app\components\Inflector;
use app\modules\admin\models\forms\ItemForm;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Tag;
use app\modules\admin\models\Type;
use Yii;
use app\modules\admin\models\Item;
use app\modules\admin\models\searches\ItemSearch;
use app\modules\admin\components\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ItemController implements the CRUD actions for Item model.
 */
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Item::findOne($id)
        ]);
    }

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
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

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Tag::saveTags($model->tags, $model->id);

            return $this->redirect(['view', 'id' => $model->id]);
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

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
