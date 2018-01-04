<?php

namespace app\modules\admin\models;

//use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

//use app\modules\admin\models\Type;

/**
 * TypeSearch represents the model behind the search form about `app\modules\admin\models\Type`.
 */
class TypeSearch extends Type
{
    public $author;
    public $status;
    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'slug', 'created_at', 'updated_at', 'author'], 'string'],
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
        $query = Type::find();

        $query->joinWith(['author author']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['author'] = [
            'asc' => ['author.name' => SORT_ASC],
            'desc' => ['author.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'type.name', $this->name])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['=', 'type.status', $this->status]);

        return $dataProvider;
    }
}
