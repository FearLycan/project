<?php

/*
 * This file is part of the lowcygier-bazaar.
 *
 * Copyright (c) 2016 Lowcygier.pl <copy@lowcygier.pl>
 *
 * This source code is proprietary to Lowcygier.pl. All rights reserved.
 * Unauthorized using or copying of this file, via any medium is strictly prohibited.
 */


use app\modules\admin\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $user User */


?>

    <h2>Witaj, <?= Html::encode($user->name); ?></h2>

    <h2>Dziękujemy za zarejestrowanie się w naszym serwisie.</h2>
    <p>Aby aktywować swoje konto musisz dokończyć proces rejestracji klikając, w poniższy link:</p>
    <p>

<?= Html::a('Aktywuj', Url::to(['site/activation', 'code' => $user->verification_code], true)) ?>

<?= $this->render('_message-footer', ['optional' => true]) ?>