<?php

use app\modules\admin\models\Review;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width: 50px;'],],

            [
                'attribute' => 'author',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->author->name, ['user/view', 'id' => $data->author_id]);
                },
               // 'contentOptions' => ['style' => 'width: 150px;'],
            ],
            [
                'label' => 'Status',
                'attribute' => 'status',
                'contentOptions' => ['style' => 'width: 150px'],
                'format' => 'raw',
                'filter' => Review::getStatusNames(),
                'value' => function ($data) {
                    /* @var $data Item */
                    return $data->getStatusName();
                },
            ],
            [
                'label' => 'Ocena',
                'attribute' => 'rating',
                'contentOptions' => ['style' => 'width: 90px'],
            ],
            //'rating',
            //'images:ntext',
            // 'confirmed_by_purchase',
            // 'author_id',
            [
                'attribute' => 'created_at',
                'contentOptions' => ['style' => 'width: 80px'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 80px'],
                'template' => '{new_action1} {new_action2} ',
                'buttons' => [
                    'new_action1' => function ($url, $model, $key) {
                        return Html::a(
                            'Zobacz',
                            ['view', 'id' => $model->id],
                            ['title' => 'Zobacz', 'class' => 'btn btn-success btn-sm']
                        );
                    },
                    'new_action2' => function ($url, $model, $key) {
                        return Html::a(
                            'Edytuj',
                            ['update', 'id' => $model->id],
                            ['title' => 'Edytuj', 'class' => 'btn btn-primary btn-sm']
                        );
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
