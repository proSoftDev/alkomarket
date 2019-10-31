<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05.03.2019
 * Time: 15:26
 */

namespace app\controllers;


use yii\web\Controller;

class ContentController extends Controller
{

    public static function cutStr($str, $length=50, $postfix=' ...')
    {
        if ( strlen($str) <= $length)
            return $str;

        $temp = substr($str, 0, $length);
        return substr($temp, 0, strrpos($temp, ' ') ) . $postfix;
    }

}