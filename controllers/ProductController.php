<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.04.2019
 * Time: 11:38
 */

namespace app\controllers;


use app\models\Product;
use app\models\UserFavorites;
use Yii;

class ProductController extends FrontendController
{
    public function actionView($id){
        $product = Product::findOne($id);
        $this->setMeta($product->metaName, $product->metaKey, $product->metaDesc);
        return $this->render('index',compact('product'));
    }

    public function actionAddToFavorite(){

        $user_id = $_GET['user_id'];
        $product_id = $_GET['product_id'];
        $favorite = UserFavorites::find()->where('user_id='.$user_id.' AND product_id='.$product_id)->one();

        $text = "";
        if($favorite == null){
            $fav = new UserFavorites();
            $fav->user_id = $user_id;
            $fav->product_id = $product_id;
            if($fav->save()){
                $text = 'Товар добавлен в избранное!';
            }

        }else{
            $favorite->delete();
            $text = 'Товар удален с избранного!';
        }


        $array = ['text' => $text];
        return json_encode($array);

    }




}