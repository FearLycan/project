<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

$this->title = 'Sklepy';
?>

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

                    <div class="fluid-paragraph fluid-paragraph-sm c-gray-light strong-300 text-center">
                        Start building fast, beautiful and modern looking websites in no time using our theme.
                    </div>
                </div>
            </div>

            <div class="row">
                <hr>
            </div>

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'itemOptions' => ['class' => 'col-lg-4'],
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
