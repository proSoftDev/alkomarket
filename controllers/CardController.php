<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.04.2019
 * Time: 11:32
 */

namespace app\controllers;


use app\models\DeliveryPrice;
use app\models\Menu;
use app\models\OrderedProduct;
use app\models\Orders;
use app\models\Product;
use app\models\User;
use app\models\UserProfile;
use Yii;

class CardController extends FrontendController
{


    public function actionIndex(){

        $model = Menu::find()->where('url = "/card/index"')->one();
        $this->setMeta($model->metaName, $model->metaKey, $model->metaDesc);
        $sum = Product::getSum();
        $max = count($_SESSION['basket']);
        $address = DeliveryPrice::find()->all();
        if(!Yii::$app->user->isGuest){
            $user = User::findOne(Yii::$app->user->identity->id);
            $profile = UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]);
        }

        return $this->render('basket',compact('sum','max','model','user','profile','address'));
    }


    public function actionDeleteProduct($id)
    {
        $m=0;
//        die(debug($_SESSION['basket']));
        foreach ($_SESSION['basket'] as $v){
            if($v->id == $id){
                unset($_SESSION['basket'][$m]);
                $_SESSION['basket'] = array_values($_SESSION['basket']);
                break;
            }
            $m++;
        }
        return $this->redirect(['index']);
    }

    public function actionAddProduct()
    {
        $id = $_GET['id'];
        $basket = Product::findOne($id);
        $basket->count = 1;
        $check = true;
        foreach ($_SESSION['basket'] as $v){
            if($v->id == $id){
                $check = false;
                break;
            }
        }
        if($check){
            array_push($_SESSION['basket'],$basket);
        }
        $count = count($_SESSION['basket']);
        $array = ['status' => 1,'count'=>$count];

        return json_encode($array);

    }



    public function actionDeleteAll(){
        unset($_SESSION['basket']);
        return $this->redirect(['index']);
    }


    public function actionDownClicked()
    {

        $count = 1;
        foreach ($_SESSION['basket'] as $k=>$v){
            if($v->id == $_GET['id'] && $_SESSION['basket'][$k]->count > 1){
                $_SESSION['basket'][$k]['count']-=1;
                $count = $_SESSION['basket'][$k]['count'];
                break;
            }
        }

        $sum = Product::getSum();
        $sumProduct = Product::getSumProduct($_GET['id']);
        $array = ['countProduct' => $count, 'sum' => $sum,'sumProduct'=>$sumProduct];
        return json_encode($array);
    }


    public function actionUpClicked()
    {

        $count = 1;
        foreach ($_SESSION['basket'] as $k=>$v){
            if($v->id == $_GET['id']){
                $_SESSION['basket'][$k]['count']+=1;
                $count = $_SESSION['basket'][$k]['count'];
                break;
            }
        }

        $sum = Product::getSum();
        $sumProduct = Product::getSumProduct($_GET['id']);
        $array = ['countProduct' => $count, 'sum' => $sum,'sumProduct'=>$sumProduct];
        return json_encode($array);
    }

    public function actionCountChanged()
    {
        foreach ($_SESSION['basket'] as $k=>$v){
            if($v->id == $_GET['id']){
                if($_GET['v']>0){
                    $_SESSION['basket'][$k]['count'] = $_GET['v'];
                }else{
                    $_SESSION['basket'][$k]['count']=1;
                }
            }
        }

        $sum = Product::getSum();
        $sumProduct = Product::getSumProduct($_GET['id']);
        $array = ['sum' => $sum,'sumProduct'=>$sumProduct];
        return json_encode($array);
    }


    public function actionOrderByUser(){

        $delivery = DeliveryPrice::findOne($_POST['Orders']['address']);
        $sum = Product::getSum();
        $order = new Orders();
        $order->user_id = Yii::$app->user->identity->id;
        $order->status = 0;
        $order->sum = $sum + $delivery->price;
        if ($order->load(Yii::$app->request->post()) && $order->validate()) {
            if ($order->save() && $this->sendInformationAboutPayment($order->fio, $order->email, $order->id)) {
                foreach ($_SESSION['basket'] as $v) {
                    $orderedProduct = new OrderedProduct();
                    $orderedProduct->order_id = $order->id;
                    $orderedProduct->product_id = $v->id;
                    $orderedProduct->count = $v->count;
                    if($orderedProduct->save()){
                        $product = Product::findOne($orderedProduct->product_id);
                        $product->number_of_sales =  $product->number_of_sales + $orderedProduct->count;
                        $product->save(false);
                    }
                }
                unset($_SESSION['basket']);
                Yii::$app->sync->orderExport($order->id);
                Yii::$app->getSession()->setFlash('basketSuccess', 'Ваш заказ принят!');
                return 1;
            }else {
                return 0;
            }
        }else{
            $errors = "";
            $error = $order->getErrors();
            foreach($error as $v){
                $errors .= $v[0];
                break;
            }
            return $errors;
        }
    }



    public function actionOrderByGuest(){

        $delivery = DeliveryPrice::findOne($_POST['Orders']['address']);
        $sum = Product::getSum();

        $order = new Orders();
        $order->status = 0;
        $order->sum = $sum + $delivery->price;

        if ($order->load(Yii::$app->request->post()) && $order->validate()) {
            if ($order->save() && $this->sendInformationAboutPayment($order->fio, $order->email, $order->id)) {
                foreach ($_SESSION['basket'] as $v) {
                    $orderedProduct = new OrderedProduct();
                    $orderedProduct->order_id = $order->id;
                    $orderedProduct->product_id = $v->id;
                    $orderedProduct->count = $v->count;
                    if($orderedProduct->save()){
                        $product = Product::findOne($orderedProduct->product_id);
                        $product->number_of_sales =  $product->number_of_sales + $orderedProduct->count;
                        $product->save(false);
                    }
                }
                unset($_SESSION['basket']);
                Yii::$app->sync->orderExport($order->id);
                Yii::$app->getSession()->setFlash('basketSuccess', 'Ваш заказ принят!');
                return 1;
            } else {
                return 0;
            }
        }else{
            $errors = "";
            $error = $order->getErrors();
            foreach($error as $v){
                $errors .= $v[0];
                break;
            }
            return $errors;
        }
    }

}