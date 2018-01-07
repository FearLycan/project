<?php

use app\modules\admin\models\Item;
use app\modules\admin\models\Shop;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'ID',
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width: 15px;'],
                'format' => 'raw',
                'value' => function ($data) {
                    /* @var $data Item */
                    return $data->id;
                },
            ],
            [
                'attribute' => 'title',
                //'contentOptions' => ['style' => 'width: 150px;'],
                'format' => 'raw',
                'value' => function ($data) {
                    /* @var $data Item */
                    return Html::a($data->title, ['item/view', 'id' => $data->id]);
                },
            ],
//            [
//                'label' => 'URL',
//                'attribute' => 'url',
//                'contentOptions' => ['style' => 'width: 50px; text-align: center;'],
//                'format' => 'raw',
//                'value' => function ($data) {
//                    /* @var $data Item */
//                    return Html::a('<i class="fa fa-link" aria-hidden="true"></i>', $data->url, ['target' => '_blank']);
//                },
//            ],
            [
                'label' => 'Shop',
                'attribute' => 'shop',
                'contentOptions' => ['style' => 'width: 150px;'],
                'format' => 'raw',
                'value' => function ($data) {
                    /* @var $data Item */
                    return Html::a($data->shop->name, ['shop/view', 'id' => $data->shop_id]);
                },
            ],
            [
                'label' => 'Type',
                'attribute' => 'type',
                'contentOptions' => ['style' => 'width: 150px;'],
                'format' => 'raw',
                'value' => function ($data) {
                    /* @var $data Item */
                    return Html::a($data->type->name, ['type/view', 'id' => $data->type_id]);
                },
            ],
            [
                'label' => 'Status',
                'attribute' => 'status',
                'contentOptions' => ['style' => 'width: 150px'],
                'format' => 'raw',
                'filter' => Item::getStatusNames(),
                'value' => function ($data) {
                    /* @var $data Item */
                    return $data->getStatusName();
                },
            ],
            [
                'attribute' => 'author',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->author->name, ['user/view', 'id' => $data->author_id]);
                },
                'contentOptions' => ['style' => 'width: 150px;'],
            ],
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
                            ['item/update', 'id' => $model->id],
                            ['title' => 'Edytuj', 'class' => 'btn btn-primary btn-sm']
                        );
                    },
                    'new_action2' => function ($url, $model, $key) {
                        return Html::a(
                            'Usuń',
                            ['item/delete', 'id' => $model->id],
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
    <?php Pjax::end(); ?>
</div>
