<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 01.04.2019
 * Time: 11:48
 */

use yii\helpers\Url;

$tel = explode( ',', Yii::$app->view->params['contact']->phone);
?>

<footer class="footer">
    <div class="container">
<!--        <div class="footer-catalog">-->
<!--            <p>Каталог</p>-->
<!--            <ul>-->
<!--                --><?// $m = 0;?>
<!--                --><?// foreach ( Yii::$app->view->params['catalog'] as $v):?>
<!--                    --><?// $m++;?>
<!--                    --><?// if($m < 5):?>
<!--                        <li><a href="#">--><?//=$v->name?><!--</a></li>-->
<!--                    --><?// endif;?>
<!--                --><?// endforeach;?>
<!--            </ul>-->
<!--        </div>-->
<!---->
<!--        <div class="footer__food-catalog">-->
<!--            <ul>-->
<!--                --><?// $m = 0;?>
<!--                --><?// foreach ( Yii::$app->view->params['catalog'] as $v):?>
<!--                    --><?// $m++;?>
<!--                    --><?// if($m > 4):?>
<!--                        <li><a href="#">--><?//=$v->name?><!--</a></li>-->
<!--                    --><?// endif;?>
<!--                --><?// endforeach;?>
<!--            </ul>-->
<!--        </div>-->

        <div class="footer-info">
            <p>Информация</p>
            <ul>
                <? foreach (Yii::$app->view->params['menu'] as $v):?>
                    <? if($v->id == 1){ continue;}?>
                    <li><a href="<?=Url::toRoute([$v->url])?>"><?=$v->text?></a></li>
                <? endforeach;?>
                <li><a href="https://a-lux.kz/">Разработка сайтов в Алматы</a></li>
            </ul>
        </div>

        <div class="footer-populars">
            <p>Популярное</p>
            <ul>
                <? foreach (Yii::$app->view->params['popCategory'] as $v):?>
                    <li><a href="/site/catalog?id=<?=$v->id?>"><?=$v->name?></a></li>
                <? endforeach;?>
            </ul>
        </div>

        <div class="footer-contacts">
            <div class="tel-nums">
                <? foreach ($tel as $v):?>
                    <a href="tel: <?=$v?>"><?=$v?></a>
                <? endforeach;?>
            </div>
            <p><?=Yii::$app->view->params['contact']->workTimeFooter?></p>
            <div class="email">
                <a href="mailto: <?=Yii::$app->view->params['contact']->email?>"><?=Yii::$app->view->params['contact']->email?></a>
            </div>
            <p><?=Yii::$app->view->params['contact']->address?></p>
        </div>

        <div class="social-networks">
            <p>Мы в соцсетях</p>
            <ul>
                <li><a href="<?=Yii::$app->view->params['contact']->instagram?>" target="_blank"><span><img src="/public/images/insta.png"></span></a></li>
                <li><a href="<?=Yii::$app->view->params['contact']->vk?>" target="_blank"><span><img src="/public/images/vk.png"></span></a></li>
                <li><a href="<?=Yii::$app->view->params['contact']->facebook?>" target="_blank"><span><img src="/public/images/fb.png"></span></a></li>
                <li><a href="<?=Yii::$app->view->params['contact']->twitter?>" target="_blank"><span><img src="/public/images/tw.png"></span></a></li>
            </ul>
            <span>© 2018 Gradus  - интернет-магазин
алкогольных напитков. Все права
защищены</span>
        </div>
    </div>
</footer>

