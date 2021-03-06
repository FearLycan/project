<?php

use app\modules\admin\models\Page;
use dosamigos\ckeditor\CKEditor;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-10">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-2">
            <?= $form->field($model, 'status')->dropDownList(Page::getStatusNames()) ?>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-12">
            <?= $form->field($model, 'content')->widget(TinyMce::className(), [
                'options' => ['rows' => 6],
                'language' => 'pl',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]); ?>

        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
