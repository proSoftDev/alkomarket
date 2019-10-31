<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.04.2019
 * Time: 11:31
 */

namespace app\controllers;


use app\models\ForgetPasswordForm;
use app\models\LoginForm;
use app\models\LoyaltyProgram;
use app\models\Menu;
use app\models\Orders;
use app\models\Product;
use app\models\SignupForm;
use app\models\User;
use app\models\UserFavorites;
use app\models\UserProfile;
use Yii;

class AccountController extends FrontendController
{
    public function actionIndex(){
		
		if(Yii::$app->user->isGuest){
            throw new \yii\web\NotFoundHttpException();
        }

        $model = Menu::find()->where('url = "/account/index"')->one();
        $this->setMeta($model->metaName, $model->metaKey, $model->metaDesc);
        $userFavorite = UserFavorites::findAll(['user_id'=>Yii::$app->user->identity->id]);
        $userProfile = UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]);
        $user = User::findOne(Yii::$app->user->identity->id);
        if($userFavorite != null){
            $arr = '(';
            foreach ($userFavorite as $v){
                $arr.=$v->product_id.',';
            }
            $arr = substr($arr,0,strlen($arr)-1);
            $arr.= ')';
            $fav = Product::find()->where('id in '.$arr.' AND isDeleted=0')->all();
        }

        $orders = Orders::find()->where(['user_id'=>Yii::$app->user->identity->id])->orderBy('id DESC')->all();
        $program = LoyaltyProgram::find()->one();
        return $this->render('my-account',compact('fav','userProfile','user','orders','program'));
    }

    public function actionLogin(){

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->login()) {
                return 1;
            }else{
                $error = "";
                $errors = $model->getErrors();

                foreach($errors as $v){
                    $error .= $v[0];
                    break;
                }
                return $error;
            }
        }
    }




    public function actionRegister()
    {

        $model = new SignupForm();
        $profile = new UserProfile();

        if ($model->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post()) && $profile->validate()) {

            $password = $model->password;
            if ($user = $model->signUp()) {
                $profile->user_id = $user->id;
                if($profile->save()){
                    $this->sendInformationAboutRegistration($profile->fio, $user->email, $password);
                    Yii::$app->getUser()->login($user);
                    return 1;
                }
            }else{
                $user_error = "";
                $user_errors = $model->getErrors();
                foreach($user_errors as $v){
                    $user_error .= $v[0];
                    break;
                }
                return $user_error;
            }
        }else{


            $profile_error = "";
            $profile_errors = $profile->getErrors();
            foreach($profile_errors as $v){
                $profile_error .= $v[0];
                break;
            }

            return $profile_error;

        }
    }



    public function actionUpdateAccountData()
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        $profile = UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]);

        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post()) && $profile->validate()) {


            if($user->password != null){
                if($user->validate()){
                    $user->setPassword($user->password);
                    if($profile->save() && $user->save()) {
                        return 1;
                    }
                }else{
                    $user_error = "";
                    $user_errors = $user->getErrors();
                    foreach($user_errors as $v){
                        $user_error .= $v[0];
                        break;
                    }
                    return $user_error;
                }

            }else{
                if($profile->save()) {
                    return 1;
                }
            }



        }else{
            $profile_error = "";
            $profile_errors = $profile->getErrors();
            foreach($profile_errors as $v){
                $profile_error .= $v[0];
                break;
            }
            return $profile_error;
        }
    }


    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }


    public function actionDeleteAccount(){
        $user = User::findOne(Yii::$app->user->identity->id);
        $userProfile = UserProfile::findOne(['user_id' => Yii::$app->user->identity->id]);
        $user->delete();
        $userProfile->delete();
        UserFavorites::deleteAll(['user_id' => Yii::$app->user->identity->id]);
        return $this->goHome();
    }


    public function actionUpdatePassword()
    {
        $user = new ForgetPasswordForm();
        if ($user->load(Yii::$app->request->post()) && $user->validate()) {

            $check = User::findOne(['email'=>$user->email]);
            if($check) {
                $password = $check->getRandomPassword();
                $check->setPassword($password);
                if($check->save(false)){
                    if($this->sendInformationAboutNewPassword($user->email, $password)){
                        return 1;
                    }
                }
            }else{
                return "Пользователь с таким e-mail отсутствует в базе!";
            }
        }else{
            $user_error = "";
            $user_errors = $user->getErrors();
            foreach($user_errors as $v){
                $user_error .= $v[0];
                break;
            }
            return $user_error;
        }
    }

}