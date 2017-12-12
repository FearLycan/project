<?php

$this->title = 'Rejestracja';
?>

<section class="slice-lg has-bg-cover bg-size-cover"
         style="background-image: url(../images/login/login-image-02.jpg); background-position: bottom center;">
    <div class="container">
        <div class="row justify-content-center cols-xs-space">
            <div class="col-lg-6">
                <div class="form-card form-card--style-2 z-depth-2-top">
                    <div class="form-header text-center">
                        <div class="form-header-icon">
                            <i class="icon ion-log-in"></i>
                        </div>
                    </div>
                    <div class="form-body">

                        <div class="text-center px-2">
                            <h4 class="heading heading-4 strong-400 mb-4">Utwórz swoje konto</h4>
                        </div>

                        <?= $this->render('_registration-form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
