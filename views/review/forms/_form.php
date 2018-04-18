<?php
/**
 * Created by PhpStorm.
 * User: Damian Brończyk
 * Date: 18.04.2018
 * Time: 15:26
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="item-form">

    <?php $form = ActiveForm::begin([
        'id' => 'item-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-12">
            <?= $form->field($model, 'content')->textarea(['maxlength' => true, 'class' => 'form-control form-control-lg', 'rows' => 3, 'resize' => 'none']) ?>
            <span id="description-helper" style="float: right; margin-top: -10px;"
                  class="text-muted">
                    <?= $model->descriptionLength ?>
                </span>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
