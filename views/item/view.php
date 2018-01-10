<?php

use yii\helpers\Html;

/* @var \app\models\Item $item */

$this->title = $item->title
?>

<section class="slice bg-minimalist">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="swiper-js-container">
                    <div class="swiper-container swiper-container-horizontal swiper-container-undefined"
                         data-swiper-items="1" data-swiper-space-between="0">
                        <div class="swiper-wrapper pb-5" style="transform: translate3d(0px, 0px, 0px);">
                            <div class="swiper-slide swiper-slide-active" style="width: 540px;">
                                <img src="" class="img-fluid">
                                <?= Html::img('@web/images/item/' . $item->image, ['alt' => $item->title, 'class' => 'img-fluid']) ?>
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
                                        <?= Html::a('<i class="icon ion-bag"></i> Idź do sklepu', $item->url, ['class' => 'btn btn-lg btn-block btn-gray-dark btn-icon-left']) ?>
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
                                <i class="icon icon-clothes-029"></i> Exterior: 98% cotton, 2% elastane
                            </li>
                            <li class="text-sm">
                                <i class="icon icon-electronics-002"></i> Machine wash up to 30°/86°F gentle cycle
                            </li>
                            <li class="text-sm">
                                <i class="icon icon-electronics-043"></i> Iron up to 110°C/230°F
                            </li>
                        </ul>

                        <ul class="inline-links inline-links--style-1 mt-4">
                            <li>
                                <a href="#">Twitter</a>
                            </li>
                            <li>
                                <a href="#">Facebook</a>
                            </li>
                            <li>
                                <a href="#">Pinterest</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">
        <div class="section-title section-title--style-1 text-center">
            <h3 class="section-title-inner heading-6 strong-600 text-uppercase ls-2">
                <span>You may also like</span>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>

        <span class="clearfix"></span>

        <div class="row-wrapper">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 col-md-6">
                    <div class="block product no-radius">
                        <div class="product-image">
                            <div class="view view-first">
                                <a href="#">
                                    <img src="../../../assets/images/prv/shop/accessories/img-1a.png">
                                </a>
                            </div>

                            <div class="product-actions--a product-actions--2" data-animation-in="slideInRight"
                                 data-animation-out="slideOutRight">
                                <button type="button" class="btn-product-action">
                                    <i class="ion-bag"></i>
                                </button>

                                <button type="button" class="btn-product-action">
                                    <i class="ion-ios-heart-outline"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body px-0">
                            <h3 class="heading heading-6 strong-500 text-capitalize mb-0">Wood phone case</h3>
                            <span class="star-rating star-rating-sm">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                            <div class="price-wrapper">
                                <span class="price heading-6 c-gray-light strong-400">$<span
                                            class="price-value">80.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="block product no-radius">
                        <div class="product-image">
                            <div class="view view-first">
                                <a href="#">
                                    <img src="../../../assets/images/prv/shop/accessories/img-2a.png">
                                </a>
                            </div>

                            <div class="product-actions--a product-actions--2" data-animation-in="slideInRight"
                                 data-animation-out="slideOutRight">
                                <button type="button" class="btn-product-action">
                                    <i class="ion-bag"></i>
                                </button>

                                <button type="button" class="btn-product-action">
                                    <i class="ion-ios-heart-outline"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body px-0">
                            <h3 class="heading heading-6 strong-500 text-capitalize mb-0">Dark leather bag</h3>
                            <span class="star-rating star-rating-sm">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                            <div class="price-wrapper">
                                <span class="price heading-6 c-gray-light strong-400">$<span
                                            class="price-value">500.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="block product no-radius">
                        <div class="product-image">
                            <div class="view view-first">
                                <a href="#">
                                    <img src="../../../assets/images/prv/shop/accessories/img-3a.png">
                                </a>
                            </div>

                            <div class="product-actions--a product-actions--2" data-animation-in="slideInRight"
                                 data-animation-out="slideOutRight">
                                <button type="button" class="btn-product-action">
                                    <i class="ion-bag"></i>
                                </button>

                                <button type="button" class="btn-product-action">
                                    <i class="ion-ios-heart-outline"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body px-0">
                            <h3 class="heading heading-6 strong-500 text-capitalize mb-0">Brown leather wallet</h3>
                            <span class="star-rating star-rating-sm">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                            <div class="price-wrapper">
                                <span class="price heading-6 c-gray-light strong-400">$<span
                                            class="price-value">100.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="block product no-radius">
                        <div class="product-image">
                            <div class="view view-first">
                                <a href="#">
                                    <img src="../../../assets/images/prv/shop/accessories/img-4a.png">
                                </a>
                            </div>

                            <div class="product-actions--a product-actions--2" data-animation-in="slideInRight"
                                 data-animation-out="slideOutRight">
                                <button type="button" class="btn-product-action">
                                    <i class="ion-bag"></i>
                                </button>

                                <button type="button" class="btn-product-action">
                                    <i class="ion-ios-heart-outline"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body px-0">
                            <h3 class="heading heading-6 strong-500 text-capitalize mb-0">Gray fabric hat</h3>
                            <span class="star-rating star-rating-sm">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                            <div class="price-wrapper">
                                <span class="price heading-6 c-gray-light strong-400">$<span
                                            class="price-value">60.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 col-md-6">
                    <div class="block product no-radius">
                        <div class="product-image">
                            <div class="view view-first">
                                <a href="#">
                                    <img src="../../../assets/images/prv/shop/accessories/img-5a.png">
                                </a>
                            </div>

                            <div class="product-actions--a product-actions--2" data-animation-in="slideInRight"
                                 data-animation-out="slideOutRight">
                                <button type="button" class="btn-product-action">
                                    <i class="ion-bag"></i>
                                </button>

                                <button type="button" class="btn-product-action">
                                    <i class="ion-ios-heart-outline"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body px-0">
                            <h3 class="heading heading-6 strong-500 text-capitalize mb-0">Satin rose-gold scarf</h3>
                            <span class="star-rating star-rating-sm">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                            <div class="price-wrapper">
                                <span class="price heading-6 c-gray-light strong-400">$<span
                                            class="price-value">50.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="block product no-radius">
                        <div class="product-image">
                            <div class="view view-first">
                                <a href="#">
                                    <img src="../../../assets/images/prv/shop/accessories/img-6a.png">
                                </a>
                            </div>

                            <div class="product-actions--a product-actions--2" data-animation-in="slideInRight"
                                 data-animation-out="slideOutRight">
                                <button type="button" class="btn-product-action">
                                    <i class="ion-bag"></i>
                                </button>

                                <button type="button" class="btn-product-action">
                                    <i class="ion-ios-heart-outline"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body px-0">
                            <h3 class="heading heading-6 strong-500 text-capitalize mb-0">Faux leather gloves</h3>
                            <span class="star-rating star-rating-sm">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                            <div class="price-wrapper">
                                <span class="price heading-6 c-gray-light strong-400">$<span
                                            class="price-value">110.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="block product no-radius">
                        <div class="product-image">
                            <div class="view view-first">
                                <a href="#">
                                    <img src="../../../assets/images/prv/shop/accessories/img-7a.png">
                                </a>
                            </div>

                            <div class="product-actions--a product-actions--2" data-animation-in="slideInRight"
                                 data-animation-out="slideOutRight">
                                <button type="button" class="btn-product-action">
                                    <i class="ion-bag"></i>
                                </button>

                                <button type="button" class="btn-product-action">
                                    <i class="ion-ios-heart-outline"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body px-0">
                            <h3 class="heading heading-6 strong-500 text-capitalize mb-0">Brown leather hat</h3>
                            <span class="star-rating star-rating-sm">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                            <div class="price-wrapper">
                                <span class="price heading-6 c-gray-light strong-400">$<span
                                            class="price-value">100.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="block product no-radius">
                        <div class="product-image">
                            <div class="view view-first">
                                <a href="#">
                                    <img src="../../../assets/images/prv/shop/accessories/img-8a.png">
                                </a>
                            </div>

                            <div class="product-actions--a product-actions--2" data-animation-in="slideInRight"
                                 data-animation-out="slideOutRight">
                                <button type="button" class="btn-product-action">
                                    <i class="ion-bag"></i>
                                </button>

                                <button type="button" class="btn-product-action">
                                    <i class="ion-ios-heart-outline"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body px-0">
                            <h3 class="heading heading-6 strong-500 text-capitalize mb-0">Leather bracelet</h3>
                            <span class="star-rating star-rating-sm">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </span>
                            <div class="price-wrapper">
                                <span class="price heading-6 c-gray-light strong-400">$<span
                                            class="price-value">30.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
