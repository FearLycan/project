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
        'options' => ['data-pjax' => true],
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

        $form.on('beforeSubmit', function () {

            var data = $form.serialize();

            $.ajax({
                //async: true,
                cache: false,
                type: 'POST',
                url: $form.attr('action'),
                data: data,
                dataType: 'json',
                success: function (d) {
                    //$.pjax.reload({container: '#comments', async: false});
                    $.pjax.reload('#comments', {timeout: false});

                    $('#comments').on('pjax:end', function () {
                        $('.pulse').removeClass('pulse');

                        var $element = $('div[data-key="' + d.id + '"]');

                        $element.scrollView();

                        $element.addClass('pulse');
                    });
                    $form.trigger('reset');
                }
            });

            return false;
        });
    });

    $.fn.scrollView = function () {
        $('html, body').animate({
            scrollTop: $(this).offset().top - 20
        }, 1500);
    }
</script>


<script>


    $("div#comments").on('click', '.reply', function (event) {
        var $reply = $(".comment-reply");
        var $comment_body = $(this).parent().parent();
        var user = $.trim($comment_body.find('.heading').children().text());
        var parent_id = $comment_body.attr('id');
        $reply.appendTo($comment_body);
        $reply.find("textarea[name='ReplyForm[content]']").val("@" + user + " ");
        $reply.find("input[name='ReplyForm[parent_id]']").val(parent_id);
        $reply.removeClass('d-none');
        $.pjax.click(event, {container: this})
    });
</script>


<script>
    $(document).ready(function () {
        var $form = $('form#reply-form');

        $form.on('beforeSubmit', function () {

            var data = $form.serialize();

            $.ajax({
                //async: true,
                cache: false,
                type: 'POST',
                url: $form.attr('action'),
                data: data,
                dataType: 'json',
                success: function (d) {
                    //$.pjax.reload({container: '#comments', async: false});
                    $.pjax.reload('#comments', {timeout: false});
                    $form.trigger('reset');
                }
            });

            return false;
        });
    });

</script>

<?php $this->endBlock() ?>

