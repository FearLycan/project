<?php

/* @var $model \app\models\Shop */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = Html::encode($model->name . ' | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta') ?>
<meta property="og:url" content="<?= Url::to(['shop/view' ,'slug' => $model->slug], true) ?>" />
<meta property="og:title" content="<?= $this->title ?>" />
<meta property="og:description" content="<?= Yii::$app->params['description'] ?>" />
<meta name="description" content="<?= Yii::$app->params['description'] ?>" />
<meta property="og:image" content="<?= Url::to('@web/images/shop/'.  $model->image, true); ?>" />
<?php $this->endBlock() ?>

<section class="slice-xl" style="background-image: url(<?= Url::to('@web/images/shop/' . $model->image); ?>); background-position: center center; background-repeat: no-repeat;
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


