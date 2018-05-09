<?php

use app\components\Helpers;
use app\models\Review;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


/* @var Review $model */

?>

<div class="row">

    <div class="col-5">
        <?= StarRating::widget([
            'name' => 'rating_' . $model->id,
            'value' => $model->rating,
            'disabled' => true,
            'pluginOptions' => Helpers::ratingOptions(),
        ]); ?>
    </div>

    <?php if ($model->confirmed_by_purchase): ?>
        <div class="col-7">
            <div class="alert alert-success" role="alert" style="margin-top: 10px;">
                <i class="ion-checkmark-circled" aria-hidden="true"></i>
                Opinia potwierdzona zakupem
            </div>
        </div>
    <?php endif; ?>

</div>

<div class="row">
    <div class="col-2">
        <a href="<?= Url::to(['user/view' , 'slug' => $model->author->slug]) ?>">
            <?= Html::img('@web/images/avatar/' . $model->author->avatar, ['class' => 'img-thumbnail']) ?>
        </a>

        <p class="text-center">
            <strong><?= Html::a($model->author->name,['user/view' , 'slug' => $model->author->slug]) ?></strong>
        </p>
    </div>

    <div class="col-10">

        <ul class="inline-links inline-links--style-2 mt-1">
            <li>
                <?= date("d-m-Y", strtotime($model->created_at)) ?>
            </li>
        </ul>

        <?= HtmlPurifier::process($model->content); ?>

        <hr>

        <?php if (!empty(json_decode($model->images))): ?>
            <div class="row">
                <?php foreach (json_decode($model->images) as $key => $image): ?>
                    <div class="col-md-4">
                        <a href="<?= \yii\helpers\Url::to('@web/images/review/' . $image) ?>"
                           data-fancybox="group" data-caption="<?= $model->author->name . ' #' . ($key + 1) ?>">
                            <?= Html::img('@web/images/review/thumbnail/' . $image, ['class' => 'img-fluid rounded']) ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


    </div>

    <div class="col-12">
        <hr>
        <!--<span class="space-xs-md"></span>-->
    </div>
</div>