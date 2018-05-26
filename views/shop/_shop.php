<?php

use app\models\Shop;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Shop */
?>


<div class="block block--style-3">
    <div class="block-image relative">
        <div class="view view-first">
            <a href="<?= Url::to(['shop/view', 'slug' => $model->slug]) ?>">
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

                <a href="<?= $model->url ?>" rel="nofollow" class="url" target="_blank" style="display: none"
                   title="Sklep Online <?= Html::encode($model->name) ?>">
                   Przejdź do strony sklepu <strong><?= Html::encode($model->name) ?></strong>
                </a>

            </li>
        </ul>
    </div>
</div>

