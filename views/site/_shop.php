<?php

use app\models\Shop;
use yii\helpers\Html;

/* @var $model Shop */
?>


<div class="block block--style-3">
    <div class="block-image relative">
        <div class="view view-first">
            <a href="#">
                <?= Html::img('@web/images/shop/' . $model->image, ['class' => 'img-fluid']) ?>
            </a>
        </div>
    </div>

    <div class="aux-info-wrapper border-bottom">
        <ul class="aux-info">
            <li class="heading strong-400 text-center">
                <span class="name">
                    <?= Html::encode($model->name) ?>
                </span>

                <a href="<?= $model->url ?>" rel="nofollow" class="url" style="display: none"
                   title="Sklep Online <?= Html::encode($model->name) ?>">
                   Idź do Sklepu Online <?= Html::encode($model->name) ?>
                </a>

            </li>
        </ul>
    </div>
</div>

