<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 28.08.2018
 * Time: 9:34
 */


namespace app\controllers;


use app\models\Product;
use yii\web\Controller;

class SearchController extends FrontendController
{


    public function actionIndex($text)
    {
        $search = $text;
		if($text){
			$product = Product::find()->where("name LIKE '%$text%'")->all();
			$count = count($product);
        }else{
		    $count = 0;
			return $this->render('index', compact('search', 'count', 'text'));
		}

        return $this->render('index', compact('product','count','search'));
    }
}