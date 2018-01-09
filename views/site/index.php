<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

$this->title = 'My Yii Application';
?>

<!--<section class="slice sct-color-1">
   <div class="container">
       <div class="site-index">

           <div class="jumbotron">
               <h1>Congratulations!</h1>

               <p class="lead">You have successfully created your Yii-powered application.</p>

               <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
           </div>

           <div class="body-content">

               <div class="row">
                   <div class="col-lg-4">
                       <h2>Heading</h2>

                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                           dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                           ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                           fugiat nulla pariatur.</p>

                       <p><a class="btn btn-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                   </div>
                   <div class="col-lg-4">
                       <h2>Heading</h2>

                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                           dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                           ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                           fugiat nulla pariatur.</p>

                       <p><a class="btn btn-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
                   </div>
                   <div class="col-lg-4">
                       <h2>Heading</h2>

                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                           dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                           ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                           fugiat nulla pariatur.</p>

                       <p><a class="btn btn-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
                   </div>
               </div>

           </div>
       </div>
   </div>
</section>-->


<section class="slice sct-color-1" id="sct_products">
    <div class="container">
        <div class="row-wrapper">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'itemOptions' => ['class' => 'col-lg-3 col-md-6'],
                'itemView' => '_item',
                'options' => [
                    'tag' => 'div',
                    'class' => 'row cols-md-space cols-sm-space cols-xs-space',
                ],
                'pager' => [
                    'firstPageLabel' => '«',
                    'lastPageLabel' => '»',
                    'prevPageLabel' => false,
                    'nextPageLabel' => false,
                    'maxButtonCount' => 3,

                    // Customzing options for pager container tag
                    'options' => [
                        'tag' => 'ul',
                        'class' => 'pagination pagination--style-3',
                        'id' => 'pager',
                    ],

                    // Customzing CSS class for pager link
                    'linkOptions' => ['class' => 'page-link'],
                    'activePageCssClass' => 'active',
                    'disabledPageCssClass' => 'disabled',

                    // Customzing CSS class for navigating link
                    'prevPageCssClass' => 'pre',
                    'nextPageCssClass' => 'next',
                    'firstPageCssClass' => 'first',
                    'lastPageCssClass' => 'last',
                ],
            ]); ?>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="pagination-wrapper d-flex justify-content-center py-4">
        </div>
    </div>
</section>
