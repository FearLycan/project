<?php
/**
 * Created by PhpStorm.
 * User: Damian Brończyk
 * Date: 09.04.2018
 * Time: 14:27
 */

use app\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model \app\models\Item */

?>

<div class="container">
    <div class="row">
        <div class="col-1">
            <a href="<?= Url::toRoute(['item/view', 'id' => $model->id, 'slug' => $model->slug]); ?>">
                <?= Html::img('@web/images/item/thumbnail/' . $model->image, ['alt' => $model->title, 'class' => 'img-fluid']) ?>
            </a>
        </div>


        <div class="col-5">
            <a href="<?= Url::toRoute(['item/view', 'id' => $model->id, 'slug' => $model->slug]); ?>">
                <?= Html::encode($model->title) ?>
            </a>

            <div class="row">
               <div class="col-12">
                   <?php if($model->status == Item::STATUS_ACTIVE): ?>
                       <span class="badge badge-success badge-lg" style=""><?= $model->getStatusName() ?></span>
                   <?php elseif ($model->status == Item::STATUS_PENDING): ?>
                       <span class="badge badge-info badge-lg" style=""><?= $model->getStatusName() ?></span>
                   <?php elseif ($model->status == Item::STATUS_INACTIVE): ?>
                       <span class="badge badge-danger badge-lg" style=""><?= $model->getStatusName() ?></span>
                   <?php elseif ($model->status == Item::STATUS_ARCHIVES): ?>
                       <span class="badge badge-warning badge-lg" style=""><?= $model->getStatusName() ?></span>
                   <?php endif; ?>
               </div>
            </div>
        </div>

        <div class="col-3"></div>

        <div class="col-3 text-lg-right">
            <a href="<?= Url::to(['item/update', 'id' => $model->id]) ?>" class="btn btn-primary">Edytuj</a>
        </div>



        <div class="col-12">
            <hr>
        </div>
    </div>
</div>