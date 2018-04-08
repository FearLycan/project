<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Item */
/* @var $shops app\modules\admin\models\Shop */
/* @var $types app\modules\admin\models\Type */

$this->title = Html::encode('Edycja | '.$model->title . ' | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta'); ?>
<?php $this->endBlock(); ?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">

        <div class="alert alert-warning" role="alert">
         <strong>Uwaga!</strong> Edycja spowoduje, że ten przedmiot ponownie będzie oczekiwał na zaakceptowanie przez moderatora.
        </div>

        <div class="row-wrapper">
            <?= $this->render('forms/_form', [
                'model' => $model,
                'shops' => $shops,
                'types' => $types,
            ]) ?>
        </div>
    </div>
</section>
