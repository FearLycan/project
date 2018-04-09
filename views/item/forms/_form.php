<?php

use app\models\forms\ItemForm;
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

            <?php if($model->scenario == ItemForm::SCENARIO_UPDATE): ?>
                <div class="col-md-6" style="padding-top: 35px; text-align: right;">
                    <a style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="<img src='/images/item/thumbnail/'.<?= $model->image ?>.' />">
                        Aktualna grafika dla produktu
                    </a>

                </div>
            <?php endif; ?>

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
                    'theme' => Select2::THEME_BOOTSTRAP,
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
                <?= $form->field($model, 'gender')->dropDownList(Item::getGendersNames(), ['class' => 'form-control form-control-lg selectpicker']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'shop_id')->dropDownList($shops, ['class' => 'form-control form-control-lg selectpicker']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'type_id')->dropDownList($types, ['class' => 'form-control form-control-lg selectpicker']) ?>
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

        $('a[data-toggle="tooltip"]').tooltip({
            animated: 'fade',
            placement: 'bottom',
            html: true
        });
    </script>

<?php $this->endBlock(); ?>