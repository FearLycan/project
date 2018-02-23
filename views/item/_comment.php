<?php

use app\components\Helpers;
use yii\helpers\Html;

/* @var \app\models\Comment $model */

?>

<div class="block block-comment">
    <div class="block-image">
        <?= Html::img('@web/images/avatar/noavatar.jpg', ['class' => 'img-circle']) ?>
    </div>
    <div class="block-body opset">
        <div class="block-body-inner">
            <h3 class="heading heading-6">
                <a href="#">
                    <?= Html::encode($model->author->name) ?>
                </a>
            </h3>
            <span class="comment-date"> <?= Helpers::timeago($model->created_at) ?> </span>
            <p class="comment-text">
                <?= Html::encode($model->content) ?>
            </p>
            <div class="comment-options">
                <a href="#">Like</a>
                <a href="#">Reply</a>
                <a href="#">Report</a>
            </div>
        </div>
    </div>
</div>
