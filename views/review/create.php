<?php
/* @var $this yii\web\View */

/* @var $item app\models\Item */

use yii\helpers\Html;

$this->title = Html::encode('Dodaj recenzję | ' . $item->title . ' | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta'); ?>
<?php $this->endBlock(); ?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">

        <h1 class="heading">Dodaj recenzję produktu</h1>
        <span class="space-xs-md"></span>

        <div class="row-wrapper">
            <?= $this->render('forms/_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</section>

<?php $this->beginBlock('script'); ?>
<?php $this->endBlock(); ?>