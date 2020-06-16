<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vacancy;

/**
 * VacancySearch represents the model behind the search form of `app\models\Vacancy`.
 */
class VacancySearch extends Vacancy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_companyes', 'id_status', 'id_cities', 'id_positions', 'id_educations', 'salary', 'id_schedules'], 'integer'],
            [['text', 'phone', 'e_mail', 'created_at'], 'safe'],
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
        $query = Vacancy::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_companyes' => $this->id_companyes,
            'id_status' => $this->id_status,
            'id_cities' => $this->id_cities,
            'id_positions' => $this->id_positions,
            'id_educations' => $this->id_educations,
            'salary' => $this->salary,
            'id_schedules' => $this->id_schedules,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'e_mail', $this->e-mail]);

        return $dataProvider;
    }
}
