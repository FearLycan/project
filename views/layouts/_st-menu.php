<?php
 use app\components\Helpers;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<nav class="st-menu st-effect-1" id="menu-1">
    <div class="st-profile">
        <div class="st-profile-user-wrapper">
            <div class="profile-user-image">
                <?= Html::img('@web/images/avatar/' . Yii::$app->user->identity->avatar, ['class' => 'img-circle']) ?>
            </div>
            <div class="profile-user-info">
                <span class="profile-user-name"><?= Yii::$app->user->identity->name ?></span>
                <span class="profile-user-email">
                            <?= Helpers::cutThis(Yii::$app->user->identity->email, 26) ?></span>
            </div>
        </div>
    </div>

    <div class="st-menu-list mt-2">
        <ul>
            <li>
                <a href="<?= Url::to(['item/create']); ?>">
                    <i class="ion-ios-plus-outline"></i> Dodaj nowe
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['item/collection']); ?>">
                    <i class="ion-tshirt-outline"></i> Moja kolekcja
                </a>
            </li>
            <!--<li>
                <a href="<?/*= Url::to(['user/favorite']); */?>">
                    <i class="ion-ios-star-outline"></i> Ulubione
                </a>
            </li>-->
        </ul>
    </div>

    <h3 class="st-menu-title">Konto</h3>
    <div class="st-menu-list">
        <ul>
            <li>
                <a href="<?= Url::to(['user/view', 'slug' => Yii::$app->user->identity->slug]); ?>">
                    <i class="ion-ios-person-outline"></i> Profil
                </a>
            </li>
            <!--<li>
                <a href="<?/*= Url::to(['message/index']); */?>">
                    <i class="ion-ios-person-outline"></i> Wiadomośći
                </a>
            </li>
            <li>
                <a href="<?/*= Url::to(['user/fallowers', 'slug' => Yii::$app->user->identity->slug]); */?>">
                    <i class="ion-ios-people-outline"></i> Obserwowani
                </a>
            </li>
            <li>
                <a href="<?/*= Url::to(['user/password']); */?>">
                    <i class="ion-ios-unlocked-outline"></i> Password update
                </a>
            </li>-->
            <li>
                <a href="<?= Url::to(['user/settings']); ?>">
                    <i class="ion-ios-gear-outline"></i> Ustawienia
                </a>
            </li>

            <li>
                <a href="<?= Url::to(['auth/logout']); ?>" data-method="post">
                    <i class="ion-log-out"></i> Wyloguj się
                </a>
            </li>
        </ul>
    </div>

    <h3 class="st-menu-title">Support</h3>
    <div class="st-menu-list">
        <ul>
            <li>
                <a href="<?= Url::to(['page/view', 'slug' => 'regulamin']) ?>">
                    <i class="ion-ios-paper-outline"></i> Regulamin
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['page/view', 'slug' => 'polityka-prywatnosci']) ?>">
                    <i class="ion-ios-book-outline"></i> Polityka prywatności
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['site/contact']) ?>">
                    <i class="ion-ios-email-outline"></i> Kontakt
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['site/about']) ?>">
                    <i class="ion-ios-information-outline"></i> <?= Yii::$app->params['name'] ?>
                </a>
            </li>
        </ul>
    </div>
</nav>