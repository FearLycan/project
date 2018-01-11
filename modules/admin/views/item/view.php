<?php

use app\modules\admin\models\Image;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Item */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'slug',
            'url:url',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => Html::img('@web/' . Image::URL_THUMBNAIL . $model->image, ['style' => 'height: 150px;']),
            ],
            'gender',
            [
                'attribute' => 'shop',
                'format' => 'raw',
                'value' => Html::a($model->shop->name, ['shop/view', 'id' => $model->shop_id]),
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => Html::a($model->type->name, ['type/view', 'id' => $model->type_id]),
            ],
            [
                'attribute' => 'status',
                'value' => $model->getStatusName(),
            ],
            [
                'attribute' => 'author',
                'format' => 'raw',
                'value' => Html::a($model->author->name, ['user/view', 'id' => $model->author_id]),
            ],
            [
                'attribute' => 'tags',
                'format' => 'raw',
                'value' => function ($model) {
                    $text = '<ul class="list-inline" style="margin: 0;">';
                    foreach ($model->tags as $tag){
                        $text .= '<li class="list-inline-item">'.$tag->name.'</li>';
                    }
                    $text .= '</ul>';

                    return $text;
                },
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
