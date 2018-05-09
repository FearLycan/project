<?php

use app\models\Review;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var Review $model */

?>

    <div class="row">

        <div class="col-4">
            <?= StarRating::widget([
                'name' => 'rating_' . $model->id,
                'value' => $model->rating,
                'disabled' => true,
                'pluginOptions' => [
                    'size' => 'xs',
                    'language' => 'en',
                    'min' => 0,
                    'max' => 5,
                    'step' => 0.5,
                    'starCaptions' => [
                        0 => '',
                        1 => '',
                        2 => '',
                        3 => '',
                        4 => '',
                        5 => '',
                    ],
                    'starCaptionClasses' => [
                        0 => 'text-danger',
                        1 => 'text-danger',
                        2 => 'text-warning',
                        3 => 'text-info',
                        4 => 'text-primary',
                        5 => 'text-success',
                    ],
                    'filledStar' => '<i class="ion-android-star" aria-hidden="true"></i>',
                    'emptyStar' => '<i class="ion-android-star-outline" aria-hidden="true"></i>',
                    'defaultCaption' => '',
                ]
            ]); ?>
        </div>

        <?php if ($model->confirmed_by_purchase): ?>
            <div class="col-8">
                <div class="alert alert-success" role="alert" style="margin-top: 5px;">
                    <i class="ion-checkmark-circled" aria-hidden="true"></i>
                    Opinia potwierdzona zakupem
                </div>
            </div>
        <?php endif; ?>

    </div>

    <div class="row">

        <div class="col-2">
            <a href="<?= \yii\helpers\Url::to(['item/view', 'id' => $model->item->id, 'slug' => $model->item->slug]) ?>">
                <?= Html::img('@web/images/item/thumbnail/' . $model->item->image, ['class' => 'img-fluid']) ?>
            </a>
        </div>

        <div class="col-10">

            <div class="row">
                <div class="col-7">
                    <strong><?= Html::a($model->item->title, ['item/view', 'id' => $model->item->id, 'slug' => $model->item->slug]) ?></strong>
                </div>

                <div class="col-5 text-right">
                    <ul class="inline-links inline-links--style-2 mt-1">
                        <li data-title="<?= $model->created_at ?>">
                            <?= date("d-m-Y", strtotime($model->created_at)) ?>
                        </li>
                    </ul>
                </div>
            </div>

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
        </div>
    </div>

<?php $this->registerCss("ul.pagination {margin-left: 15px;}"); ?>