<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filial".
 *
 * @property int $id
 * @property string $name
 * @property int $latitude
 * @property int $longitude
 */
class Filial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'latitude', 'longitude'], 'required'],
            [['city_id'], 'integer'],
            [['latitude', 'longitude'],'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'city_id' => 'Город'
        ];
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public static function getList(){
        return \yii\helpers\ArrayHelper::map(Filial::find()->all(),'id','name');
    }
}
