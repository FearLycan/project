<?php

/* @var $model \app\models\Shop */


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = Html::encode($model->name . ' | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta') ?>
<?php $this->endBlock() ?>

<section class="slice-xl" style="background-image: url(<?= Url::to('@web/images/shop/' . $model->image) ?>); background-position: center center; background-repeat: no-repeat;
        background-color: <?= $model->color ?>;">
    <span class="mask mask-dark--style-2"></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="py-4 text-center">
                    <div class="heading heading-inverse heading-2 strong-600 line-height-1_8" style="color: transparent;">
                        <?= Html::encode($model->name) ?>
                    </div>

                    <h4 class="heading heading-inverse alpha-8 heading-6 strong-500" style="color: transparent;">
                        <?= Html::encode($model->name) ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">

      <!--  <div class="row">
            <div class="col">
                <div class="section-title section-title--style-1 text-center mb-4">
                    <h3 class="section-title-inner heading-2 strong-400">
                        <span><?/*= $model->name */?></span>
                    </h3>
                    <span class="section-title-delimiter clearfix"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <hr>
        </div>-->

        <div class="row-wrapper">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'itemOptions' => ['class' => 'col-lg-3 col-md-6 space-xs-md'],
                'itemView' => '../item/_item',
                'options' => [
                    'tag' => 'div',
                    'class' => 'row cols-md-space cols-sm-space cols-xs-space',
                ],
            ]); ?>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="pagination-wrapper d-flex justify-content-center py-4">
        </div>
    </div>
</section>

<?php $this->beginBlock('script') ?>
<?php $this->endBlock() ?>


