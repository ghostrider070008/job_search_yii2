<?php

namespace app\models;

use Yii;
use app\modules\admin\models\Cities;
use app\modules\admin\models\Educations;
use app\modules\admin\models\Position;
use app\modules\admin\models\Schedule;
use app\modules\admin\models\Status;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property int $id_companyes
 * @property int $id_status
 * @property int $id_cities
 * @property int|null $id_positions
 * @property int|null $id_educations
 * @property int|null $salary
 * @property int|null $id_schedules
 * @property string|null $text
 * @property string|null $phone
 * @property string|null $e_mail
 * @property string|null $created_at
 *
 * @property Cities $cities
 * @property Companyes $companyes
 * @property Educations $educations
 * @property Position $positions
 * @property Schedule $schedules
 * @property Status $status
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_companyes', 'id_status', 'id_cities'], 'required'],
            [['id_companyes', 'id_status', 'id_cities', 'id_positions', 'id_educations', 'salary', 'id_schedules'], 'integer'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['phone', 'e_mail'], 'string', 'max' => 255],
            [['id_cities'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['id_cities' => 'id']],
            [['id_companyes'], 'exist', 'skipOnError' => true, 'targetClass' => Companyes::className(), 'targetAttribute' => ['id_companyes' => 'id']],
            [['id_educations'], 'exist', 'skipOnError' => true, 'targetClass' => Educations::className(), 'targetAttribute' => ['id_educations' => 'id']],
            [['id_positions'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['id_positions' => 'id']],
            [['id_schedules'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::className(), 'targetAttribute' => ['id_schedules' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['id_status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_companyes' => 'Id Companyes',
            'id_status' => 'Id Status',
            'id_cities' => 'Id Cities',
            'id_positions' => 'Id Positions',
            'id_educations' => 'Id Educations',
            'salary' => 'Salary',
            'id_schedules' => 'Id Schedules',
            'text' => 'Text',
            'phone' => 'Phone',
            'e_mail' => 'E Mail',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasOne(Cities::className(), ['id' => 'id_cities']);
    }

    /**
     * Gets query for [[Companyes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyes()
    {
        return $this->hasOne(Companyes::className(), ['id' => 'id_companyes']);
    }

    /**
     * Gets query for [[Educations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasOne(Educations::className(), ['id' => 'id_educations']);
    }

    /**
     * Gets query for [[Positions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasOne(Position::className(), ['id' => 'id_positions']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'id_schedules']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'id_status']);
    }
    public function getVacancyes(){
        return static::find()->select()
            ->from(vacancy)
            ->all();
    }

    public function activeVacancy($id_status){
        $sql = 'SELECT count(id) from vacancy where id_status=:id_status;';
        return static::findBySql($sql,[':id_status' => $id_status] )->column();
    }
}
