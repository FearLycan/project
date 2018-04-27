<?php

use app\components\Helpers;
use app\models\Review;
use kartik\rating\StarRating;
use yii\helpers\HtmlPurifier;


/* @var Review $model */

?>

<div class="row">
    <div class="col-12">
        <?= StarRating::widget([
            'name' => 'rating_' . $model->id,
            'value' => $model->rating,
            'disabled' => true,
            'pluginOptions' => Helpers::ratingOptions(),
        ]); ?>
    </div>

    <div class="col-2">
        user image
    </div>

    <div class="col-10">
        <?= HtmlPurifier::process($model->content); ?>
    </div>

    <div class="col-12">
       <hr>
        <span class="space-xs-md"></span>
    </div>
</div>