<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordered_product".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $count
 */
class OrderedProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordered_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'count'], 'required'],
            [['order_id', 'product_id', 'count'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
        ];
    }

    public function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

}
