<?php

namespace app\models;

use app\modules\admin\models\Educations;
use app\modules\admin\models\Position;
use app\modules\admin\models\Regions;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resumes;
use app\models\User;

/**
 * ResumesSearch represents the model behind the search form of `app\models\Resumes`.
 */
class ResumesSearch extends Resumes
{
    public $username;
    public $position_name;
    public $education_name;
    public $citizenship;
    public $status_name;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_position', 'salary', 'id_citi', 'id_citizenship', 'id_education', 'id_status'], 'integer'],
            [['family', 'name', 'patronomic', 'phone', 'e_mail', 'birthday', 'experience', 'education', 'personal_qualities', 'created_at', 'updated_at', 'username', 'position_name', 'education_name', 'citizenship', 'status_name'], 'safe'],
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
        $query->joinWith(['user']);
        $query->joinWith(['position']);
        $query->joinWith(['educations']);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['username'] = [
            'asc' => [User::tableName().'.username' => SORT_ASC],
            'desc' => [User::tableName().'.username' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['position_name'] = [
            'asc' => [Position::tableName().'.name' => SORT_ASC],
            'desc' => [Position::tableName().'.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['education_name'] = [
            'asc' => [Educations::tableName().'.name' => SORT_ASC],
            'desc' => [Educations::tableName().'.name' => SORT_DESC],
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
            ->andFilterWhere(['like', 'personal_qualities', $this->personal_qualities])
            ->andFilterWhere(['like', User::tableName().'.username', $this->username])
            ->andFilterWhere(['like', Position::tableName().'.name', $this->position_name])
            ->andFilterWhere(['like', Educations::tableName().'.name', $this->education_name]);

        return $dataProvider;
    }
}
