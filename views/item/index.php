<?php

/* @var $this yii\web\View */

use app\components\LinkPager;

use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = 'Weariology';

?>

<?php $this->beginBlock('meta') ?>
<meta property="og:url" content="<?= Yii::$app->params['url'] ?>"/>
<meta property="og:title" content="<?= $this->title ?>"/>
<meta property="og:description" content="<?= Yii::$app->params['description'] ?>"/>
<meta property="og:image" content="<?= Url::to('@web/images/seo/weariology.png', true); ?>"/>
<?php $this->endBlock() ?>

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
        url: function (phrase) {
            return "/project/web/site/json?phrase=" + encodeURIComponent(phrase);
        },
        getValue: function (element) {
            return element.name;
        },
        template: {
            type: "custom",
            method: function (title, item) {
                return '<div class="row">' +
                    '<div class="col-2">' +
                    title
                    + '</div>' +
                    '<div class="col-2">' +
                    '<a href="/project/web/tag/' + item.name + '">wyszukaj</a>'
                    + '</div>'
                    + '</div>'
            }
        },
        requestDelay: 400
    };

    $("#search-input").easyAutocomplete(options);
</script>

<!--<script>
   /* var pager = $('ul.pagination');
    var pagination = $('#pagination');
    $(pager).appendTo(pagination);*/
</script>-->
<?php $this->endBlock() ?>
