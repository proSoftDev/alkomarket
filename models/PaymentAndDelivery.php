<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_and_delivery".
 *
 * @property int $id
 * @property string $content
 */
class PaymentAndDelivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_and_delivery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Содержание',
        ];
    }
}
