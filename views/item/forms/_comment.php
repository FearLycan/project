<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

<div class="page-form">

    <?php $form = ActiveForm::begin([
        'id' => 'w1',
        'action' => ['comment/create'],
        //'options' => ['data-pjax' => true],
    ]); ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => true, 'class' => 'form-control', 'rows' => 3]) ?>
    <?= $form->field($model, 'item_id')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Wyślij', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->beginBlock('script') ?>
<script>
    $(document).ready(function () {
        var $form = $('form#w1');
        $form.submit(function (e) {
            //e.preventDefault();
            //e.stopImmediatePropagation();

            var data = $form.serialize();

            $.ajax({
                type: 'POST',
                url: $form.attr('action'),
                data: data,
                dataType: 'json',
                success: function (d) {
                    console.log(d);
                }
            });

            return false;
        });
    });
</script>
<?php $this->endBlock() ?>

