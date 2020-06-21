<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "educations".
 *
 * @property int $id
 * @property string $name
 *
 * @property Resumes[] $resumes
 * @property Vacancy[] $vacancies
 */
class Educations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'educations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        return $this->hasMany(Resumes::className(), ['id_education' => 'id']);
    }

    /**
     * Gets query for [[Vacancies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['id_educations' => 'id']);
    }
    public function getEducation($id){
        $query = new Query();
        return $query->select('name')
            ->from('educations')
            ->where('id=:id',['id' => $id])
            ->column();
    }
}
