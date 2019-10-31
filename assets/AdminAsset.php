<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 13.02.2019
 * Time: 10:07
 */

namespace app\assets;
use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "private/bower_components/bootstrap/dist/css/bootstrap.min.css",
        "private/bower_components/font-awesome/css/font-awesome.min.css",
        "private/bower_components/Ionicons/css/ionicons.min.css",
        "private/dist/css/AdminLTE.min.css",
        "private/dist/css/skins/_all-skins.min.css",
        "private/bower_components/morris.js/morris.css",
        "private/bower_components/jvectormap/jquery-jvectormap.css",
        "private/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
        "private/bower_components/bootstrap-daterangepicker/daterangepicker.css",
        "private/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",

    ];
    public $js = [
       "https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js",
       "https://oss.maxcdn.com/respond/1.4.2/respond.min.js",
       "private/bower_components/jquery/dist/jquery.min.js",
       "private/bower_components/jquery-ui/jquery-ui.min.js",
       "private/bower_components/bootstrap/dist/js/bootstrap.min.js",
       "private/bower_components/raphael/raphael.min.js",
       "private/bower_components/morris.js/morris.min.js",
       "private/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js",
       "private/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
       "private/plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
       "private/bower_components/jquery-knob/dist/jquery.knob.min.js",
       "private/bower_components/moment/min/moment.min.js",
       "private/bower_components/bootstrap-daterangepicker/daterangepicker.js",
       "private/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
       "private/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
       "private/bower_components/jquery-slimscroll/jquery.slimscroll.min.js",
       "private/bower_components/fastclick/lib/fastclick.js",
       "private/dist/js/adminlte.min.js",
       "private/dist/js/pages/dashboard.js",
       "private/dist/js/demo.js",
    ];
    public $depends = [
    ];
}