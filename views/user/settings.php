<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Html::encode('Ustawienia | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta') ?>
<meta property="og:url" content="<?= Url::to(['user/settings'], true) ?>"/>
<meta property="og:title" content="<?= $this->title ?>"/>
<meta property="og:description" content="Przejdź do ustawień swojego profilu."/>
<meta property="og:image" content="<?= Url::to('@web/images/seo/weariology.png', true); ?>"/>
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
                                            Ustawienia
                                        </h2>
                                    </div>
                                    <div class="col-lg-6 col-12">

                                    </div>
                                </div>
                            </div>

                            <?= $this->render('_menu', [
                                'model' => $model,
                            ]) ?>

                            <?= $this->render('forms/_settings', [
                                'model' => $model,
                            ]) ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->beginBlock('script') ?>
<?php $this->endBlock() ?>