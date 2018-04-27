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

            <?php if ($item->status == Item::STATUS_ARCHIVES): ?>
                <div class="col-lg-12">
                    <div class="alert alert-warning" role="alert">
                        <strong>Uwaga!</strong> Ten przedmiot posiada status archiwalny, może już nie być dostępny w
                        sklepie.
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!Yii::$app->user->isGuest && $item->author_id == Yii::$app->user->identity->id): ?>
                <div class="col-lg-1">
                    <a href="<?= Url::to(['item/update', 'id' => $item->id]) ?>" class="btn btn-primary">Edytuj</a>
                </div>

                <div class="offset-9 col-lg-2 text-lg-right" style="padding-top: 5px;">
                    <?php if ($item->status == Item::STATUS_ACTIVE): ?>
                        <span class="badge badge-success badge-lg" style=""><?= $item->getStatusName() ?></span>
                    <?php elseif ($item->status == Item::STATUS_PENDING): ?>
                        <span class="badge badge-info badge-lg" style=""><?= $item->getStatusName() ?></span>
                    <?php elseif ($item->status == Item::STATUS_INACTIVE): ?>
                        <span class="badge badge-danger badge-lg" style=""><?= $item->getStatusName() ?></span>
                    <?php elseif ($item->status == Item::STATUS_ARCHIVES): ?>
                        <span class="badge badge-warning badge-lg" style=""><?= $item->getStatusName() ?></span>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <div class="col-lg-12">
                <span class="space-xs-md"></span>
            </div>

        </div>
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

                    <span class="space-xs-md"></span>

                    <div class="product-short-text">
                        <p>
                            Dodane przez:
                            <?= Html::a($item->author->name, ['user/view', 'slug' => $item->author->slug]) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($item->isActive()): ?>
    <section class="slice sct-color-1" id="sct_products">
        <div class="container">

            <div class="tabs tabs--style-1" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabFour-3" aria-controls="profile" role="tab" data-toggle="tab"
                           class="nav-link active text-center text-uppercase strong-600">PODOBNE PRODUKTY</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a href="#tabFour-4" aria-controls="profile" role="tab" data-toggle="tab"
                           class="nav-link text-center text-uppercase strong-600">Opinie</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tabFour-3">
                        <div class="tab-body">
                            <?php if (!empty($similar)): ?>
                                <section id="sct_products">
                                    <div class="container">
                                        <div class="row-wrapper">
                                            <div class="row cols-xs-space cols-md-space cols-md-space">

                                                <?php foreach ($similar as $i): ?>
                                                    <div class="col-lg-3 col-md-6 space-xs-md">
                                                        <div class="block product no-border z-depth-2--hover">
                                                            <div class="block-image">
                                                                <a href="<?= Url::to(['item/view', 'id' => $i->id, 'slug' => $i->slug]) ?>">
                                                                    <?= Html::img('@web/' . Image::URL_THUMBNAIL . $i->image, ['alt' => $i->title, 'class' => 'img-fluid similar']) ?>
                                                                </a>
                                                            </div>

                                                            <div class="block-body pt-0 text-center">
                                                                <h3 class="heading heading-6 strong-500 text-capitalize">
                                                                    <?= Html::a(Helpers::cutThis($i->title, 30), ['item/view', 'id' => $i->id, 'slug' => $i->slug]) ?>
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
                    <div role="tabpanel" class="tab-pane" id="tabFour-4">
                        <div class="tab-body">
                            <div class="row">
                                <div class="col-6">
                                    <?= Html::a('Dodaj recenzje', ['review/create', 'id' => $item->id, 'slug' => $item->slug], ['class' => 'btn btn-styled btn-primary']) ?>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>

                            <?= ListView::widget([
                                'dataProvider' => $reviewDataProvider,
                                'summary' => false,
                                'itemOptions' => ['class' => 'col-lg-12 col-md-12 space-xs-md'],
                                'itemView' => '_review',
                                'options' => [
                                    'tag' => 'div',
                                    'class' => 'row cols-md-space cols-sm-space cols-xs-space',
                                ],
                                'pager' => [
                                    'class' => LinkPager::class
                                ]
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php $this->beginBlock('script') ?>
<?php $this->endBlock() ?>
