<?php

/* @var $this \yii\web\View */

/* @var $content string */

use kartik\growl\Growl;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
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
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">
<!--        <img src="http://via.placeholder.com/120x120" width="30" height="30" class="d-inline-block align-top" alt="">-->
        Bootstrap
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::home(); ?>">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['default/index']) ?>">Admin</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="<?= Url::to(['page/index']) ?>">Strony</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?= Url::to(['page/index']) ?>">Lista</a>
                    <a class="dropdown-item" href="<?= Url::to(['page/create']) ?>">Dodaj</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['shop/index']) ?>">Sklepy</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="<?= Url::to(['item/index']) ?>">Przedmioty</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?= Url::to(['item/index']) ?>">Lista</a>
                    <a class="dropdown-item" href="<?= Url::to(['item/create']) ?>">Dodaj</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['type/index']) ?>">Typy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['tag/index']) ?>">Tagi</a>
            </li>
            <li class="nav-item dropdown">
                <?php $reviews = \app\models\Review::getPendingCount() ?>
                <a class="nav-link" href="<?= Url::to(['item/index']) ?>">Recenzje <?= $reviews ? '<small>('.$reviews.')</small>' : '' ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <?php if($reviews): ?>
                        <a class="dropdown-item" href="<?= Url::to(['review/index', 'ReviewSearch[status]' => \app\models\Review::STATUS_PENDING]) ?>">Oczekujące <?= $reviews ? '<small>('.$reviews.')</small>' : '' ?></a>
                    <?php endif; ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::to(['user/index']) ?>">Użytkownicy</a>
            </li>
            <!--<li class="nav-item">
                <?php /*$reviews = \app\models\Review::getPendingCount() */?>
                <a class="nav-link" href="<?/*= Url::to(['review/index']) */?>">Recenzje <?/*= $reviews ? '<small>('.$reviews.')</small>' : '' */?>  </a>
            </li>-->


        </ul>
    </div>
</nav>

<main>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key => $message): ?>

        <?= Growl::widget([
            'type' => $key,
            'title' =>  $message[0][0],
            'body' => $message[0][1],
            'showSeparator' => true,
            'delay' => 200,
            'pluginOptions' => [
                'showProgressbar' => true,
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                    'timer' => 2000,
                ]
            ]
        ]); ?>

    <?php endforeach; ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'tag' => 'ol',
            'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
            'activeItemTemplate' => "<li class=\"breadcrumb-item active\">{link}</li>\n"
        ]) ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">© <?= Yii::$app->params['name'] ?> <?= date('Y') ?></span>
    </div>
</footer>

<?php $this->endBody() ?>

<?= $this->blocks['script'] ?>

</body>
</html>
<?php $this->endPage() ?>
