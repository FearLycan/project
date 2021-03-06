<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = Html::encode('Tag: ' . $tag . ' | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta') ?>
<meta property="og:url" content="<?= Url::to(['tag/view', 'slug' => $tag], true) ?>"/>
<meta property="og:title" content="<?= $this->title ?>"/>
<meta property="og:description" content=""/>
<meta property="og:image" content=""/>
<?php $this->endBlock() ?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="section-title section-title--style-1 section-title-tag text-center mb-4">
                    <h3 class="section-title-inner heading-2 strong-400">
                        <span><?= $tag ?></span>
                    </h3>
                    <span class="section-title-delimiter clearfix"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <hr>
        </div>


        <div class="row-wrapper">

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'itemOptions' => ['class' => 'col-lg-3 col-md-6 space-xs-md'],
                'itemView' => '../item/_item',
                'viewParams' => ['tag' => $tag],
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
