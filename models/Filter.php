<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filter".
 *
 * @property int $id
 * @property int $min
 * @property int $max
 * @property int $category_id
 */
class Filter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['min', 'max', 'category_id'], 'required'],
            [['min', 'max', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'min' => 'Минимум цена',
            'max' => 'Максимум цена',
            'category_id' => 'Категорие товара',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategoryName(){
        return (isset($this->category))? $this->category->name:'Не задано';
    }

}
