<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

/* @var $model app\models\Item */
/* @var $shops app\models\Shop */
/* @var $types app\models\Type */

$this->title = Html::encode('Dodaj nowy produkt | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta'); ?>
<?php $this->endBlock(); ?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">

        <h1 class="heading">Dodaj nowy produkt</h1>
        <span class="space-xs-md"></span>

        <div class="row-wrapper">
            <?= $this->render('forms/_form', [
                'model' => $model,
                'shops' => $shops,
                'types' => $types,
            ]) ?>
        </div>
    </div>
</section>
