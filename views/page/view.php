<?php
/* @var  \app\models\Page $page */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

$this->title = $page->title . ' | ' . Yii::$app->params['name'];
?>

<?php $this->beginBlock('meta') ?>
    <meta property="og:url" content="<?= Url::to(['page/view', 'slug' => $page->slug], true) ?>"/>
    <meta property="og:title" content="<?= $this->title ?>"/>
    <meta property="og:description" content="<?= Yii::$app->params['description'] ?>"/>
    <meta name="description" content="<?= Yii::$app->params['description'] ?>"/>
    <meta property="og:image" content="<?= Url::to('@web/images/seo/weariology.png', true); ?>"/>
<?php $this->endBlock() ?>

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

<?php $this->beginBlock('script') ?>
<?php $this->endBlock() ?>