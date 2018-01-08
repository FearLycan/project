<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\forms\ItemForm;
use app\modules\admin\models\Image;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Tag;
use app\modules\admin\models\Type;
use Yii;
use app\modules\admin\models\Item;
use app\modules\admin\models\searches\ItemSearch;
use app\modules\admin\components\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

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
            'model' => $this->findModel($id),
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

        $shops = ArrayHelper::map(Shop::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
        $types = ArrayHelper::map(Type::find()->select(['id', 'name'])->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');

//        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            return ActiveForm::validate($model);
//        }

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'image');
            //die(var_dump($image));

//            if(!empty($image)){
//                $randomString = Yii::$app->getSecurity()->generateRandomString(10);
//                $name = Inflector::slug($model->title) . '_' . $randomString . '.' . $image->extension;
//
//                $url = Image::URL . $name;
//
//                $image->saveAs($url);
//            }

            //---------------------------
            $randomString = Yii::$app->getSecurity()->generateRandomString(10);
            $name = Inflector::slug($model->title) . '_' . $randomString . '.' . $image->extension;

            $url = Image::URL . $name;
            $urlThumb = Image::URL_THUMBNAIL . $name;

            //$urlThumb = Image::URL_THUMBNAIL . $name;

            //$this->image->saveAs($url);
            //$this->image->saveAs($urlThumb);

            $model->image = $name;
            $model->author_id = Yii::$app->user->identity->id;
            //---------------------------
               // die(var_dump($model));
            if ($model->save()) {
                $image->saveAs($url);

                Tag::saveTags($model->tags, $model->id);

                Image::createThumbnail($url, $urlThumb, Image::THUMBNAIL_MAX_WIDTH, Image::THUMBNAIL_MAX_HEIGHT);
                Image::changeSize($url, Image::IMAGE_MAX_WIDTH, Image::IMAGE_MAX_HEIGHT);

                return $this->redirect(['view', 'id' => $model->id]);
            }


//            if ($model->image && $model->upload()) {
//                die(var_dump($model->tags));
//                $model->author_id = Yii::$app->user->identity->id;
//                $model->save();
//            }
            return $this->render('create', [
                'model' => $model,
                'shops' => $shops,
                'types' => $types,
            ]);

        } else {

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
        $model->scenario = ItemForm::SCENARIO_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
