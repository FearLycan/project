<?php

use app\components\LinkPager;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Html::encode('Kolekcja dodanych przedmiotów | ' . Yii::$app->params['name']);
?>


<section class="slice sct-color-1" id="sct_products">
    <div class="container">
        <h1 class="heading">Kolekcja dodanych przedmiotów</h1>
        <span class="space-xs-md"></span>

        <div class="row-wrapper">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'itemOptions' => ['class' => 'col-lg-12 col-md-12 space-xs-md'],
                'itemView' => '_collection-item',
                'options' => [
                    'tag' => 'div',
                    'class' => 'row cols-md-space cols-sm-space cols-xs-space',
                ],
                'pager' => [
                    'class' => LinkPager::class
                ]
            ]); ?>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="pagination-wrapper d-flex justify-content-center py-4">
        </div>
    </div>
</section>
