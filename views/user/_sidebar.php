<?php

use app\components\Helpers;
use app\models\User;
use yii\helpers\Html;

?>

<div class="sidebar sidebar--style-2 no-border stickyfill">
    <div class="widget">
        <!-- Profile picture -->
        <div class="profile-picture profile-picture--style-2">
            <img src="/project/web/images/avatar/noavatar.jpg" class="img-center">
            <a href="#" class="btn-aux">
                <i class="ion ion-edit"></i>
            </a>
        </div>

        <!-- Profile details -->
        <div class="profile-details">
            <h2 class="heading heading-4 strong-500 profile-name">
                <?= Html::encode($model->name) ?>
            </h2>

            <?php if (!empty($model->real_name) || !empty($model->real_last_name)): ?>
                <h3 class="heading heading-5 strong-500 profile-name">

                    <?php if (!empty($model->real_name)): ?>
                        <?= Html::encode($model->real_name) ?>
                    <?php endif; ?>

                    <?php if (!empty($model->real_last_name)): ?>
                        <?= Html::encode($model->real_last_name) ?>
                    <?php endif; ?>

                </h3>
            <?php endif; ?>

            <?php if (!empty($model->city) || !empty($model->country)): ?>
                <h4 class="heading heading-light heading-6 strong-400 profile-location">

                    <?php if (!empty($model->city) && !empty($model->country)): ?>
                        <?= Html::encode($model->city) ?>,
                    <?php elseif (!empty($model->city)): ?>
                        <?= Html::encode($model->city) ?>
                    <?php endif; ?>

                    <?php if (!empty($model->country)): ?>
                        <?= Html::encode($model->country) ?>
                    <?php endif; ?>

                </h4>
            <?php endif; ?>
        </div>

        <!-- Profile connect -->
        <div class="profile-connect mt-4">

            <?php if (Yii::$app->user->id != $model->id): ?>
                <a href="#"
                   class="btn btn-styled btn-block btn-rounded btn-base-1">Obserwuj</a>
                <a href="#" class="btn btn-styled btn-block btn-rounded btn-base-2">Wyślij
                    wiadomość</a>
            <?php endif; ?>

        </div>

        <!-- Profile stats -->
        <div class="profile-stats clearfix">
            <div class="stats-entry">
                <span class="stats-count">180</span>
                <span class="stats-label text-uppercase">Kolekcja</span>
            </div>
            <div class="stats-entry">
                <span class="stats-count">1.3K</span>
                <span class="stats-label text-uppercase">Obserwujących</span>
            </div>
        </div>

        <!-- Profile connected accounts -->
        <div class="profile-useful-links clearfix">
            <div class="useful-links">

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
