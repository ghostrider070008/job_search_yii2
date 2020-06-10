<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property int $id_region
 * @property string $name
 *
 * @property Regions $region
 * @property Resumes[] $resumes
 * @property Vacancy[] $vacancies
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_region', 'name'], 'required'],
            [['id_region'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_region'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['id_region' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_region' => 'Id Region',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'id_region']);
    }

    /**
     * Gets query for [[Resumes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResumes()
    {
        return $this->hasMany(Resumes::className(), ['id_citi' => 'id']);
    }

    /**
     * Gets query for [[Vacancies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['id_cities' => 'id']);
    }
}
