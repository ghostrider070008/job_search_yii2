<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name_auth_item
 * @property string|null $name
 * @property string|null $family
 * @property string|null $patronymic
 * @property string $e_mail
 * @property string|null $phone
 * @property string|null $hash_passw
 *
 * @property Companyes[] $companyes
 * @property Journalizations[] $journalizations
 * @property Messages[] $messages
 * @property Messages[] $messages0
 * @property Resumes[] $resumes
 */
class Users extends \yii\db\ActiveRecord
{
    /* Пароль*/
    public $password;
    /* Повтор пароля*/
    public $password_repeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['e_mail','name','password','name_auth_item'], 'required'],
            ['password', 'compare', 'compareAttribute' => 'password_repeat'],
            [['password'], 'safe'],
            [['name_auth_item', 'name', 'family', 'patronymic', 'e_mail', 'hash_passw'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            ['e_mail', 'email', 'message' => 'Некорректный e-mail адрес'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_auth_item' => 'Name Auth Item',
            'name' => 'Name',
            'family' => 'Family',
            'patronymic' => 'Patronymic',
            'e_mail' => 'E Mail',
            'phone' => 'Phone',
            'hash_passw' => 'Hash Passw',

        ];
    }

    /**
     * Gets query for [[Companyes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    public static function findByUsername($name)
    {
        return static::findOne(['name' => $name]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->hash_passw);
    }

    public function setPassword($password)
    {
        $this->hash_passw = Yii::$app->security->generatePasswordHash($password);
    }

    public function getCompanyes()
    {
        return $this->hasMany(Companyes::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Journalizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournalizations()
    {
        return $this->hasMany(Journalizations::className(), ['id_users' => 'id']);
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['id_users_recipient' => 'id']);
    }

    /**
     * Gets query for [[Messages0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages0()
    {
        return $this->hasMany(Messages::className(), ['id_users_sender' => 'id']);
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

    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
