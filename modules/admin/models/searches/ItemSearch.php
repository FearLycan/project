<?php

namespace app\modules\admin\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Item;

/**
 * ItemSearch represents the model behind the search form about `app\modules\admin\models\Item`.
 */
class ItemSearch extends Item
{
    public $shop;
    public $author;
    public $type;
    public $status;
    public $title;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['title', 'created_at', 'updated_at', 'shop', 'author', 'type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Item::find();

        $query->joinWith(['author author']);
        $query->joinWith(['shop shop']);
        $query->joinWith(['type type']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'item.title', $this->title])
            ->andFilterWhere(['like', 'shop.name', $this->shop])
            ->andFilterWhere(['like', 'type.name', $this->type])
            ->andFilterWhere(['like', 'author.name', $this->author])
            ->andFilterWhere(['=', 'item.status', $this->status])
            ->andFilterWhere(['like', 'item.url', $this->url]);

        return $dataProvider;
    }
}
