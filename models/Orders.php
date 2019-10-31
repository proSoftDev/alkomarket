<?php

namespace app\models;

use Yii;
use app\models\OrderedProduct;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property string $fio
 * @property string $email
 * @property string $telephone
 * @property string $address
 * @property string $comment
 * @property int $products_id
 * @property int $status
 * @property int $sum
 * @property string $order_date
 * @property string $date_of_receiving
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'products_id', 'status', 'sum'], 'integer'],
            [['fio', 'email', 'telephone', 'address', 'products_id', 'status', 'sum'], 'required'],
            [['comment'], 'string'],
            [['email'],'email'],
            [['order_date', 'date_of_receiving'], 'safe'],
            [['fio', 'email', 'telephone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер заказа',
            'user_id' => 'User ID',
            'fio' => 'ФИО',
            'email' => 'E-mail',
            'telephone' => 'Мобильный телефон',
            'address' => 'Адрес доставки',
            'comment' => 'Коментарии',
            'products_id' => 'Products ID',
            'status' => 'Статус заказа',
            'sum' => 'Сумма заказа',
            'order_date' => 'Время заказа',
            'date_of_receiving' => 'Date Of Receiving',
        ];
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserName(){
        return (isset($this->user))? $this->user->fio:'Не известно';
    }

    public function getUserPhone(){
        return (isset($this->user))? $this->user->telephone:'';
    }

    public function getUserEmail(){
        return (isset($this->user))? $this->user->email:'';
    }

    public function getProducts(){
        return $this->hasMany(Orderedproduct::className(), ['order_id' => 'products_id']);
    }

    public function beforeDelete()
    {
        Orderedproduct::deleteAll(['order_id'=>$this->products_id]);
        return parent::beforeDelete();
    }
}
