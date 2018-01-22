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


<div class="body-wrap shop-default shop-sportswear">
    <div id="st-container" class="st-container">


        <div class="st-pusher">
            <div class="st-content">
                <div class="st-content-inner">
                    <!-- HEADER -->
                    <div class="header">
                        <?php if (false): ?>
                            <!-- Top Bar -->
                            <div class="top-navbar top-navbar--inverse">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <nav class="top-navbar-menu">
                                                <ul class="top-menu">
                                                    <li><a href="<?= Url::toRoute(['auth/login']); ?>">Zaloguj się</a>
                                                    </li>
                                                    <li><a href="<?= Url::toRoute(['auth/registration']); ?>">Rejestracja</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Global Search -->
                        <section id="sctGlobalSearch" class="global-search global-search-overlay">
                            <div class="container">
                                <div class="global-search-backdrop mask-dark--style-2"></div>

                                <!-- Search form -->
                                <form class="form-horizontal form-global-search z-depth-2-top" role="form">
                                    <div class="px-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" class="search-input" id="search-input"
                                                       placeholder="Type and hit enter ...">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="hidden">Submit</button>
                                    <a href="#" class="close-search" data-toggle="global-search"
                                       title="Close search bar"></a>
                                </form>
                            </div>
                        </section>

                        <!-- Navbar -->
                        <nav class="navbar navbar-expand-lg navbar--uppercase navbar-inverse bg-dark fixed-top">
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

                                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdministrator()): ?>

                                        <!-- Admin Navbar links -->
                                        <ul class="navbar-nav" data-hover="dropdown">
                                            <li class="nav-item dropdown megamenu">
                                                <?= Html::a('Admin', ['/admin'], ['class' => 'nav-link']); ?>
                                            </li>
                                        </ul>

                                    <?php endif; ?>


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

                                        <?php if (false): ?>
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
                    <footer id="footer" class="footer fixed-bottom">
                        <div class="footer-bottom py-3">
                            <div class="container">
                                <div class="row cols-xs-space col-sm-space align-items-center">
                                    <div class="col-md-7 col-12">
                                        <div class="text-xs-center text-sm-left">
                                            <ul class="footer-menu">
                                                <li>
                                                    <a href="#" style="padding-left: 0;">Home</a>
                                                </li>
                                            </ul>

                                            <div class="copyright mt-1">
                                                <ul class="copy-links">
                                                    <li>
                                                        © <?= date('Y') ?> <a href="#" target="_blank">
                                                            <strong>Web name</strong>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <?= Html::a('Regulamin', ['page/view', 'slug' => 'regulamin']) ?>
                                                    </li>
                                                    <li>
                                                        <?= Html::a('Polityka prywatności', ['page/view', 'slug' => 'polityka-prywatnosci']) ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="text-xs-center text-sm-right">
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
                                            </ul>
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
<?php $this->endBody() ?>

<?= $this->blocks['script'] ?>

</body>
</html>
<?php $this->endPage() ?>
