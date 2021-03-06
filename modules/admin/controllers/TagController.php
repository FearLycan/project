<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\forms\TagForm;
use Yii;
use app\modules\admin\models\Tag;
use app\modules\admin\models\searches\TagSearch;
use app\modules\admin\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends Controller
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
     * Lists all Tag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tag model.
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
     * Creates a new Tag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TagForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->author_id = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tag model.
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
     * Finds the Tag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TagForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Get options for Select2 widget in offer form.
     *
     * @param string $phrase
     * @param int $page
     * @return array
     */
    public function actionList($phrase, $page = 1)
    {
        $limit = 20;
//        $games = Tag::find()
//            ->onlyWithTitle($phrase)
//            ->orderBy(['rating' => SORT_DESC])
//            ->limit($limit)
//            ->offset(($page - 1) * $limit)
//            ->all();

        $tags = Tag::find()->select(['id', 'name'])
            ->where(['status' => Tag::STATUS_ACTIVE])
            ->andWhere(['like', 'name', $phrase])
            ->limit($limit)
            ->offset(($page - 1) * $limit)
            ->all();

        $results = [];
        /* @var $tag Tag */
        foreach ($tags as $tag) {
//            $stats = Offer::find()
//                ->select([
//                    'count' => new Expression('COUNT(*)'),
//                    'min' => new Expression('MIN(price)'),
//                ])
//                ->where([
//                    'game_id' => $game->id,
//                    'status' => Offer::getActiveStatuses(),
//                ])
//                ->asArray()
//                ->one();
            $results[] = [
                'id' => $tag->name,
                'name' => $tag->name,
//                'image' => $game->getImage(Game::IMAGE_SIZE_SMALL),
//                'count' => $stats['count'],
//                'min' => $stats['min'],
            ];
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'results' => $results,
            'pagination' => [
                'page' => $page,
                'more' => count($results) === $limit,
            ],
        ];
    }
}
