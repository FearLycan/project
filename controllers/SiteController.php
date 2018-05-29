<?php

namespace app\controllers;

use app\models\Item;
use app\models\Shop;
use app\models\Tag;
use Yii;
use app\components\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionJson($phrase)
    {
        $tags = Tag::find()
            ->where(['like', 'name', $phrase])
            ->andWhere(['status' => Tag::STATUS_ACTIVE])
            ->orderBy(['frequency' => SORT_DESC])
            ->limit(10)
            ->all();

        $shops = Shop::find()
            ->where(['like', 'name', $phrase])
            ->andWhere(['status' => Shop::STATUS_ACTIVE])
            ->orderBy(['name' => SORT_DESC])
            ->limit(10)
            ->all();

        $titles = Item::find()
            ->where(['like', 'title', $phrase])
            ->andWhere(['status' => Item::STATUS_ACTIVE])
            ->orderBy(['title' => SORT_DESC])
            ->limit(10)
            ->all();

        $results = [];
        if (strpos($phrase, ',') !== false) {
            //true


            $where = [];

            $phrases = explode(',', $phrase);

            foreach ($phrases as $mtag) {
                $where[] = ['like', 'name', $mtag];
            }

            $mtags = Tag::find()
                ->where(['status' => Tag::STATUS_ACTIVE])
                ->andWhere($where)
                ->limit(10)
                ->all();


            $results[] = [
                //'id' => $tag->id,
               // 'name' => implode(',', $phrases),
                //'slug' => '',
                'type' => 'multi-tag',
                'count' => count($mtags),
            ];


        }


        /* @var $tag Tag */
        foreach ($tags as $tag) {
            $results[] = [
                'id' => $tag->id,
                'name' => $tag->name,
                'slug' => '',
                'type' => 'tag',
            ];
        }

        /* @var $shop Shop */
        foreach ($shops as $shop) {
            $results[] = [
                'id' => $shop->id,
                'name' => $shop->name,
                'slug' => $shop->slug,
                'type' => 'shop',
            ];
        }

        /* @var $title Item */
        foreach ($titles as $title) {
            $results[] = [
                'id' => $title->id,
                'name' => $title->title,
                'slug' => $title->slug,
                'type' => 'item',
            ];
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $results;
    }
}
