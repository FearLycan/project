<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<section class="background-image-holder" data-holder-type="fullscreen" data-holder-offset="" style="height: 662px;">
    <span class="mask mask-gradient-1--style-1"></span>
    <div class="slice holder-item holder-item-light">
        <div class="container container-sm d-flex align-items-center">
            <div class="col">
                <div class="row py-3 text-center justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="text-cover-wrapper">
                            <h3 class="text-cover-title c-white">404</h3>
                            <h4 class="text-cover-subtitle c-white strong-400 mt-4">Page not found</h4>
                            <div class="clearfix"></div>
                            <p class="text-lg line0height-1_8 c-white mt-5">
                                The page you are looking for was moved, removed,<br>
                                renamed or might never existed.
                            </p>

                            <div class="text-center mt-5">
                                <a href="../../../" class="btn btn-styled btn-base-5 btn-outline btn-circle">Back to home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
