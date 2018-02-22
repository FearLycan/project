<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="page-form">

    <?php $form = ActiveForm::begin([
        'action' => ['comment/create']
    ]); ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => true, 'class' => 'form-control', 'rows' => 3]) ?>
    <?= $form->field($model, 'item_id')->hiddenInput()->label(false) ?>

    <!--<div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>-->

    <div class="form-group" style="margin-top: 30px;">
        <?= Html::submitButton('Wyślij', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>