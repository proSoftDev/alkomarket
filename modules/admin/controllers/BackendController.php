<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11.03.2019
 * Time: 15:32
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;

class BackendController extends Controller
{

    public function beforeAction($action){
        if(\Yii::$app->user->identity->role != 1 && $action->actionMethod != 'actionLogin'){
            \Yii::$app->user->logout();
            return $this->redirect('/auth/login');
        }

        return parent::beforeAction($action);

    }

}