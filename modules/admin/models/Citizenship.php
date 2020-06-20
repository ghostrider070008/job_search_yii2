<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "citizenship".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Resumes[] $resumes
 */
class Citizenship extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'citizenship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Resumes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResumes()
    {
        return $this->hasMany(Resumes::className(), ['id_user' => 'id']);
    }
    public function getCitizenship($id){
        $query = new Query();
        return $query->select('name')
            ->from('citizenship')
            ->where('id=:id',['id' => $id])
            ->column();
    }
}
