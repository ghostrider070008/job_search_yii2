<?php

namespace app\modules\admin\models;

use Yii;
use app\models\Vacancy;
use yii\db\Query;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string $name
 *
 * @property Vacancy[] $vacancies
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
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
     * Gets query for [[Vacancies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['id_positions' => 'id']);
    }
    public function getPosition($position_id){

        $query = new Query();
        return $query->select('name')
            ->from('position')
            ->where('id=:position_id',['position_id' => $position_id])
            ->column();
    }
}
