<?php
use yii\widgets\ListView;

//die(var_dump($dataProvider));
?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="section-title section-title--style-1 text-center mb-4">
                    <h3 class="section-title-inner heading-2 strong-400">
                        <span><?= $tag ?></span>
                    </h3>
                    <span class="section-title-delimiter clearfix"></span>
                </div>

                <div class="fluid-paragraph fluid-paragraph-sm c-gray-light strong-300 text-center">
                    Start building fast, beautiful and modern looking websites in no time using our theme.
                </div>
            </div>
        </div>

        <div class="row">
            <hr>
        </div>


        <div class="row-wrapper">

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'itemOptions' => ['class' => 'col-lg-3 col-md-6 space-xs-md'],
    'itemView' => '../item/_item',
    'viewParams' => ['tag' => $tag],
    'options' => [
        'tag' => 'div',
        'class' => 'row cols-md-space cols-sm-space cols-xs-space',
    ],
]); ?>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="pagination-wrapper d-flex justify-content-center py-4">
        </div>
    </div>
</section>
