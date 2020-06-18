<?php

namespace app\modules\admin\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "journalizations".
 *
 * @property int $id
 * @property int $id_operations
 * @property int $id_users
 * @property string|null $created_at
 *
 * @property Operations $operations
 * @property User $users
 */
class Journalizations1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journalizations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_operations', 'id_users'], 'required'],
            [['id_operations', 'id_users'], 'integer'],
            [['created_at'], 'safe'],
            [['id_operations'], 'exist', 'skipOnError' => true, 'targetClass' => Operations::className(), 'targetAttribute' => ['id_operations' => 'id']],
            [['id_users'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_users' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_operations' => 'Id Operations',
            'id_users' => 'Id Users',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Operations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperations()
    {
        return $this->hasOne(Operations::className(), ['id' => 'id_operations']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'id_users']);
    }

    public function Oparations($id_users, $id_operations){
        $model = new Journalizations1();
        $model->id_users = $id_users;
        $model->id_operations = $id_operations;
        $model->created_at = gmdate("Y-m-d H:i:s");
        return $model->save();
    }

}
