<?php
/**
 * Created by PhpStorm.
 * User: Damian Brończyk
 * Date: 09.01.2018
 * Time: 12:23
 */

use app\models\Image;
use app\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var Item $model */

$url = Image::URL_THUMBNAIL;

?>

<!--<div class="col-lg-3 col-md-6">-->
<div class="block product no-border z-depth-2--hover">
    <div class="block-image">
        <a href="<?= Url::toRoute(['item/view', 'id' => $model->id, 'slug' => $model->slug]); ?>">
            <?= Html::img('@web/images/item/thumbnail/' . $model->image, ['alt' => $model->title]) ?>
        </a>
        <!--            <span class="product-ribbon product-ribbon-right product-ribbon--style-1 bg-blue text-uppercase">New</span>-->
    </div>

    <div class="block-body pt-0 text-center">
        <h3 class="heading heading-6 strong-500 text-capitalize">
            <a href="#">
                <?= Html::encode($model->title) ?>
            </a>
        </h3>
    </div>

    <div class="product-actions--a product-actions--3" data-animation-in="slideInLeft"
         data-animation-out="slideOutLeft">
        <button type="button" class="btn-product-action">
            <i class="ion-bag"></i>
        </button>

        <button type="button" class="btn-product-action heart">
            <i class="ion-ios-heart-outline"></i>
        </button>
    </div>
</div>
<!--</div>-->
