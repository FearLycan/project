<?php
/* @var  \app\models\Page $page */

use yii\helpers\Html;

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
                        <ul class="inline-links inline-links--style-2 mt-1">
                            <li>
                                Utworzono <?= Yii::$app->formatter->asDate($page->created_at, 'l jS F Y'); ?>
                            </li>

                            <?php if (!empty($page->updated_at)): ?>
                                <li>
                                    Zaktualizowano <?= Yii::$app->formatter->asDate($page->updated_at, 'l jS F Y'); ?>
                                </li>
                            <?php endif; ?>

                            <li>
                                przez <?= Html::encode($page->author->name) ?>
                            </li>
                        </ul>
                    </div>


                    <div class="block-body block-post-body" style="padding: 0;">
                        <?= \yii\helpers\HtmlPurifier::process($page->content); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
