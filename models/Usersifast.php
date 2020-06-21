<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usersi".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $hash_passw
 */
class Usersifast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usersi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'hash_passw'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'hash_passw' => 'Hash Passw',
        ];
    }

    public function setPassword($password)
    {
        $this->hash_passw = Yii::$app->security->generatePasswordHash($password);
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->hash_passw);
    }
}
