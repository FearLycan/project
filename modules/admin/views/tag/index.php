<?php

use app\components\LinkPager;
use app\modules\admin\models\Tag;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tag', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name, ['tag/view', 'id' => $data->id]);
                },
                'contentOptions' => ['style' => 'width: 200px;'],
            ],
            'frequency',
            [
                'attribute' => 'author',
                'format' => 'raw',
                'value' => function ($data) {
                    /* @var Tag $data */
                    return Html::a($data->author->name, ['user/view', 'id' => $data->author_id]);
                },
                'contentOptions' => ['style' => 'width: 200px;'],
            ],
            [
                'label' => 'Status',
                'attribute' => 'status',
                'contentOptions' => ['style' => 'width: 150px'],
                'format' => 'raw',
                'filter' => Tag::getStatusNames(),
                'value' => function ($data) {
                    /* @var $data Tag */
                    return $data->getStatusName();
                },
            ],
            [
                'attribute' => 'created_at',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'language' => 'pl',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control']
                ]),
                'format' => 'html',

            ],
            //'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 80px'],
                'template' => '{new_action1} {new_action2}',
                'buttons' => [
                    'new_action1' => function ($url, $model, $key) {
                        return Html::a(
                            'Edytuj',
                            ['tag/update', 'id' => $model->id],
                            ['title' => 'Edytuj', 'class' => 'btn btn-primary btn-sm']
                        );
                    },
                    'new_action2' => function ($url, $model, $key) {
                        return Html::a(
                            'Usuń',
                            ['tag/delete', 'id' => $model->id],
                            [
                                'title' => 'Usuń', 'class' => 'btn btn-danger btn-sm',
                                'data-confirm' => 'Are you sure to delete this item?',
                                'data-method' => 'post'
                            ]
                        );
                    },
                ],
            ],
        ],
        'pager' =>[
                'class' => LinkPager::class
        ]
    ]); ?>
    <?php Pjax::end(); ?></div>
