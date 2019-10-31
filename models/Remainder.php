<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "remainder".
 *
 * @property int $id
 * @property int $filial_id
 * @property int $product_id
 * @property int $amount
 */
class Remainder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'remainder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filial_id', 'product_id', 'amount'], 'required'],
            [['filial_id', 'product_id', 'amount'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filial_id' => 'Магазин',
            'product_id' => 'Продукт',
            'amount' => 'Количество товара',
        ];
    }


    public function getFilial()
    {
        return $this->hasOne(Filial::className(), ['id' => 'filial_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
