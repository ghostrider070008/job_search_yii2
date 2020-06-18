<?php

namespace app\modules\admin\models;

use Yii;
use app\models\User;


/**
 * This is the model class for table "journalizations".
 *
 * @property int $id
 * @property int $id_operations
 * @property int $id_tables
 * @property int $id_users
 * @property string|null $created_at
 *
 * @property Tables $tables
 * @property User $users
 * @property Operations $operations
 */
class Journalizations extends \yii\db\ActiveRecord
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
            [['id_operations', 'id_tables', 'id_users'], 'required'],
            [['id_operations', 'id_tables', 'id_users'], 'integer'],
            [['created_at'], 'safe'],
            [['id_tables'], 'exist', 'skipOnError' => true, 'targetClass' => Tables::className(), 'targetAttribute' => ['id_tables' => 'id']],
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
            'id_tables' => 'Id Tables',
            'id_users' => 'Id Users',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Tables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTables()
    {
        return $this->hasOne(Tables::className(), ['id' => 'id_tables']);
    }

    public function getOperations()
    {
        return $this->hasOne(Operations::className(), ['id' => 'id_operations']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_users']);
    }
    public function Oparations($id_users, $id_operations, $table_id){
        $model = new Journalizations();
        $model->id_users = $id_users;
        $model->id_operations = $id_operations;
        $model->id_tables = $table_id;
        $model->created_at = gmdate("Y-m-d H:i:s");
        return $model->save();
    }
}
