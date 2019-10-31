<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{

    public $email;
    public $password;
    public $password_verify;

    public function rules()
    {
        return [



            [['email'], 'trim'],
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass'=>'app\models\User'],

            [['password'], 'required'],
            [['password_verify'], 'required'],
            [['password','password_verify'], 'string', 'min' => 6],
            [['password_verify'], 'compare', 'compareAttribute' => 'password'],



        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'E-mail',
            'username' => 'Username',
            'password' => 'Пароль',
            'password_verify' => 'Подтверждение пароля'
        ];
    }


    public function signUp()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->generateAuthKey();
        $user->setPassword($this->password);
        return $user->save(false) ? $user : null;
    }
}