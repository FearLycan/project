<?php

use app\components\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

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

                                        <?= ListView::widget([
                                            'dataProvider' => $dataProvider,
                                            'summary' => false,
                                            'itemOptions' => ['class' => 'col-lg-4 space-xs-md'],
                                            'itemView' => '../item/_item',
                                            'options' => [
                                                'tag' => 'div',
                                                'class' => 'row cols-md-space cols-sm-space cols-xs-space',
                                            ],
                                            'pager' => [
                                                'class' => LinkPager::class
                                            ]
                                        ]); ?>

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