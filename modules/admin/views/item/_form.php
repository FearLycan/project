<?php

use app\modules\admin\models\Item;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Item */
/* @var $shops app\modules\admin\models\Shop */
/* @var $types app\modules\admin\models\Type */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin([
        'id' => 'item-form',
        'enableAjaxValidation' => true,
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-6">
            <?= $form->field($model, 'myFile')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'showCancel' => false
                ],
                'pluginEvents' => [
                    //'fileselect' => 'function() { var file = $(".file-caption-name").attr( "title" ); console.log(file); $("input[name=\'ItemForm[image]\']").val(file); }',
                ],
            ]); ?>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-12">

            <?php
            $formatJs = <<< 'JS'
    var formatRepo = function (tag) {
        if (tag.loading) {
            return tag.name;
        }

        var markup = tag.name;

        return  markup;
    };
    var formatRepoSelection = function (tag) {
        return tag.name || tag.id;
    }
JS;
            // Register the formatting script
            $this->registerJs($formatJs, View::POS_HEAD);
            ?>


            <?= $form->field($model, 'tags')->widget(Select2::classname(), [
                //'data' => $shops,
                'options' => ['placeholder' => 'Tags...', 'multiple' => true],
                'showToggleAll' => false,
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ';'],
                    'maximumInputLength' => 15,
                    'maximumSelectionLength' => 10,

                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::to(['tag/list']),
                        'dataType' => 'json',
                        'delay' => 250,
                        'data' => new JsExpression('function(params) { return {phrase:params.term, page:params.page}; }'),
                        'cache' => false,
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('formatRepo'),
                    'templateSelection' => new JsExpression('formatRepoSelection'),
                ],
            ]); ?>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-3">
            <?= $form->field($model, 'gender')->dropDownList(Item::getGendersNames()) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'shop_id')->widget(Select2::classname(), [
                'data' => $shops,
                'options' => ['placeholder' => 'Wybierz sklep'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'type_id')->widget(Select2::classname(), [
                'data' => $types,
                'options' => ['placeholder' => 'Wybierz sklep'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList(Item::getStatusNames()) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
