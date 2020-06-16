<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resumes;

/**
 * ResumesSearch represents the model behind the search form of `app\models\Resumes`.
 */
class ResumesSearch extends Resumes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_position', 'salary', 'id_citi', 'id_citizenship', 'id_education', 'id_status'], 'integer'],
            [['family', 'name', 'patronomic', 'phone', 'e_mail', 'birthday', 'experience', 'education', 'personal_qualities', 'created_at', 'updated_at'], 'safe'],
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
        $query = Resumes::find();

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
            'id_user' => $this->id_user,
            'id_position' => $this->id_position,
            'salary' => $this->salary,
            'id_citi' => $this->id_citi,
            'id_citizenship' => $this->id_citizenship,
            'birthday' => $this->birthday,
            'id_education' => $this->id_education,
            'id_status' => $this->id_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'patronomic', $this->patronomic])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'e_mail', $this->e_mail])
            ->andFilterWhere(['like', 'experience', $this->experience])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'personal_qualities', $this->personal_qualities]);

        return $dataProvider;
    }
}
