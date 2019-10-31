<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.02.2019
 * Time: 17:08
 */

namespace app\assets;

use yii\web\AssetBundle;


class publicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "public/css/bootstrap.css",
        "public/css/owl.carousel.min.css",
        "public/css/owl.theme.default.min.css",
        "public/css/animate.css",
        "public/css/style.css",
    ];
    public $js = [
        "public/js/jquery-3.2.1.min.js",
        "public/js/bootstrap.min.js",
        "public/js/wow.min.js",
        "public/js/jquery.mask.min.js",
        "public/js/owl.carousel.min.js",
        "public/js/main.js",
    ];
    public $depends = [

    ];
}