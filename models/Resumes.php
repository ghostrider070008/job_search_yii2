<?php

namespace app\models;

use app\modules\admin\models\Position;
use Yii;
use app\modules\admin\models\Cities;
use app\modules\admin\models\Educations;
use app\modules\admin\models\Status;
use app\modules\admin\models\Citizenship;
use yii\behaviors\TimestampBehavior;
use app\models\User;

/**
 * This is the model class for table "resumes".
 *
 * @property int $id
 * @property int $id_user
 * @property string|null $family
 * @property string|null $name
 * @property string|null $patronomic
 * @property int|null $id_position
 * @property int|null $salary
 * @property string|null $phone
 * @property string|null $e_mail
 * @property int|null $id_citi
 * @property int|null $id_citizenship
 * @property string|null $birthday
 * @property int|null $id_education
 * @property string|null $experience
 * @property string|null $education
 * @property string|null $personal_qualities
 * @property int|null $id_status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Cities $citi
 * @property Educations $education0
 * @property Status $status
 * @property Citizenship $citizenship
 * @property Users $user
 */
class Resumes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resumes';
    }


    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */


    public function rules()
    {
        return [
            [['id_user'], 'required'],
            [['id_user', 'id_position', 'salary', 'id_citi', 'id_citizenship', 'id_education', 'id_status'], 'integer'],
            [['birthday'], 'safe'],
            [['experience', 'education', 'personal_qualities'], 'string'],
            [['family', 'name', 'patronomic', 'phone', 'e_mail'], 'string', 'max' => 255],
            [['id_citi'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['id_citi' => 'id']],
            [['id_education'], 'exist', 'skipOnError' => true, 'targetClass' => Educations::className(), 'targetAttribute' => ['id_education' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['id_status' => 'id']],
            [['id_citizenship'], 'exist', 'skipOnError' => true, 'targetClass' => Citizenship::className(), 'targetAttribute' => ['id_citizenship' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['created_at', 'updated_at'], 'safe'],
            ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'family' => 'Family',
            'name' => 'Name',
            'patronomic' => 'Patronomic',
            'id_position' => 'Id Position',
            'salary' => 'Salary',
            'phone' => 'Phone',
            'e_mail' => 'E Mail',
            'id_citi' => 'Id Citi',
            'id_citizenship' => 'Id Citizenship',
            'birthday' => 'Birthday',
            'id_education' => 'Id Education',
            'experience' => 'Experience',
            'education' => 'Education',
            'personal_qualities' => 'Personal Qualities',
            'id_status' => 'Id Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Citi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCiti()
    {
        return $this->hasOne(Cities::className(), ['id' => 'id_citi']);
    }
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'id_position']);
    }

    /**
     * Gets query for [[Education0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasOne(Educations::className(), ['id' => 'id_education']);
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

    /**
     * Gets query for [[Citizenship]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCitizenship()
    {
        return $this->hasOne(Citizenship::className(), ['id' => 'id_citizenship']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
    public function getCountResume($id_status){
        $sql = 'SELECT count(id) from resumes where id_status=:id_status;';
        return static::findBySql($sql,[':id_status' => $id_status] )->column();
    }
}
