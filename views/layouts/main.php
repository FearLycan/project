<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Favicon -->
    <!--    <link href="favicon.png" rel="icon" type="image/png">-->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

</head>
<body>
<?php $this->beginBody() ?>


<div class="body-wrap">
    <div id="st-container" class="st-container">
        <?php if (!Yii::$app->user->isGuest): ?>
            <nav class="st-menu st-effect-1" id="menu-1">
                <div class="st-profile">
                    <div class="st-profile-user-wrapper">
                        <div class="profile-user-image">
                            <img src="http://via.placeholder.com/56x56" class="img-circle">
                        </div>
                        <div class="profile-user-info">
                            <span class="profile-user-name">Bertram Ozzie</span>
                            <span class="profile-user-email">username@example.com</span>
                        </div>
                    </div>
                </div>

                <div class="st-menu-list mt-2">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="ion-ios-bookmarks-outline"></i> Theme documentation
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-ios-cart-outline"></i> Purchase Tribus
                            </a>
                        </li>
                    </ul>
                </div>

                <h3 class="st-menu-title">Account</h3>
                <div class="st-menu-list">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="ion-ios-person-outline"></i> User profile
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-ios-location-outline"></i> My addresses
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-card"></i> My cards
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-ios-unlocked-outline"></i> Password update
                            </a>
                        </li>
                    </ul>
                </div>

                <h3 class="st-menu-title">Support center</h3>
                <div class="st-menu-list">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="ion-ios-information-outline"></i> About Tribus
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-ios-email-outline"></i> Contact &amp; support
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-camera"></i> Getting started
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>

        <div class="st-pusher">
            <div class="st-content">
                <div class="st-content-inner">
                    <!-- HEADER -->
                    <div class="header">
                        <!-- Top Bar -->
                        <div class="top-navbar top-navbar--inverse">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
            	<span class="aux-text d-none d-md-inline-block">
                    <ul class="inline-links inline-links--style-1">
<!--                        <li class="d-none d-lg-inline-block">...</li>-->
                        <!--                        <li>-->
                        <!--                            <i class="fa fa-envelope"></i>-->
                        <!--                            <a href="#">support@webpixels.io</a>-->
                        <!--                        </li>-->
                    </ul>
                </span>
                                    </div>

                                    <?php if (Yii::$app->user->isGuest): ?>
                                        <div class="col-md-6">
                                            <nav class="top-navbar-menu">
                                                <ul class="top-menu">
                                                    <li><a href="<?= Url::toRoute(['site/login']); ?>">Zaloguj się</a></li>
                                                    <li><a href="<?= Url::toRoute(['site/registration']); ?>">Rejestracja</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <!-- Global Search -->
                        <section id="sctGlobalSearch" class="global-search global-search-overlay">
                            <div class="container">
                                <div class="global-search-backdrop mask-dark--style-2"></div>

                                <!-- Search form -->
                                <form class="form-horizontal form-global-search z-depth-2-top" role="form">
                                    <div class="px-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <input class="search-input" placeholder="Type and hit enter ..."
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="close-search" data-toggle="global-search"
                                       title="Close search bar"></a>
                                </form>
                            </div>
                        </section>

                        <!-- Navbar -->
                        <nav class="navbar navbar-expand-lg navbar--uppercase navbar-inverse bg-dark">
                            <div class="container navbar-container">
                                <!-- Brand/Logo -->
                                <a class="navbar-brand" href="<?= Url::home(); ?>">
                                    <img src="#" alt="Boomerang">
                                </a>

                                <div class="d-inline-block">
                                    <!-- Navbar toggler  -->
                                    <button class="navbar-toggler hamburger hamburger-js hamburger--spring"
                                            type="button" data-toggle="collapse" data-target="#navbar_main"
                                            aria-controls="navbarsExampleDefault" aria-expanded="false"
                                            aria-label="Toggle navigation">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                                    </button>
                                </div>

                                <div class="collapse navbar-collapse align-items-center justify-content-end"
                                     id="navbar_main">
                                    <!-- Navbar search - For small resolutions -->
                                    <div class="navbar-search-widget b-xs-bottom py-3 d-lg-none d-xl-none">
                                        <form class="" role="form">
                                            <div class="input-group input-group-lg">
                                                <input class="form-control" placeholder="Search for..." type="text">
                                                <span class="input-group-btn">
                <button class="btn btn-base-3" type="button">Go!</button>
                </span>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Navbar links -->
                                    <ul class="navbar-nav" data-hover="dropdown">
                                        <li class="nav-item dropdown megamenu">
                                            <a class="nav-link" href="#">
                                                Strona główna
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link">
                                                Sklepy
                                            </a>
                                        </li>
                                    </ul>


                                </div>

                                <div class="pl-4 d-none d-lg-inline-block">
                                    <ul class="navbar-nav ml-auto" data-hover="dropdown">
                                        <!-- Search button -->
                                        <li class="nav-item nav-item-icon hidden-md-down" data-toggle="global-search">
                                            <a href="#" class="nav-link">
                                                <span>
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <?php if (!Yii::$app->user->isGuest): ?>
                                            <!-- Profile -->
                                            <li class="nav-item nav-item-icon">
                                                <a href="#" class="nav-link hidden-md-down" data-toggle="dropdown">
                                                    <i class="fa fa-user"></i>
                                                </a>
                                            </li>

                                            <!-- Slidebar -->
                                            <li class="nav-item nav-item-icon hidden-md-down">
                                                <a href="#" class="nav-link btn-st-trigger" data-effect="st-effect-1">
                                                    <span><i class="fa fa-bars"></i></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>


                                </div>
                            </div>
                        </nav>
                    </div>

                    <div class="page-content">
                        <?= $content ?>
                    </div>

                    <!-- FOOTER -->
                    <footer id="footer" class="footer">
                        <div class="footer-top">
                            <div class="container">
                                <div class="row cols-xs-space cols-sm-space cols-md-space">
                                    <div class="col-lg-5">
                                        <div class="col">
                                            <img src="#">
                                            <span class="clearfix"></span>
                                            <span class="heading heading-sm c-gray-light strong-400">One template. Infinite solutions.</span>
                                            <p class="mt-3">
                                                All the components included in Boomerang are built to the same level of
                                                quality as Bootstrap and highlighted with several example pages.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="col">
                                            <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                                                Support
                                            </h4>

                                            <ul class="footer-links">
                                                <li><a href="#" title="Help center">Help center</a></li>
                                                <li><a href="#" title="Discussions">Discussions</a></li>
                                                <li><a href="#" title="Contact support">Contact</a></li>
                                                <li><a href="#" title="Blog">Blog</a></li>
                                                <li><a href="#" title="Jobs">FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="col">
                                            <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                                                Company
                                            </h4>

                                            <ul class="footer-links">
                                                <li>
                                                    <a href="#" title="Home">
                                                        Home
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="About us">
                                                        About us
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Services">
                                                        Services
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Blog">
                                                        Blog
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Contact">
                                                        Contact
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="col">
                                            <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                                                Get in touch
                                            </h4>

                                            <ul class="social-media social-media--style-1-v4">
                                                <li>
                                                    <a href="#" class="facebook" target="_blank" data-toggle="tooltip"
                                                       data-original-title="Facebook">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="instagram" target="_blank" data-toggle="tooltip"
                                                       data-original-title="Instagram">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dribbble" target="_blank" data-toggle="tooltip"
                                                       data-original-title="Dribbble">
                                                        <i class="fa fa-dribbble"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dribbble" target="_blank" data-toggle="tooltip"
                                                       data-original-title="Github">
                                                        <i class="fa fa-github"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer-bottom">
                            <div class="container container-sm">
                                <div class="row">
                                    <div class="col">
                                        <div class="copyright text-center">
                                            Copyright © <?= date('Y') ?> <a href="#" target="_blank">
                                                <strong>Web name</strong>
                                            </a> - All rights reserved
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div><!-- END: st-pusher -->
    </div>
</div>

<!-- Back to top button -->
<a href="#" class="back-to-top btn-back-to-top"></a>

<?php //echo Alert::widget() ?>
<?php //echo $content ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
