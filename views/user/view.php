<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Html::encode($model->name . ' | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta') ?>
    <meta property="og:url" content="<?= Url::to(['user/view', 'slug' => $model->slug], true) ?>"/>
    <meta property="og:title" content="<?= $this->title ?>"/>
    <meta property="og:description"
          content="<?= Html::encode($model->name) ?> | użytkownik portalu <?= Yii::$app->params['name'] ?>"/>
    <meta property="og:image" content="<?= Url::to('@web/images/avatar/noavatar.jpg', true); ?>"/>
<?php $this->endBlock() ?>

    <div class="user-view">
        <section class="slice-sm sct-color-1">
            <div class="profile">
                <div class="container">
                    <div class="row cols-xs-space cols-sm-space cols-md-space">
                        <div class="col-lg-4">
                            <?= $this->render('_sidebar', [
                                'model' => $model,
                            ]) ?>
                        </div>

                        <div class="col-lg-8">
                            <div class="main-content">
                                <!-- Page title -->
                                <div class="page-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-12">
                                            <h2 class="heading heading-6 strong-600 mb-0 text-capitalize strong-500 mb-0">
                                                <?= Html::encode($model->name) ?>
                                            </h2>
                                        </div>
                                        <div class="col-lg-6 col-12">

                                        </div>
                                    </div>
                                </div>

                                <?= $this->render('_menu', [
                                    'model' => $model,
                                ]) ?>

                                <!-- Order history table -->
                                <div class="widget mt-4">
                                    <div class="row-wrapper">
                                        <div class="row cols-md-space cols-sm-space cols-xs-space">
                                            <div class="col-lg-4">
                                                <div class="block block--style-3">
                                                    <div class="profile-picture profile-picture--style-2">
                                                        <img src="/project/web/images/avatar/noavatar.jpg">
                                                    </div>

                                                    <div class="block-body text-center">
                                                        <h3 class="heading heading-6 strong-600 mb-0 mb-0">Desiree
                                                            Jinny</h3>
                                                        <h3 class="heading heading-light heading-sm strong-300">CEO of
                                                            Webpixels</h3>

                                                        <a href="#"
                                                           class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                    </div>
                                                    <div class="aux-info-wrapper border-top">
                                                        <ul class="aux-info">
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">10k</span>
                                                                Followers
                                                            </li>
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">5k</span>
                                                                Following
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="block block--style-3">
                                                    <div class="profile-picture profile-picture--style-2">
                                                        <img src="/project/web/images/avatar/noavatar.jpg">
                                                    </div>

                                                    <div class="block-body text-center">
                                                        <h3 class="heading heading-6 strong-600 mb-0">David Wally</h3>
                                                        <h3 class="heading heading-light heading-sm strong-300">Manager
                                                            at
                                                            Microsoft</h3>

                                                        <a href="#"
                                                           class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                    </div>

                                                    <div class="aux-info-wrapper border-top">
                                                        <ul class="aux-info">
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">10k</span>
                                                                Followers
                                                            </li>
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">5k</span>
                                                                Following
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="block block--style-3">
                                                    <div class="profile-picture profile-picture--style-2">
                                                        <img src="/project/web/images/avatar/noavatar.jpg">
                                                    </div>

                                                    <div class="block-body text-center">
                                                        <h3 class="heading heading-6 strong-600 mb-0">Cliff Simon</h3>
                                                        <h3 class="heading heading-light heading-sm strong-300">CEO of
                                                            Webpixels</h3>

                                                        <a href="#"
                                                           class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                    </div>

                                                    <div class="aux-info-wrapper border-top">
                                                        <ul class="aux-info">
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">10k</span>
                                                                Followers
                                                            </li>
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">5k</span>
                                                                Following
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="block block--style-3">
                                                    <div class="profile-picture profile-picture--style-2">
                                                        <img src="/project/web/images/avatar/noavatar.jpg">
                                                    </div>

                                                    <div class="block-body text-center">
                                                        <h3 class="heading heading-6 strong-600 mb-0">Elisabeth
                                                            Alanna</h3>
                                                        <h3 class="heading heading-light heading-sm strong-300">Founder
                                                            of
                                                            Starbucks</h3>

                                                        <a href="#"
                                                           class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                    </div>

                                                    <div class="aux-info-wrapper border-top">
                                                        <ul class="aux-info">
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">10k</span>
                                                                Followers
                                                            </li>
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">5k</span>
                                                                Following
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="block block--style-3">
                                                    <div class="profile-picture profile-picture--style-2">
                                                        <img src="/project/web/images/avatar/noavatar.jpg">
                                                    </div>

                                                    <div class="block-body text-center">
                                                        <h3 class="heading heading-6 strong-600 mb-0">Cliff Simon</h3>
                                                        <h3 class="heading heading-light heading-sm strong-300">Founder
                                                            of
                                                            Starbucks</h3>

                                                        <a href="#"
                                                           class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                    </div>

                                                    <div class="aux-info-wrapper border-top">
                                                        <ul class="aux-info">
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">10k</span>
                                                                Followers
                                                            </li>
                                                            <li class="heading strong-400 text-center">
                                                                <span class="d-block strong-600">5k</span>
                                                                Following
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->beginBlock('script') ?>
<?php $this->endBlock() ?>