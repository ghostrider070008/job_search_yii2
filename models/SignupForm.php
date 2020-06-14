<?php

namespace app\models;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;

class SignupForm extends Model{

    public $e_mail;
    public $password;
    public $password_repeat;
    public $name_auth_item;
    public $name;
    public $family;
    public $patronymic;
    public $phone;
    public $created_at;
    public $updated_at;




    public function rules() {
        return [
            [['e_mail','name','password','name_auth_item'], 'required'],

            [['created_at', 'updated_at', 'password'], 'safe'],
            [['name_auth_item', 'name', 'family', 'patronymic', 'e_mail'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            ['e_mail', 'email', 'message' => 'Некорректный e-mail адрес'],
        ];
    }


    public function signup()
    {


        $user = new Users();
        $user->e_mail = $this->e_mail;
        $user->setPassword($this->password);
        $user->name_auth_item = $this->name_auth_item;
        $user->name = $this->name;
        $user->family = $this->family;
        $user->patronymic = $this->patronymic;
        $user->phone = $this->phone;
        $user->created_at = time();
        $user->updated_at = time();
        $user->save();
    }

}