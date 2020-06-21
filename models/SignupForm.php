<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $rolename;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required','message' => 'Поле с логином не заполнено'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такой логин уже существвует'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required','message' => 'Поле с e-mail не заполнено'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такой e-mail уже существует'],
            [['password','password_repeat'], 'required','message' => 'Поле с паролем не заполнено'],
            [['password','password_repeat'], 'string'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'operator' => '==','message' => 'Пароли не совпадают!'],
            [['rolename'], 'required', 'message' => 'Роль не выбрана'],
            ['rolename', 'default', 'value' => 'vacant'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->role_name = $this->rolename;
        return $user->save() ? $user : null;
    }

}