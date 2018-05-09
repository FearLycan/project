<?php

use app\components\Helpers;
use app\models\Image;
use app\models\User;
use yii\helpers\Html;

?>

<div class="sidebar sidebar--style-2 no-border stickyfill">
    <div class="widget">
        <!-- Profile picture -->
        <div class="profile-picture profile-picture--style-2">
            <?= Html::img('@web/'. Image::URL_AVATAR . $model->avatar, ['class' => 'img-center']) ?>
        </div>

        <!-- Profile details -->
        <div class="profile-details">
            <h2 class="heading heading-4 strong-500 profile-name">
                <?= Html::encode($model->name) ?>
            </h2>
        </div>

        <!-- Profile connect -->
        <div class="profile-connect mt-4">
        </div>

        <!-- Profile stats -->
        <div class="profile-stats clearfix">
        </div>

        <!-- Profile connected accounts -->
        <div class="profile-useful-links clearfix">
            <div class="useful-links">

                <?php if(!empty($model->socialLinks)): ?>
                    <?php foreach ($model->socialLinks as $name => $link): ?>
                        <?php if ($name == User::SOCIAL_FACEBOOK): ?>
                            <a href="<?= Html::encode($link) ?>" class="link link--style-1" target="_blank">
                                <i class="ion-social-facebook-outline"></i>
                                <?= Html::encode(Helpers::cutSocialLink($link)) ?>
                            </a>
                        <?php elseif ($name == User::SOCIAL_INSTAGRAM): ?>
                            <a href="<?= Html::encode($link) ?>" class="link link--style-1" target="_blank">
                                <i class="icon ion-social-instagram-outline"></i>
                                <?= Html::encode(Helpers::cutSocialLink($link)) ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>

        <?php if (!empty($model->about)): ?>
            <div class="profile-useful-links clearfix">
                <div class="useful-links">
                    <p>
                        <?= Html::encode($model->about) ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>
