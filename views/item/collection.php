<?php

use app\components\LinkPager;
use yii\widgets\ListView;

?>


<section class="slice sct-color-1" id="sct_products">
    <div class="container">
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
