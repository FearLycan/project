<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Html::encode('Lista sklepów | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta') ?>
<?php $this->endBlock() ?>

<section class="slice sct-color-1">
    <div class="container">
        <div class="site-shops">

            <div class="row">
                <div class="col">
                    <div class="section-title section-title--style-1 text-center mb-4">
                        <h3 class="section-title-inner heading-2 strong-400">
                            <span>Lista sklepów</span>
                        </h3>
                        <span class="section-title-delimiter clearfix"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <hr>
            </div>

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'itemOptions' => ['class' => 'col-lg-4 space-xs-md'],
                'itemView' => '_shop',
                'options' => [
                    'tag' => 'div',
                    'class' => 'row cols-md-space cols-sm-space cols-xs-space',
                ],
            ]); ?>

        </div>
    </div>
</section>

<?php $this->beginBlock('script') ?>
<script>
    console.log('ok');

    $(document).ready(function(){
        $("li.heading").hover(function(){
            $(this).find('span.name').css('display', 'none');
            $(this).find('a.url').css('display', 'block');
        }, function(){
            $(this).find('span.name').css('display', 'block');
            $(this).find('a.url').css('display', 'none');
        });
    });
</script>
<?php $this->endBlock() ?>
