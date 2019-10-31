<?php

namespace app\models;

use yii\base\Model;

class ForgetPasswordForm extends Model
{

    public $email;

    public function rules()
    {
        return [

            [['email'], 'trim'],
            [['email'], 'required'],
            [['email'], 'email'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'E-mail',
        ];
    }


}