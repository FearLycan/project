<?php
/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $shops app\models\Shop */
/* @var $types app\models\Type */
?>

<?php $this->beginBlock('meta'); ?>
<?php $this->endBlock(); ?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">
        <div class="row-wrapper">
            <?= $this->render('forms/_form', [
                'model' => $model,
                'shops' => $shops,
                'types' => $types,
            ]) ?>
        </div>
    </div>
</section>
