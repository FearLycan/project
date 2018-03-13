<?php
/**
 * Created by PhpStorm.
 * User: Damian Brończyk
 * Date: 13.03.2018
 * Time: 11:56
 */

use yii\helpers\Url;

?>

<div class="link-menu link-menu--style-3 py-4 border-bottom">
    <a href="<?= Url::to(['user/view', 'slug' => $model->slug]) ?>" <?= Yii::$app->controller->action->id != 'view' ?: 'class="active"' ?> >Profil</a>
    <a href="<?= Url::to(['user/settings']) ?>" <?= Yii::$app->controller->action->id != 'settings' ?: 'class="active"' ?> >Ustawienia</a>
</div>
