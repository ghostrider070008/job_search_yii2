<?php

namespace app\models;

use Yii;
use app\models\Users;
use app\models\Vacancy;

/**
 * This is the model class for table "companyes".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string|null $phone
 * @property string|null $e_mail
 * @property string|null $created_at
 *
 * @property User $user
 * @property Vacancy[] $vacancies
 */
class Companyes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companyes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['name'], 'required', 'message' => 'Пожалуйста заполните нименование компании!'],
            [['phone'], 'required', 'message' => 'Пожалуйста заполните телефон!'],
            [['e_mail'], 'required', 'message' => 'Пожалуйста заполните e-mail!'],
            ['e_mail', 'email'],
            [['created_at'], 'safe'],
            [['name', 'e_mail'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'e_mail' => 'E Mail',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Vacancies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['id_companyes' => 'id']);
    }
}
