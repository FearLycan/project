<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\components\Helpers;
use kartik\growl\Growl;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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
    <meta name="keywords" content="<?= Yii::$app->params['keywords'] ?>" />
    <meta property="fb:pages" content="239323143282506" />
    <meta property="fb:app_id" content="202080437098127" />
    <meta property="og:locale" content="pl_PL" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= Yii::$app->params['name'] ?>" />
    <?= $this->blocks['meta'] ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/icon/favicon.ico" type="image/x-icon" />

    <style>.async-hide { opacity: 0 !important} </style>
    <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
            h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
            (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
        })(window,document.documentElement,'async-hide','dataLayer',4000,
            {'GTM-W4XCHGQ':true});</script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84680217-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-84680217-3');
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-84680217-3', 'auto');
        ga('require', 'GTM-W4XCHGQ');
        ga('send', 'pageview');
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">

</head>
<body>
<?php $this->beginBody() ?>


<div class="body-wrap shop-default shop-sportswear">
    <div id="st-container" class="st-container st-effect-1">

        <?php if (!Yii::$app->user->isGuest): ?>
            <?= $this->render('_st-menu') ?>
        <?php endif; ?>

        <div class="st-pusher">
            <div class="st-content">
                <div class="st-content-inner">
                    <!-- HEADER -->
                    <div class="header">
                        <!-- Global Search -->
                        <section id="sctGlobalSearch" class="global-search global-search-overlay">
                            <div class="container">
                                <div class="global-search-backdrop mask-dark--style-2"></div>

                                <!-- Search form -->
                                <form class="form-horizontal form-global-search z-depth-2-top" role="form"
                                      action="<?= Url::home() ?>" method="get">
                                    <div class="px-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="text" class="search-input" name="title" id="search-input"
                                                       placeholder="Type and hit enter ...">
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <button type="submit" class="hidden">Submit</button>-->
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
                                    <img style="height: 70px;" src="<?= Url::to('@web/images/site/logo.png') ?>" alt="<?= Yii::$app->params['name'] ?>">
                                    <?= Yii::$app->params['name'] ?>
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
                                        <form class="" role="form" action="<?= Url::home(); ?>" method="get">
                                            <div class="input-group input-group-lg">
                                                <input class="form-control" name="ItemSearch[title]"
                                                       placeholder="Search for..." type="text">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-base-3" type="button">Go!</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>

                                    <?php if (Yii::$app->user->isGuest): ?>
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown megamenu">
                                                <?= Html::a('Zaloguj się', ['auth/login'], ['class' => 'nav-link']); ?>
                                            </li>
                                            <li class="nav-item dropdown megamenu">
                                                <?= Html::a('Rejestracja', ['auth/registration'], ['class' => 'nav-link']); ?>
                                            </li>
                                        </ul>
                                    <?php else: ?>
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown megamenu">
                                                <?= Html::a('Dodaj', ['item/create'], ['class' => 'nav-link']); ?>
                                            </li>
                                        </ul>
                                    <?php endif; ?>

                                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdministrator()): ?>

                                        <!-- Admin Navbar links -->
                                        <ul class="navbar-nav" data-hover="dropdown">
                                            <li class="nav-item dropdown megamenu">
                                                <?= Html::a('Admin', ['/admin'], ['class' => 'nav-link']); ?>
                                            </li>
                                        </ul>

                                    <?php endif; ?>

                                    <!-- Admin Navbar links -->
                                    <ul class="navbar-nav" data-hover="dropdown">
                                        <li class="nav-item dropdown megamenu">
                                            <?= Html::a('Sklepy', ['/shop'], ['class' => 'nav-link']); ?>
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
                                                <a href="<?= Url::to(['user/view', 'slug' => Yii::$app->user->identity->slug]); ?>"
                                                   class="nav-link hidden-md-down">
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

                    <?php foreach (Yii::$app->session->getAllFlashes() as $key => $message): ?>

                    <?= Growl::widget([
                            'type' => $key,
                            'title' =>  $message[0][0],
                            'body' => $message[0][1],
                            'showSeparator' => true,
                            'delay' => 200,
                            'pluginOptions' => [
                                'placement' => [
                                    'from' => 'top',
                                    'align' => 'right',
                                    'timer' => 2000,
                                ]
                            ]
                        ]); ?>

                    <?php endforeach; ?>

                    <div class="page-content">
                        <?= $content ?>
                    </div>

                    <!-- FOOTER -->
                    <footer id="footer" class="footer">
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
                                                        © <?= date('Y') ?> <a href="<?= Url::home(true) ?>">
                                                            <strong> <?= Yii::$app->params['name'] ?> </strong>
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
                                                    <a href="#" class="facebook" target="_blank">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="instagram" target="_blank">
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

<script type="text/javascript" id="cookieinfo"
        src="//cookieinfoscript.com/js/cookieinfo.min.js" data-message="Używamy plików cookie w celach statystycznych, reklamowych oraz funkcjonalnych." data-linkmsg="Czytaj więcej" data-moreinfo="https://policies.google.com/technologies/cookies" data-bg="#645862" data-fg="#FFFFFF" data-link="#F1D600" data-text-align="left" data-close-text="Got it!">
</script>

</body>
</html>
<?php $this->endPage() ?>
