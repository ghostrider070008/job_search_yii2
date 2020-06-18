<?php

namespace app\modules\admin\models;

use app\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Journalizations;

/**
 * JournalizationsSearch represents the model behind the search form of `app\modules\admin\models\Journalizations`.
 */
class JournalizationsSearch extends Journalizations
{
    /**
     * {@inheritdoc}
     */
    public $user;
    public $tables;
    public $operations;
    public function rules()
    {
        return [
            [['id', 'id_operations', 'id_tables', 'id_users'], 'integer'],
            [['created_at','user','tables', 'operations'], 'safe'],
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
        $query = Journalizations::find();
        $query->joinWith(['user']);
        $query->joinWith(['tables']);
        $query->joinWith(['operations']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['user'] = [
            'asc' => [User::tableName().'.username' => SORT_ASC],
            'desc' => [User::tableName().'.username' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['tables'] = [
            'asc' => [Tables::tableName().'.name' => SORT_ASC],
            'desc' => [Tables::tableName().'.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['operations'] = [
            'asc' => [Operations::tableName().'.title' => SORT_ASC],
            'desc' => [Operations::tableName().'.title' => SORT_DESC],
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
            'id_operations' => $this->id_operations,
            'id_tables' => $this->id_tables,
            'id_users' => $this->id_users,
            'created_at' => $this->created_at,
        ])
            ->andFilterWhere(['like', User::tableName().'.name', $this->user])
            ->andFilterWhere(['like', Tables::tableName().'.name', $this->tables])
            ->andFilterWhere(['like', Operations::tableName().'.title', $this->operations]);

        return $dataProvider;
    }
}
