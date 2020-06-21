<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Regions;

/**
 * RegionsSearch represents the model behind the search form of `app\modules\admin\models\Regions`.
 */
class RegionsSearch extends Regions
{
    public $country;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_country'], 'integer'],
            [['name', 'country'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Regions::find();
        $query->joinWith(['country']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['country'] = [
            'asc' => [Countrys::tableName().'.name' => SORT_ASC],
            'desc' => [Countrys::tableName().'.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_country' => $this->id_country,
        ])

        ->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like', Countrys::tableName().'.name', $this->country]);

        return $dataProvider;
    }
}
