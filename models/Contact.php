<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $workTimeHeader
 * @property string $workTimeFooter
 * @property string $site
 * @property string $instagram
 * @property string $vk
 * @property string $facebook
 * @property string $twitter
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'email', 'phone', 'workTimeHeader', 'workTimeFooter', 'site', 'instagram', 'vk', 'facebook', 'twitter'], 'required'],
            [['site'], 'string'],
            [['address', 'email', 'phone', 'workTimeHeader', 'workTimeFooter', 'instagram', 'vk', 'facebook', 'twitter'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Адрес',
            'email' => 'Эл. почта',
            'phone' => 'Телефон',
            'workTimeHeader' => 'Время работы в шапке',
            'workTimeFooter' => 'Время работы в футере',
            'site' => 'Site',
            'instagram' => 'Ссылка на Instagram',
            'vk' => 'Ссылка на VK',
            'facebook' => 'Ссылка на Facebook',
            'twitter' => 'Ссылка на Twitter',
        ];
    }
}
