<?php

use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-8">
            <?= $form->field($model, 'rating')->widget(StarRating::classname(), [
                'pluginOptions' => \app\components\Helpers::ratingOptions()
            ]); ?>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-12">
            <?= $form->field($model, 'content')->widget(TinyMce::className(), [
                'options' => ['rows' => 6],
                'language' => 'pl',
                'clientOptions' => [
                    'branding' => false,
                    'menubar' => false,
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'confirmed_by_purchase')->checkbox([
                'labelOptions' => [ 'class' => 'checkbox-label']
            ]) ?>


        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-8">
            <?= $form->field($model, 'myFiles[]')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => true
                ],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => false,
                    'showUpload' => false,
                    'showCancel' => false,
                    'maxFileCount' => 3,
                ],
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
