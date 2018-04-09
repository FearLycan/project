<?php
/**
 * Created by PhpStorm.
 * User: Damian Brończyk
 * Date: 09.04.2018
 * Time: 14:27
 */

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


        <div class="col-3">
            <a href="<?= Url::toRoute(['item/view', 'id' => $model->id, 'slug' => $model->slug]); ?>">
                <?= Html::encode($model->title) ?>
            </a>
        </div>

        <div class="col-3">
            <p class="collection-stats">
                Status:
            </p>
            <p>
                Komentarze:
            </p>
        </div>



        <div class="col-12">
            <hr>
        </div>
    </div>
</div>