<?php

use app\models\Item;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $shops app\modules\admin\models\Shop */
/* @var $types app\modules\admin\models\Type */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="item-form">

        <?php $form = ActiveForm::begin([
            'id' => 'item-form',
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg']) ?>
            </div>
        </div>

        <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-12">
                <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'class' => 'form-control form-control-lg', 'rows' => 3, 'resize' => 'none']) ?>
                <span id="description-helper" style="float: right; margin-top: -10px;"
                      class="text-muted">
                    <?= $model->descriptionLength ?>
                </span>
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
                    'toggleAllSettings' => [
                        'selectLabel' => '<i class="glyphicon glyphicon-ok-circle"></i> Tag All',
                        'unselectLabel' => '<i class="glyphicon glyphicon-remove-circle"></i> Untag All',
                        'selectOptions' => ['class' => 'text-success'],
                        'unselectOptions' => ['class' => 'text-danger'],
                    ],
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
                <?= $form->field($model, 'gender')->dropDownList(Item::getGendersNames(), ['class' => 'form-control selectpicker']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'shop_id')->widget(Select2::classname(), [
                    'data' => $shops,
                    'options' => ['placeholder' => 'Wybierz sklep'],
                    'toggleAllSettings' => [
                        'options' => ['class' => 'spoko']
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'type_id')->widget(Select2::classname(), [
                    'data' => $types,
                    'options' => ['placeholder' => 'Wybierz typ'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Zapisz', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?php $this->beginBlock('script'); ?>

    <script>
        $('#itemform-description').on('keyup', function () {
            limitText(this, <?= $model->descriptionLength ?>)
        });

        function limitText(field, maxChar) {
            var ref = $(field),
                val = ref.val();

            if ((maxChar - val.length) < 0) {
                $('#description-helper').text('0');
            } else {
                $('#description-helper').text(maxChar - val.length);
            }

            if (val.length >= maxChar) {
                ref.val(function () {
                    return val.substr(0, maxChar);
                });
            }
        }
    </script>

<?php $this->endBlock(); ?>