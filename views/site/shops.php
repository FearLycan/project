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

            <div class="row cols-md-space cols-sm-space cols-xs-space">
<!--                <div class="col-lg-4">-->
<!--                    <div class="block block--style-3">-->
<!--                        <div class="block-image relative">-->
<!--                            <div class="view view-first">-->
<!--                                <a href="#">-->
<!--                                    <img src="http://lorempixel.com/600/400/" class="img-fluid">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="aux-info-wrapper border-bottom">-->
<!--                            <ul class="aux-info">-->
<!--                                <li class="heading strong-400 text-center">-->
<!--                                    House-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="col-lg-4">-->
<!--                    <div class="block block--style-3">-->
<!--                        <div class="block-image relative">-->
<!--                            <div class="view view-first">-->
<!--                                <a href="#">-->
<!--                                    <img src="http://lorempixel.com/800/600/" class="img-fluid">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <span class="block-ribbon block-ribbon-fixed block-ribbon-right bg-yellow">For sale</span>-->
<!--                        </div>-->
<!---->
<!--                        <div class="aux-info-wrapper border-bottom">-->
<!--                            <ul class="aux-info">-->
<!--                                <li class="heading strong-400 text-center">-->
<!--                                    150 sqft-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->




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
