<?php

use app\modules\admin\models\Type;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name, ['type/view', 'id' => $data->id]);
                },
                'contentOptions' => ['style' => 'width: 200px;'],
            ],
            [
                'attribute' => 'author',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->author->name, ['user/view', 'id' => $data->author_id]);
                },
                'contentOptions' => ['style' => 'width: 150px;'],
            ],
            [
                'label' => 'Status',
                'attribute' => 'status',
                'contentOptions' => ['style' => 'width: 150px'],
                'format' => 'raw',
                'filter' => Type::getStatusNames(),
                //'filter' => [1 => 'a', 2 => 'b'],
                'value' => function ($data) {
                    /* @var $data Type */
                    return $data->getStatusName();
                },
            ],
            'created_at',
            'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 80px'],
                'template' => '{new_action1} {new_action2}',
                'buttons' => [
                    'new_action1' => function ($url, $model, $key) {
                        return Html::a(
                            'Edytuj',
                            ['type/update', 'id' => $model->id],
                            ['title' => 'Edytuj', 'class' => 'btn btn-primary btn-sm']
                        );
                    },
                    'new_action2' => function ($url, $model, $key) {
                        return Html::a(
                            'Usuń',
                            ['type/delete', 'id' => $model->id],
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
    ]); ?>
    <?php Pjax::end(); ?></div>
