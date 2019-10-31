<? use yii\helpers\Url;

Yii::$app->view->params['title'] = "Поиск";
Yii::$app->view->params['desc'] = "Поиск";
Yii::$app->view->params['key'] = "Поиск";

?>
<main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
        <div class="container">
            <ul>
                <li><a href="<?=\yii\helpers\Url::toRoute([Yii::$app->view->params['menu'][0]->url])?>"><?=Yii::$app->view->params['menu'][0]->text?></a></li>
                <li class="active"><a >Поиск</a></li>
            </ul>
        </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->

    <!-- КАТАЛОГ ПРОДУКТОВ -->
    <div class="catalog-products">
        <div class="container">
            <?php
            if($count){?>
                <div class="" style="font-size: 22px;margin-bottom: 30px;margin-right: 500px;">Результаты поиска по запросу <span style="font-weight: bold;"><?=$search?></span>.</div>
            <?}else{?>
                <div class="" style="font-size: 22px;margin-bottom: 300px;">По запросу <span style="font-weight: bold;"><?=$search?></span> ничего не найдено.</div>
            <?}?>

            <? if(count($product) != 0):?>
            <!-- АЛКОПРОДУКТЫ -->
            <div class="products-wrapper">

                <? foreach ($product as $v):?>

                    <div class="bestseller-item">
                        <a href="/product/view?id=<?=$v->id?>">
                            <img src="<?=$v->getImageA()?>">
                        </a>
                        <? if($v->isNew):?>
                            <div class="new">
                                new
                            </div>
                        <? endif;?>

                        <? if($v->isDiscount):?>
                            <div class="stock">
                                <?=$v->promo.'%'?>
                            </div>
                        <? endif;?>
                        <p>
                            <?=$v->name?>
                        </p>
                        <? if(!$v->isDiscount):?>
                            <span><?=$v->price?> ₸</span>
                        <? endif;?>
                        <? if($v->isDiscount):?>
                            <div class="stock-price">
                                <strike><?=$v->price?> ₸</strike>
                                <span><?=$v->newPrice?> ₸</span>
                            </div>
                        <? endif;?>
                        <div class="bestseller__hide-info">
                            <a href="#" class="basket-btn">
                                <img src="/public/images/basket-best.png">
                                <span>в корзину</span>
                            </a>
                            <ul>
                                <li>Производитель: <?=$v->company?></li>
                                <li>Крепость: <?=$v->gradus?></li>
                                <li>Страна: <?=$v->country?></li>
                            </ul>
                        </div>
                    </div>
                <? endforeach;?>

            </div>
            <? endif;?>
            <!-- END АЛКОПРОДУКТЫ -->
        </div>
    </div>
    <!-- END КАТАЛОГ ПРОДУКТОВ -->
</main>

