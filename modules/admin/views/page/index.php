<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\admin\models\Page;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            //'slug',
            //'content:ntext',
            [
                'label' => 'Status',
                'attribute' => 'status',
                'contentOptions' => ['style' => 'width: 150px'],
                'format' => 'raw',
                'filter' => Page::getStatusNames(),
                'value' => function ($data) {
                    /* @var $data Item */
                    return $data->getStatusName();
                },
            ],
            // 'author_id',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 80px'],
                'template' => '{new_action1} {new_action2}',
                'buttons' => [
                    'new_action1' => function ($url, $model, $key) {
                        return Html::a(
                            'Edytuj',
                            ['page/update', 'id' => $model->id],
                            ['title' => 'Edytuj', 'class' => 'btn btn-primary btn-sm']
                        );
                    },
                    'new_action2' => function ($url, $model, $key) {
                        return Html::a(
                            'Usuń',
                            ['page/delete', 'id' => $model->id],
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
