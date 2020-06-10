<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Cities;

/**
 * SearchCities represents the model behind the search form of `app\modules\admin\models\Cities`.
 */
class SearchCities extends Cities
{
    public $region;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_region'], 'integer'],
            [['name','region'], 'safe'],
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
        $query = Cities::find();
        $query->joinWith(['region']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['region'] = [
            'asc' => [Regions::tableName().'.name' => SORT_ASC],
            'desc' => [Regions::tableName().'.name' => SORT_DESC],
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
            'id_region' => $this->id_region,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', Regions::tableName().'.name', $this->region]);

        return $dataProvider;
    }
}
