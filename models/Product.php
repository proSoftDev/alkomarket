<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $imagea
 * @property string $imageb
 * @property string $imagec
 * @property string $company
 * @property string $gradus
 * @property string $country
 * @property string $articul
 * @property string $content
 * @property string $contenta
 * @property string $contentb
 * @property string $contentc
 * @property string $contentd
 * @property int $isMain
 * @property int $isNew
 * @property int $isDiscount
 * @property int $newPrice
 * @property int $promo
 * @property int $category_id
 * @property string $metaName
 * @property string $metaDesc
 * @property string $metaKey
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'company', 'gradus', 'country', 'articul', 'content', 'contenta', 'contentb', 'contentc', 'contentd', 'isMain', 'isNew', 'isDiscount', 'category_id', 'metaName', 'metaDesc', 'metaKey','volume'], 'required'],
            [['price', 'isMain', 'isNew', 'isDiscount', 'newPrice', 'promo', 'category_id','country','number_of_sales'], 'integer'],
            [['content', 'contenta', 'contentb', 'contentc', 'contentd', 'metaDesc', 'metaKey','volume'], 'string'],
            [['name', 'company', 'gradus', 'articul', 'metaName'], 'string', 'max' => 255],
            [['imagea','imageb','imagec'], 'file', 'extensions' => 'png,jpg'],
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
            'volume' => 'Объем',
            'price' => 'Цена',
            'imagea' => 'Внешняя картинка ',
            'imageb' => 'Внутренняя картинка вверху',
            'imagec' => 'Внутренняя картинка снизу',
            'company' => 'Производитель',
            'gradus' => 'Крепость',
            'country' => 'Страна',
            'articul' => 'Артикул',
            'content' => 'Содержание',
            'contenta' => 'О товара',
            'contentb' => 'Содержание пункта "Закуска"',
            'contentc' => 'Содержание пункта "История"',
            'contentd' => 'Содержание пункта "Это интересно"',
            'isMain' => 'Хиты продаж',
            'isNew' => 'Cтатус',
            'isDiscount' => 'Скидка',
            'newPrice' => 'Новая цена',
            'promo' => 'Процент(%)',
            'category_id' => 'Категория ',
            'metaName' => 'Мета Названия',
            'metaDesc' => 'Мета Описание',
            'metaKey' => 'Ключевые слова',
        ];
    }



    public function getImageA()
    {
        return ($this->imagea) ? '/uploads/' . $this->imagea : '/no-image.png';
    }


    public function getImageB()
    {
        return ($this->imageb) ? '/uploads/' . $this->imageb : '/no-image.png';
    }


    public function getImageC()
    {
        return ($this->imagec) ? '/uploads/' . $this->imagec : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->imagea);
        $imageUploadModel->deleteCurrentImage($this->imageb);
        $imageUploadModel->deleteCurrentImage($this->imagec);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public static function getList(){
        return \yii\helpers\ArrayHelper::map(Product::find()->all(),'id','name');
    }

    public function getCategoryName(){
        return (isset($this->category))? $this->category->name:'не задано';
    }


   
    public function getCountryName()
    {
        return $this->hasOne(Country::className(), ['id' => 'country']);
    }




    public function getPreviuosId(){
        $product = Product::find()->where('category_id='.$this->category_id)->orderBy('id DESC')->all();
        $preId = "";
        foreach ($product as $v){
            if($v->id == $this->id){
                break;
            }
            $preId = $v->id;
        }
        return $preId;
    }

    public function getNextId(){
        $product = Product::find()->where('category_id='.$this->category_id)->orderBy('id DESC')->all();
        $nextId = "";
        $check = false;
        foreach ($product as $v){
            if($check){
                $nextId = $v->id;
                break;
            }
            if($v->id == $this->id){
                $check = true;
            }
        }
        return $nextId;
    }



    public static function getSum(){
        $sum =0;
        if($_SESSION['basket'] != null){
            foreach ($_SESSION['basket'] as $v){
                if($v->isDiscount){
                    $price = $v->newPrice;
                }else{
                    $price = $v->price;
                }
                $sum+=(int)$v->count*(int)$price;
            }
        }
        return $sum;
    }


    public static function getSumProduct($id){
        $sum =0;
        if($_SESSION['basket'] != null){
            foreach ($_SESSION['basket'] as $v){
                if($v->id == $id){
                    if($v->isDiscount){
                        $price = $v->newPrice;
                    }else{
                        $price = $v->price;
                    }
                    $sum+=(int)$v->count*(int)$price;
                }
            }
        }
        return $sum;
    }


    public static function getAll($id,$pageSize=16)
    {
        $query =  Product::find()->where('category_id='.$id)->orderBy('id DESC');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['data'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }



    public static function getCountries()
    {
        $countries = array();
        $query =  Product::find()->all();
        foreach ($query as $v){
            if(!in_array($v->countryName->name,$countries)){
                $countries[$v->country] = $v->countryName->name;
            }
        }
        return $countries;

    }

    public static function getOrderByCheap($id,$pageSize=16)
    {
        $query =  Product::find()->where('category_id='.$id)->orderBy('price ASC');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['data'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }



    public static function getOrderByExpensive($id,$pageSize=16)
    {
        $query =  Product::find()->where('category_id='.$id)->orderBy('price DESC');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['data'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }


    public static function getBetweenPrices($id, $min, $max, $pageSize=16)
    {
        $query =  Product::find()->where('category_id='.$id." AND price > ".$min." AND price < ".$max)->orderBy('id DESC');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['data'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }


    public static function getNew($id,$pageSize=16)
    {
        $query =  Product::find()->where('category_id='.$id.' AND isNew=1')->orderBy('id DESC');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['data'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }



    public static function getPromo($id,$pageSize=16)
    {
        $query =  Product::find()->where('category_id='.$id.' AND isDiscount=1')->orderBy('id DESC');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['data'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }



    public static function getByCountry($id ,$country_id ,$pageSize=16)
    {
        $query =  Product::find()->where('category_id='.$id.' AND country='.$country_id)->orderBy('id DESC');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['data'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }



    public static function getPopular($id,$pageSize=16)
    {
        $query =  Product::find()->where('category_id='.$id)->orderBy('number_of_sales DESC');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['data'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }






}