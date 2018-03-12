<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

<div class="page-form">
    <?php $form = ActiveForm::begin([
        'id' => 'reply-form',
        'action' => ['comment/reply'],
        'options' => ['data-pjax' => true],
    ]); ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => true, 'class' => 'form-control', 'rows' => 3]) ?>
    <?= $form->field($model, 'item_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'parent_id')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Wyślij', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>