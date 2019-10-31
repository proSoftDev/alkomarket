<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prices".
 *
 * @property int $id
 * @property int $filial_id
 * @property int $product_id
 * @property int $price
 * @property int $newPrice
 * @property int $percent
 * @property int $isDiscount
 */
class Prices extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filial_id', 'product_id', 'price', 'isDiscount'], 'required'],
            [['filial_id', 'product_id', 'price', 'newPrice', 'percent', 'isDiscount'], 'integer'],
            [['isDiscount'], 'yes_no'],
        ];
    }

    public function yes_no($attribute,$params)
    {
        if($this->isDiscount == 1) {
            if (empty($this->newPrice))
                $this->addError("newPrice", "Необходимо заполнить «Новая цена».");

            if (empty($this->percent))
                $this->addError("percent", "Необходимо заполнить «Процент(%)».");
        }

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
            'price' => 'Цена',
            'newPrice' => 'Новая цена',
            'percent' => 'Процент(%)',
            'isDiscount' => 'Скидка',
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
