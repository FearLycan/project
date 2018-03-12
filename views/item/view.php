<?php

use app\components\Helpers;
use app\components\LinkPager;
use app\models\Image;
use app\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var \app\models\Item $item */
/* @var \app\models\forms\CommentForm $comment */
/* @var \app\models\forms\CommentForm $reply */

$this->title = Html::encode($item->title . ' | ' . $item->shop->name . ' | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta') ?>
<meta property="og:url" content="<?= Url::to(['item/view', 'id' => $item->id, 'slug' => $item->slug], true) ?>"/>
<meta property="og:title" content="<?= $this->title ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:description"
      content="<?= Html::encode($item->shop->name) ?> - <?= Html::encode($this->title) ?>"/>
<meta property="og:image" content="<?= Url::to('@web/images/item/thumbnail/' . $item->image, true); ?>"/>
<?php $this->endBlock() ?>

<section class="slice bg-minimalist">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="swiper-js-container">
                    <div class="swiper-container swiper-container-horizontal swiper-container-undefined"
                         data-swiper-items="1" data-swiper-space-between="0">
                        <div class="swiper-wrapper pb-5" style="transform: translate3d(0px, 0px, 0px);">
                            <div class="swiper-slide swiper-slide-active">
                                <?= Html::img('@web/' . Image::URL . $item->image, ['alt' => $item->title, 'class' => 'img-fluid']) ?>
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                            <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 ml-lg-auto">
                <div class="product-description-wrapper">
                    <!-- Product title -->
                    <h2 class="heading heading-4 strong-600 text-capitalize">
                        <?= Html::encode($item->title) ?>
                    </h2>

                    <hr>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-default">

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <?= Html::a('<i class="icon ion-bag"></i> Idź do sklepu', $item->url, ['class' => 'btn btn-lg btn-block btn-gray-dark btn-icon-left', 'target' => '_blank']) ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <span class="space-xs-md"></span>

                    <!-- Product description -->
                    <div class="product-short-text">
                        <p>
                            <?= Html::encode($item->description) ?>
                        </p>

                        <ul class="icons mt-4">
                            <li class="text-sm">
                                <i class="ion-briefcase icon" aria-hidden="true"></i>
                                <strong>Sklep:</strong> <?= Html::encode($item->shop->name) ?>
                            </li>
                            <li class="text-sm">
                                <?php if ($item->gender == Item::GENDER_MALE): ?>
                                    <i class="ion-man icon" aria-hidden="true"></i>
                                    <strong>Rodzaj:</strong> <?= $item->getGenderName() ?>
                                <?php elseif ($item->gender == Item::GENDER_FEMALE): ?>
                                    <i class="ion-woman icon" aria-hidden="true"></i>
                                    <strong>Rodzaj:</strong> <?= $item->getGenderName() ?>
                                <?php elseif ($item->gender == Item::GENDER_KID): ?>
                                    <i class="fa fa-child" aria-hidden="true"></i>
                                    <strong>Rodzaj:</strong> <?= $item->getGenderName() ?>
                                <?php endif; ?>
                            </li>
                            <li class="text-sm">
                                <i class="icon ion-tshirt"></i>
                                <strong>Typ:</strong> <?= Html::encode($item->type->name) ?>
                            </li>
                        </ul>

                        <ul class="inline-links inline-links--style-1 mt-4 space-xs-md col-lg-12">

                            <?php foreach ($item->tags as $tag): ?>
                                <li>
                                    <a href="<?= Url::to(['tag/view', 'name' => $tag->name]) ?>">
                                        <span class="badge badge-md badge-dark"><?= Html::encode($tag->name) ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">

        <div class="tabs tabs--style-1" role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#tabFour-2" aria-controls="profile" role="tab" data-toggle="tab"
                       class="nav-link active text-center text-uppercase strong-600">Komentarze</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabFour-3" aria-controls="profile" role="tab" data-toggle="tab"
                       class="nav-link text-center text-uppercase strong-600">PODOBNE PRODUKTY</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tabFour-2">
                    <div class="tab-body">

                        <div class="block-post-comments block-post-comments--style-2">
                            <div class="block block-comment comment-form">
                                <?= $this->render('forms/_comment', [
                                    'model' => $comment,
                                ]) ?>
                            </div>
                        </div>

                        <div id="pjax" style="display: none;"></div>

                        <?php Pjax::begin(['id' => 'comments', 'enablePushState' => false]) ?>
                        <?= ListView::widget([
                            'dataProvider' => $commentDataProvider,
                            'summary' => false,
                            'itemView' => '_comment',
                            'options' => [
                                'tag' => 'div',
                                'class' => 'block-post-comments block-post-comments--style-2',
                            ],
                            'pager' => [
                                'class' => LinkPager::class
                            ]
                        ]); ?>
                        <?php Pjax::end() ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="tabFour-3">
                    <div class="tab-body">
                        <?php if (!empty($similar)): ?>
                            <section id="sct_products">
                                <div class="container">
                                    <div class="row-wrapper">
                                        <div class="row cols-xs-space cols-md-space cols-md-space">

                                            <?php foreach ($similar as $item): ?>
                                                <div class="col-lg-3 col-md-6 space-xs-md">
                                                    <div class="block product no-border z-depth-2--hover">
                                                        <div class="block-image">
                                                            <a href="<?= Url::to(['item/view', 'id' => $item->id, 'slug' => $item->slug]) ?>">
                                                                <?= Html::img('@web/' . Image::URL_THUMBNAIL . $item->image, ['alt' => $item->title, 'class' => 'img-fluid similar']) ?>
                                                            </a>
                                                        </div>

                                                        <div class="block-body pt-0 text-center">
                                                            <h3 class="heading heading-6 strong-500 text-capitalize">
                                                                <?= Html::a(Helpers::cutThis($item->title, 30), ['item/view', 'id' => $item->id, 'slug' => $item->slug]) ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php else: ?>
                            <section id="sct_products">
                                <div class="container">
                                    <div class="row-wrapper">
                                        Brak wyników
                                    </div>
                                </div>
                            </section>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="block block-comment comment-reply d-none">
    <?= $this->render('forms/_reply', [
        'model' => $reply,
    ]) ?>
</div>