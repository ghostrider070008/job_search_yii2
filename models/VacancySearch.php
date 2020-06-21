<?php

namespace app\models;

use app\modules\admin\models\Educations;
use app\modules\admin\models\Position;
use app\modules\admin\models\Schedule;
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

    public $company_name;
    public $position_name;
    public $education_name;
    public $schedule_name;

    public function rules()
    {
        return [
            [['id', 'id_companyes', 'id_status', 'id_cities', 'id_positions', 'id_educations', 'salary', 'id_schedules'], 'integer'],
            [['text', 'phone', 'e_mail', 'created_at', 'company_name', 'position_name', 'education_name', 'schedule_name'], 'safe'],
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
        $query->joinWith(['positions']);
        $query->joinWith(['companyes']);
        $query->joinWith(['educations']);
        $query->joinWith(['schedules']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['company_name'] = [
            'asc' => [Companyes::tableName().'.name' => SORT_ASC],
            'desc' => [Companyes::tableName().'.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['position_name'] = [
            'asc' => [Position::tableName().'.name' => SORT_ASC],
            'desc' => [Position::tableName().'.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['education_name'] = [
            'asc' => [Educations::tableName().'.name' => SORT_ASC],
            'desc' => [Educations::tableName().'.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['schedule_name'] = [
            'asc' => [Schedule::tableName().'.name' => SORT_ASC],
            'desc' => [Schedule::tableName().'.name' => SORT_DESC],
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
            ->andFilterWhere(['like', 'e_mail', $this->e_mail])
            ->andFilterWhere(['like', Companyes::tableName().'.name', $this->company_name])
            ->andFilterWhere(['like', Position::tableName().'.name', $this->position_name])
            ->andFilterWhere(['like', Educations::tableName().'.name', $this->education_name])
            ->andFilterWhere(['like', Schedule::tableName().'.name', $this->schedule_name]);

        return $dataProvider;
    }
}
