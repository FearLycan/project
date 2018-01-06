<?php

use app\modules\admin\models\Tag;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-7">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList(Tag::getStatusNames()) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'frequency')->textInput(['type' => 'number']) ?>
        </div>
    </div>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-6">
            <?= $form->field($model, 'created_at')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'updated_at')->textInput() ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
