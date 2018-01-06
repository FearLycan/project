<?php

use app\modules\admin\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
        /* @var  User $model */
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            'email:email',
            [
                'attribute' => 'role',
                'value' => $model->getRoleName(),
            ],
            [
                'attribute' => 'status',
                'value' => $model->getStatusName(),
            ],
            'registered_at',
            'last_login_at',
            'last_seen',
        ],
    ]) ?>

</div>
