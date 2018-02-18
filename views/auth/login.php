<?php

$this->title = 'Zaloguj się';

?>

<section class="slice-lg has-bg-cover bg-size-cover" style="background-image: url(../images/site/login-image-01.jpg);">
    <div class="container">
        <div class="row justify-content-center cols-xs-space">
            <div class="col-lg-4">
                <div class="form-card form-card--style-2 z-depth-2-top">
                    <div class="form-header text-center">
                        <div class="form-header-icon">
                            <i class="icon ion-log-in"></i>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="text-center px-2">
                            <h4 class="heading heading-4 strong-400 mb-4">Zaloguj się</h4>
                        </div>

                        <?= $this->render('_login-form', [
                            'model' => $model,
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>