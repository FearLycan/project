<?php

use app\modules\admin\models\Page;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJs("CKEDITOR.plugins.addExternal('pbckcode', '/pbckcode/plugin.js', '');");

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
            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'custom',
                'clientOptions' => [
                    ['allowedContent' => true],
                    'toolbarGroups' => [
                        ['name' => 'undo'],
                        ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                        ['name' => 'colors'],
                        ['name' => 'document', 'groups' => ['document', 'doctools', 'mode']],
                    ]
                ]
            ]) ?>

        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
