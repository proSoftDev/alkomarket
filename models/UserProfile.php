<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $fio
 * @property int $gender
 * @property string $date_of_birth
 * @property string $telephone
 * @property string $address
 * @property int $index_number
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'telephone'], 'required'],
            [['user_id', 'gender', 'index_number'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['fio', 'address'], 'string', 'max' => 255],
            [['telephone'], 'string', 'max' => 20],
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
            'fio' => 'Фио',
            'gender' => 'Пол',
            'date_of_birth' => 'Дата рождения',
            'telephone' => 'Контактный телефон',
            'address' => 'Адрес ',
            'index_number' => 'Индекс',
        ];
    }

    public function getDate()
    {
        Yii::$app->formatter->locale = 'ru-RU';
        return Yii::$app->formatter->asDate($this->date_of_birth, 'long');
    }
}
