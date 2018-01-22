<?php

/* @var $this yii\web\View */

use app\components\LinkPager;
use yii\widgets\ListView;

$this->title = 'My Yii Application';
//$this->registerCssFile(Yii::$app->basePath . '/web/css/easy-autocomplete.css');
//$this->registerCssFile(Yii::$app->basePath . '/web/css/easy-autocomplete.themes.min.css');
//$this->registerJs(Yii::$app->basePath . '/web/js/jquery.easy-autocomplete.min.js');
?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">
        <div class="row-wrapper">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'itemOptions' => ['class' => 'col-lg-3 col-md-6 space-xs-md'],
                'itemView' => '_item',
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

<?php $this->beginBlock('script') ?>
<link rel="stylesheet" href="css/easy-autocomplete.min.css">
<link rel="stylesheet" href="css/easy-autocomplete.themes.min.css">
<script src="js/jquery.easy-autocomplete.min.js"></script>

<script>
    var options = {
        data: ["blue", "green", "pink", "red", "yellow"]
    };

    $("#search-input").easyAutocomplete(options);
</script>

<script>
    var pager = $('ul.pagination');
    var pagination = $('#pagination');
    $(pager).appendTo(pagination);
</script>
<?php $this->endBlock() ?>
