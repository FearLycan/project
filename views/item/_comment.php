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
        <div class="block-body-inner" id="<?= Html::encode($model->id) ?>">
            <h3 class="heading heading-6">
                <?= Html::a(Html::encode($model->author->name), ['user/view', 'slug' => $model->author->slug]) ?>
            </h3>
            <span class="comment-date"> <?= Helpers::timeago($model->created_at) ?> </span>
            <p class="comment-text">
                <?= Html::encode($model->content) ?>
            </p>
            <div class="comment-options">
                <a href="javascript:void(0);" class="like">Like</a>
                <a href="javascript:void(0);" class="reply">Reply</a>
                <a href="javascript:void(0);" class="report">Report</a>
            </div>
        </div>
    </div>
</div>

<?php if ($model->replies): ?>
    <?php foreach ($model->replies as $reply): ?>
        <div class="block block-comment block-comment-reply">
            <div class="block-image">
                <img class="img-circle hoverZoomLink" src="/project/web/images/avatar/noavatar.jpg" alt=""></div>
            <div class="block-body opset">
                <div class="block-body-inner" id="<?= Html::encode($reply->id) ?>">
                    <h3 class="heading heading-6">
                        <?= Html::a(Html::encode($reply->author->name), ['user/view', 'id' => $reply->author->slug]) ?>
                    </h3>
                    <span class="comment-date"> <?= Helpers::timeago($reply->created_at) ?> </span>
                    <p class="comment-text">
                        <?= $reply->getCommentContent() ?>
                    </p>
                    <div class="comment-options">
                        <a href="javascript:void(0);" class="like">Like</a>
                        <a href="javascript:void(0);" class="reply">Reply</a>
                        <a href="javascript:void(0);" class="report">Report</a>
                    </div>
                </div>
            </div>
        </div>


        <?php if ($reply->replies): ?>
            <?php foreach ($reply->replies as $rep): ?>
                <div class="block block-comment block-comment-reply-two">
                    <div class="block-image">
                        <img class="img-circle hoverZoomLink" src="/project/web/images/avatar/noavatar.jpg" alt="">
                    </div>
                    <div class="block-body opset">
                        <div class="block-body-inner" id="<?= Html::encode($reply->id) ?>">
                            <h3 class="heading heading-6">
                                <?= Html::a(Html::encode($rep->author->name), ['user/view', 'id' => $rep->author->id]) ?>
                            </h3>
                            <span class="comment-date"> <?= Helpers::timeago($rep->created_at) ?> </span>
                            <p class="comment-text">
                                <?= $rep->getCommentContent() ?>
                            </p>
                            <div class="comment-options">
                                <a href="javascript:void(0);" class="like">Like</a>
                                <a href="javascript:void(0);" class="reply">Reply</a>
                                <a href="javascript:void(0);" class="report">Report</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


    <?php endforeach; ?>
<?php endif; ?>
