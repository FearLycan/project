<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    <!-- Settings form -->
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- General information -->
            <div class="card no-border">
                <div class="card-title px-0 pb-0 no-border">
                    <h3 class="heading heading-6 strong-600">
                        Informacje ogólne
                    </h3>
                    <p class="mt-1 mb-0">
                        Tutaj możesz uzupełnić kilka informacji o sobie.
                    </p>
                </div>
                <div class="card-body px-0">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <?= $form->field($model, 'real_name')->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg']); ?>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <?php /* echo $form->field($model, 'real_last_name')->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg']); */?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <?= $form->field($model, 'about')->textarea(['maxlength' => true, 'class' => 'form-control form-control-lg', 'rows' => 4]) ?>
                        </div>

                    </div>
                </div>
            </div>

            <hr class="mt-0 mb-0">

            <div class="card no-border">
                <div class="card-title px-0 pb-0 no-border">
                    <h3 class="heading heading-6 strong-600">
                        Lokalizacja
                    </h3>
                    <p class="mt-1 mb-0">
                        Podstawowe dane o Twojej lokalizacji
                    </p>
                </div>
                <div class="card-body px-0">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg']); ?>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <?= $form->field($model, 'country')->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg']); ?>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0 mb-0">

            <div class="card no-border">
                <div class="card-title px-0 pb-0 no-border">
                    <h3 class="heading heading-6 strong-600">
                        Media społecznościowe
                    </h3>
                    <p class="mt-1 mb-0">
                        Gdzie jeszcze można Cię znaleźć?
                    </p>
                </div>
                <div class="card-body px-0">
                    <div class="row">
                        <?php foreach (User::getSocialMediaTypes() as $type): ?>
                            <div class="col-md-6 col-lg-12">
                                <?= $form->field($model, $type)->textInput(['maxlength' => true, 'class' => 'form-control form-control-lg']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <hr class="mt-0 mb-0">

            <div class="card no-border">
                <div class="card-body px-0">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="form-group">
                                <?= Html::submitButton('Zapisz', ['class' => 'btn btn-styled btn-base-1']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php ActiveForm::end(); ?>