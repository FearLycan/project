<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <section class="slice-sm sct-color-1">
        <div class="profile">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-4">
                        <div class="sidebar sidebar--style-2 no-border stickyfill">
                            <div class="widget">
                                <!-- Profile picture -->
                                <div class="profile-picture profile-picture--style-2">
                                    <img src="/project/web/images/avatar/noavatar.jpg" class="img-center">
                                    <a href="#" class="btn-aux">
                                        <i class="ion ion-edit"></i>
                                    </a>
                                </div>

                                <!-- Profile details -->
                                <div class="profile-details">
                                    <h2 class="heading heading-4 strong-500 profile-name">Elisabeth Alanna</h2>
                                    <h3 class="heading heading-6 strong-400 profile-occupation mt-3">Founder, Web
                                        Developer</h3>
                                    <h3 class="heading heading-light heading-6 strong-400 profile-location">Bucharest,
                                        Romania</h3>
                                </div>

                                <!-- Profile connect -->
                                <div class="profile-connect mt-4">
                                    <a href="#" class="btn btn-styled btn-block btn-rounded btn-base-1">Follow</a>
                                    <a href="#" class="btn btn-styled btn-block btn-rounded btn-base-2">Send message</a>
                                </div>

                                <!-- Profile stats -->
                                <div class="profile-stats clearfix">
                                    <div class="stats-entry">
                                        <span class="stats-count">180</span>
                                        <span class="stats-label text-uppercase">Projects</span>
                                    </div>
                                    <div class="stats-entry">
                                        <span class="stats-count">1.3K</span>
                                        <span class="stats-label text-uppercase">Followers</span>
                                    </div>
                                </div>

                                <!-- Profile connected accounts -->
                                <div class="profile-useful-links clearfix">
                                    <div class="useful-links">
                                        <a href="#" class="link link--style-1">
                                            <i class="icon ion-social-instagram-outline"></i>
                                            instagram.com/webpixels_io
                                        </a>
                                        <a href="#" class="link link--style-1">
                                            <i class="icon ion-social-dribbble"></i>
                                            dribbble.com/webpixels
                                        </a>

                                        <a href="#" class="link link--style-1">
                                            <i class="icon ion-earth"></i>
                                            webpixels.io
                                        </a>
                                    </div>
                                </div>

                                <div class="profile-useful-links clearfix">
                                    <div class="useful-links">
                                        <a href="#" class="link link--style-1">
                                            <i class="icon ion-code-download"></i>
                                            Export page as PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="main-content">
                            <!-- Page title -->
                            <div class="page-title">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12">
                                        <h2 class="heading heading-6 strong-600 mb-0 text-capitalize strong-500 mb-0">
                                            <a href="#" class="link text-underline--none">
                                                <?= Html::encode($model->name) ?>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="col-lg-6 col-12">

                                    </div>
                                </div>
                            </div>

                            <div class="link-menu link-menu--style-3 py-4 border-bottom">
                                <a href="../../pages/profile/account-settings.html">Settings</a>
                                <a href="../../pages/profile/account-orders.html">Orders</a>
                                <a href="../../pages/profile/account-cards.html">Cards</a>
                                <a href="../../pages/profile/account-security.html">Security</a>
                                <a href="../../pages/profile/account-connections.html" class="active">Connections</a>
                            </div>

                            <!-- Order history table -->
                            <div class="widget mt-4">
                                <div class="row-wrapper">
                                    <div class="row cols-md-space cols-sm-space cols-xs-space">
                                        <div class="col-lg-4">
                                            <div class="block block--style-3">
                                                <div class="profile-picture profile-picture--style-2">
                                                    <img src="/project/web/images/avatar/noavatar.jpg">
                                                </div>

                                                <div class="block-body text-center">
                                                    <h3 class="heading heading-6 strong-600 mb-0 mb-0">Desiree
                                                        Jinny</h3>
                                                    <h3 class="heading heading-light heading-sm strong-300">CEO of
                                                        Webpixels</h3>

                                                    <a href="#" class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                </div>
                                                <div class="aux-info-wrapper border-top">
                                                    <ul class="aux-info">
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">10k</span>
                                                            Followers
                                                        </li>
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">5k</span>
                                                            Following
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="block block--style-3">
                                                <div class="profile-picture profile-picture--style-2">
                                                    <img src="/project/web/images/avatar/noavatar.jpg">
                                                </div>

                                                <div class="block-body text-center">
                                                    <h3 class="heading heading-6 strong-600 mb-0">David Wally</h3>
                                                    <h3 class="heading heading-light heading-sm strong-300">Manager at
                                                        Microsoft</h3>

                                                    <a href="#" class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                </div>

                                                <div class="aux-info-wrapper border-top">
                                                    <ul class="aux-info">
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">10k</span>
                                                            Followers
                                                        </li>
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">5k</span>
                                                            Following
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="block block--style-3">
                                                <div class="profile-picture profile-picture--style-2">
                                                    <img src="/project/web/images/avatar/noavatar.jpg">
                                                </div>

                                                <div class="block-body text-center">
                                                    <h3 class="heading heading-6 strong-600 mb-0">Cliff Simon</h3>
                                                    <h3 class="heading heading-light heading-sm strong-300">CEO of
                                                        Webpixels</h3>

                                                    <a href="#" class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                </div>

                                                <div class="aux-info-wrapper border-top">
                                                    <ul class="aux-info">
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">10k</span>
                                                            Followers
                                                        </li>
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">5k</span>
                                                            Following
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="block block--style-3">
                                                <div class="profile-picture profile-picture--style-2">
                                                    <img src="/project/web/images/avatar/noavatar.jpg">
                                                </div>

                                                <div class="block-body text-center">
                                                    <h3 class="heading heading-6 strong-600 mb-0">Elisabeth Alanna</h3>
                                                    <h3 class="heading heading-light heading-sm strong-300">Founder of
                                                        Starbucks</h3>

                                                    <a href="#" class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                </div>

                                                <div class="aux-info-wrapper border-top">
                                                    <ul class="aux-info">
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">10k</span>
                                                            Followers
                                                        </li>
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">5k</span>
                                                            Following
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="block block--style-3">
                                                <div class="profile-picture profile-picture--style-2">
                                                    <img src="/project/web/images/avatar/noavatar.jpg">
                                                </div>

                                                <div class="block-body text-center">
                                                    <h3 class="heading heading-6 strong-600 mb-0">Cliff Simon</h3>
                                                    <h3 class="heading heading-light heading-sm strong-300">Founder of
                                                        Starbucks</h3>

                                                    <a href="#" class="btn btn-base-1 btn-shadow btn-circle px-4 mt-2">Follow</a>
                                                </div>

                                                <div class="aux-info-wrapper border-top">
                                                    <ul class="aux-info">
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">10k</span>
                                                            Followers
                                                        </li>
                                                        <li class="heading strong-400 text-center">
                                                            <span class="d-block strong-600">5k</span>
                                                            Following
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
