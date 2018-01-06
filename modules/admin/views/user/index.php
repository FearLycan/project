<?php

use app\modules\admin\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    /* @var $data USer */
                    return Html::a($data->name, ['user/view', 'id' => $data->id]);
                },
            ],
            'email:email',
            [
                'label' => 'Status',
                'attribute' => 'status',
                'contentOptions' => ['style' => 'width: 150px'],
                'format' => 'raw',
                'filter' => User::getRolesNames(),
                'value' => function ($data) {
                    /* @var $data USer */
                    return $data->getRoleName();
                },
            ],
            [
                'label' => 'Status',
                'attribute' => 'status',
                'contentOptions' => ['style' => 'width: 150px'],
                'format' => 'raw',
                'filter' => User::getStatusNames(),
                'value' => function ($data) {
                    /* @var $data User */
                    return $data->getStatusName();
                },
            ],
            [
                //'label' => 'Status',
                'attribute' => 'registered_at',
                'contentOptions' => ['style' => 'width: 150px'],
                'format' => 'raw',
                'filter' => DatePicker::widget(['language' => 'ru', 'dateFormat' => 'dd-MM-yyyy']),
                //'filter' => User::getStatusNames(),
                'value' => function ($data) {
                    /* @var $data User */
                    return $data->registered_at;
                },
            ],
            //'filter' => \yii\jui\DatePicker::widget(['language' => 'ru', 'dateFormat' => 'dd-MM-yyyy']),
           // 'registered_at',
            // 'last_login_at',
           // 'last_seen',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 80px'],
                'template' => '{new_action1} {new_action2}',
                'buttons' => [
                    'new_action1' => function ($url, $model, $key) {
                        return Html::a(
                            'Edytuj',
                            ['user/update', 'id' => $model->id],
                            ['title' => 'Edytuj', 'class' => 'btn btn-primary btn-sm']
                        );
                    },
                    'new_action2' => function ($url, $model, $key) {
                        return Html::a(
                            'Usuń',
                            ['user/delete', 'id' => $model->id],
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
