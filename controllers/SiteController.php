<?php

namespace app\controllers;


use app\models\Aboutadv;
use app\models\Aboutcomfort;
use app\models\Aboutinfo;
use app\models\Aboutsub;
use app\models\Agreement;
use app\models\Banner;
use app\models\Brand;
use app\models\Catalog;
use app\models\Category;
use app\models\Contact;
use app\models\Feedback;
use app\models\Filial;
use app\models\Filter;
use app\models\Mainabout;
use app\models\Mainsub;
use app\models\Menu;
use app\models\PaymentAndDelivery;
use app\models\Product;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class SiteController extends FrontendController
{


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $model = Menu::find()->where('url = "/"')->one();
        $this->setMeta($model->metaName, $model->metaKey, $model->metaDesc);
        $mainsub = Mainsub::find()->all();
        $banner = Banner::find()->all();
        $category = Category::find()->where('isPopular=1')->all();
        $brand = Brand::find()->all();
        $mainabout = Mainabout::find()->one();
        return $this->render('index',compact('banner','mainsub','category','brand','mainabout','model'));
    }


    public function actionPaymentAndDelivery()
    {
        $model = Menu::find()->where('url = "/site/payment-and-delivery"')->one();
        $this->setMeta($model->metaName, $model->metaKey, $model->metaDesc);
        $model = PaymentAndDelivery::find()->one();
        return $this->render('payment-and-delivery',compact('model'));
    }


    public function actionCatalog($id)
    {
        $model = Category::find()->where('id ='.$id)->one();
        $this->setMeta($model->metaName, $model->metaKey, $model->metaDesc);
        $products = Product::getAll($id);
        $countries = Product::getCountries();
        $filter = Filter::findOne(['category_id'=>$model->id]);

        return $this->render('catalog',compact('model','products','countries','filter'));
    }

    public function actionAllCatalog($id)
    {
        $model = Category::find()->where('id ='.$id)->one();
        $products['data'] = Product::find()->where('category_id='.$id)->orderBy('id DESC')->all();
        $this->setMeta($model->metaName, $model->metaKey, $model->metaDesc);
        $countries = Product::getCountries();
        $filter = Filter::findOne(['category_id'=>$model->id]);

        return $this->render('allCatalog',compact('model','products','countries','filter'));
    }



    // Sorting product with pagination
    public function actionCatalogOrderByCheap()
    {
        $products = Product::getOrderByCheap($_GET['id']);
        return $this->renderAjax('FilterResultCatalog', compact('products','error'));
    }


    public function actionCatalogOrderByExpensive()
    {
        $products = Product::getOrderByExpensive($_GET['id']);
        return $this->renderAjax('FilterResultCatalog', compact('products','error'));
    }


    public function actionCatalogGetBetweenPrices()
    {
        $products = Product::getBetweenPrices($_GET['id'],$_GET['min'],$_GET['max']);
        return $this->renderAjax('FilterResultCatalog', compact('products','error'));
    }



    public function actionCatalogGetNew()
    {
        $products = Product::getNew($_GET['id']);
        return $this->renderAjax('FilterResultCatalog', compact('products','error'));
    }



    public function actionCatalogGetPromo()
    {
        $products = Product::getPromo($_GET['id']);
        return $this->renderAjax('FilterResultCatalog', compact('products','error'));
    }


    public function actionCatalogGetByCountry()
    {
        $products = Product::getByCountry($_GET['id'], $_GET['country_id']);
        return $this->renderAjax('FilterResultCatalog', compact('products','error'));
    }


    public function actionCatalogGetPopular()
    {
        $products = Product::getPopular($_GET['id']);
        return $this->renderAjax('FilterResultCatalog', compact('products','error'));
    }



    // Sorting product without pagination
    public function actionAllCatalogOrderByCheap()
    {
        $products =  Product::find()->where('category_id='.$_GET['id'])->orderBy('price ASC')->all();
        return $this->renderAjax('FilterResultAllCatalog', compact('products','error'));
    }


    public function actionAllCatalogOrderByExpensive()
    {
        $products =  Product::find()->where('category_id='.$_GET['id'])->orderBy('price DESC')->all();
        return $this->renderAjax('FilterResultAllCatalog', compact('products','error'));
    }


    public function actionAllCatalogGetBetweenPrices()
    {
        $products =  Product::find()->where('category_id='.$_GET['id']." AND price > ".$_GET['min']." AND price < ".$_GET['max'])->orderBy('id DESC')->all();
        return $this->renderAjax('FilterResultAllCatalog', compact('products','error'));
    }



    public function actionAllCatalogGetNew()
    {
        $products =  Product::find()->where('category_id='.$_GET['id'].' AND isNew=1')->orderBy('id DESC')->all();
        return $this->renderAjax('FilterResultAllCatalog', compact('products','error'));
    }



    public function actionAllCatalogGetPromo()
    {
        $products =  Product::find()->where('category_id='.$_GET['id'].' AND isDiscount=1')->orderBy('id DESC')->all();
        return $this->renderAjax('FilterResultAllCatalog', compact('products','error'));
    }


    public function actionAllCatalogGetByCountry()
    {
        $products =  Product::find()->where('category_id='.$_GET['id'].' AND country='.$_GET['country_id'])->orderBy('id DESC')->all();
        return $this->renderAjax('FilterResultAllCatalog', compact('products','error'));
    }


    public function actionAllCatalogGetPopular()
    {
        $products =  Product::find()->where('category_id='.$_GET['id'])->orderBy('number_of_sales DESC')->all();
        return $this->renderAjax('FilterResultAllCatalog', compact('products','error'));
    }







    public function actionAbout()
    {
        $model = Menu::find()->where('url = "/site/about"')->one();
        $this->setMeta($model->metaName, $model->metaKey, $model->metaDesc);
        $about['sub'] = Aboutsub::find()->all();
        $about['info'] = Aboutinfo::find()->all();
        $about['comfort'] = Aboutcomfort::find()->one();
        $about['adv'] = Aboutadv::find()->all();
        return $this->render('about',compact('about','model'));
    }


    public function actionContact()
    {
        $model = Menu::find()->where('url = "/site/contact"')->one();
        $this->setMeta($model->metaName, $model->metaKey, $model->metaDesc);
        $filial = Filial::find()->all();
        $agreement = Agreement::find()->one();

        return $this->render('contact',compact('model','filial','agreement'));
    }


    public function actionRequest()
    {

        $model = new Feedback();

        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $content = $_GET['content'];


        if($model->saveRequest($name,$phone,$content))
        {
            $array = ['status' => 1];
        }else{
            $array = ['status' => 0];
        }

        return json_encode($array);

    }


    public function actionRequestEmail(){

        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $content = $_GET['content'];

        if($this->sendRequest($name,$phone,$content))
        {
            $array = ['status' => 1];
        }else{
            $array = ['status' => 0];
        }

        return json_encode($array);


    }


}
