<?php
/**
 * Created by PhpStorm.
 * User: Damian Brończyk
 * Date: 09.01.2018
 * Time: 12:23
 */

use app\components\Helpers;
use app\components\Inflector;
use app\models\Image;
use app\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var Item $model */

$url = Image::URL_THUMBNAIL;

?>

<div class="block product no-border z-depth-2--hover">
    <div class="block-image">
        <a href="<?= Url::toRoute(['item/view', 'id' => $model->id, 'slug' => $model->slug]); ?>">
            <?= Html::img('@web/images/item/thumbnail/' . $model->image, ['alt' => $model->title]) ?>
        </a>
    </div>

    <div class="block-body pt-0 text-center">
        <h3 class="heading heading-6 strong-500 text-capitalize">
            <?= Html::a(Helpers::cutThis($model->title, 30)  , ['item/view', 'id' => $model->id, 'slug' => $model->slug]) ?>
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