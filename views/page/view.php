<?php
/* @var  \app\models\Page $page */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = $page->title;
?>


<section class="slice sct-color-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="block block-post">
                    <div class="mb-4">
                        <h3 class="heading heading-2 strong-400 text-normal">
                            <?= Html::encode($page->title) ?>
                        </h3>
                    </div>


                    <div class="block-body block-post-body" style="padding: 0;">
                        <?= HtmlPurifier::process($page->content); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
