<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery_price".
 *
 * @property int $id
 * @property string $address
 */
class DeliveryPrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address','price'], 'required'],
            [['address'], 'string', 'max' => 255],
            ['price','integer']
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
            'price' => 'Цена'
        ];
    }


}
