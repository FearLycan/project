<?php

use app\modules\admin\models\Shop;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Shop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="row" style="margin-bottom: 15px;">
        <div class="col">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col">
            <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]); ?>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-6">
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'status')->dropDownList(Shop::getStatusNames()) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group" style="height: 25px; background-color: <?= $model->color ?>" id="color-box">
            <p class="text-center" style="color: white">KOLOR TŁA</p>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->beginBlock('script') ?>
<script>
    $('#shopform-color').on("input", function () {
        color = $(this).val();
        $('#color-box').css('background-color', color);
    });
</script>
<?php $this->endBlock() ?>
