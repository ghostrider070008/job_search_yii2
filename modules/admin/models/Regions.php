<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property int $id
 * @property int $id_country
 * @property string $name
 *
 * @property Cities[] $cities
 * @property Countrys $country
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_country', 'name'], 'required'],
            [['id_country'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_country'], 'exist', 'skipOnError' => true, 'targetClass' => Countrys::className(), 'targetAttribute' => ['id_country' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_country' => 'Id Country',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(Cities::className(), ['id_region' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countrys::className(), ['id' => 'id_country']);
    }
}
