<?php
/* @var $this yii\web\View */

/* @var $item app\models\Item */

use app\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Html::encode('Dodaj recenzję | ' . $item->title . ' | ' . Yii::$app->params['name']);
?>

<?php $this->beginBlock('meta'); ?>
<?php $this->endBlock(); ?>

<section class="slice sct-color-1" id="sct_products">
    <div class="container">

        <h1 class="heading">Dodaj recenzję produktu</h1>
       <!-- <span class="space-xs-md"></span>-->

        <div class="row">
            <div class="col-12">
                <hr>
            </div>

            <div class="col-3">
                <?= Html::img('@web/images/item/'.$item->image,['class' => 'img-fluid']) ?>
            </div>

            <div class="col-9 ml-lg-auto">
                <div class="product-description-wrapper">
                    <!-- Product title -->
                    <h2 class="heading heading-4 strong-600 text-capitalize">
                        <?= Html::encode($item->title) ?>
                    </h2>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-default">

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <?= Html::a('<i class="icon ion-bag"></i> Idź do sklepu', $item->url, ['class' => 'btn btn-lg btn-block btn-gray-dark btn-icon-left', 'target' => '_blank']) ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <span class="space-xs-md"></span>

                    <!-- Product description -->
                    <div class="product-short-text">
                        <p>
                            <?= Html::encode($item->description) ?>
                        </p>

                        <ul class="icons mt-4">
                            <li class="text-sm">
                                <i class="ion-briefcase icon" aria-hidden="true"></i>
                                <strong>Sklep:</strong> <a href="<?= Url::to(['shop/view', 'slug' => $item->shop->slug]) ?>"><?= Html::encode($item->shop->name) ?></a>
                            </li>
                            <li class="text-sm">
                                <?php if ($item->gender == Item::GENDER_MALE): ?>
                                    <i class="ion-man icon" aria-hidden="true"></i>
                                    <strong>Rodzaj:</strong> <?= $item->getGenderName() ?>
                                <?php elseif ($item->gender == Item::GENDER_FEMALE): ?>
                                    <i class="ion-woman icon" aria-hidden="true"></i>
                                    <strong>Rodzaj:</strong> <?= $item->getGenderName() ?>
                                <?php elseif ($item->gender == Item::GENDER_KID): ?>
                                    <i class="fa fa-child" aria-hidden="true"></i>
                                    <strong>Rodzaj:</strong> <?= $item->getGenderName() ?>
                                <?php endif; ?>
                            </li>
                            <li class="text-sm">
                                <i class="icon ion-tshirt"></i>
                                <strong>Typ:</strong> <?= Html::encode($item->type->name) ?>
                            </li>
                        </ul>

                        <ul class="inline-links inline-links--style-1 mt-4 space-xs-md col-lg-12">

                            <?php foreach ($item->tags as $tag): ?>
                                <li>
                                    <a href="<?= Url::to(['tag/view', 'name' => $tag->name]) ?>">
                                        <span class="badge badge-md badge-dark"><?= Html::encode($tag->name) ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>

                    </div>

                    <!--<span class="space-xs-md"></span>

                    <div class="product-short-text">
                        <p>
                            Dodane przez:
                            <?/*= Html::a($item->author->name, ['user/view', 'slug' => $item->author->slug]) */?>
                        </p>
                    </div>-->
                </div>
            </div>



            <div class="col-12">
                <hr>
            </div>
        </div>


        <div class="row-wrapper">
            <?= $this->render('forms/_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</section>

<?php $this->beginBlock('script'); ?>
<?php $this->endBlock(); ?>