<?php

/* @var $this yii\web\View */

use app\components\LinkPager;

use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = 'Weariology';

?>

<?php $this->beginBlock('meta') ?>
    <meta property="og:url" content="<?= Yii::$app->params['url'] ?>" />
    <meta property="og:title" content="<?= $this->title ?>"/>
    <meta property="og:description" content="<?= Yii::$app->params['description'] ?>" />
    <meta name="description" content="<?= Yii::$app->params['description'] ?>" />
    <meta property="og:image" content="<?= Url::to('@web/images/seo/weariology.png', true); ?>" />
<?php $this->endBlock() ?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">
        <div class="row-wrapper">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'itemOptions' => ['class' => 'col-lg-3 col-md-6 space-xs-md'],
                'itemView' => '_item',
                'options' => [
                    'tag' => 'div',
                    'class' => 'row cols-md-space cols-sm-space cols-xs-space',
                ],
                'pager' => [
                    'class' => LinkPager::class
                ]
            ]); ?>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="pagination-wrapper d-flex justify-content-center py-4">
        </div>
    </div>
</section>

<?php $this->beginBlock('script') ?>
<?php $this->endBlock() ?>
