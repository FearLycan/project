<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<section class="slice">
    <span class="mask mask-gradient-1--style-1"></span>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="text-cover-wrapper">
                        <h1 class="text-cover-title c-white" style="font-size: 8rem;"><?= Html::encode($this->title) ?></h1>
                        <h3 class="text-cover-subtitle c-white strong-400">Page not found</h3>
                        <div class="clearfix"></div>
                        <p class="c-white mt-5">
                            The page you are looking for was moved, removed,<br>
                            renamed or might never existed.
                        </p>

                        <div class="text-center mt-5">
                            <a href="<?= Url::home(); ?>" class="btn btn-styled btn-base-5 btn-outline btn-circle">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
