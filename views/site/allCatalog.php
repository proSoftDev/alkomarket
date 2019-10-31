<?php

use yii\widgets\LinkPager;

?>
<!-- MAIN -->
<main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
        <div class="container">
            <ul>
                <li><a href="<?=\yii\helpers\Url::toRoute([Yii::$app->view->params['menu'][0]->url])?>"><?=Yii::$app->view->params['menu'][0]->text?></a></li>
                <li class="active"><a href="#"><?=$model->name?></a></li>
            </ul>
        </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->

    <!-- КАТАЛОГ ПРОДУКТОВ -->
    <div class="catalog-products">
        <div class="container">
            <div class="title">
                <h3><?=$model->name?></h3>
            </div>
            <!-- СОРТИРОВКА ПРОДУКТОВ -->
            <div class="catalog-filter">
                <ul>
                    <li>Сортировать по:</li>
                    <li>
                        <a>Цене</a>
                        <div class="price-dropdown">
                            <a style="cursor: pointer" class="orderByCheap" data-id="<?=$model->id;?>">Сначала дешевые</a>
                            <a style="cursor: pointer" class="orderByExpensive" data-id="<?=$model->id;?>">Сначала дорогие</a>
                            <? if(count($filter) == 0):?>
                                <div class="price-wrap">
                                    <p class="price_min">0</p>-<p class="price_max">50000</p>
                                </div>
                                <section class="demo">
                                    <input type="range" multiple value="0" class="price_range_min" min="0" max="25000"/>
                                </section>
                                <section class="demo">
                                    <input type="range"  value="50000" class="price_range_max" min="25001" max="50000"/>
                                </section>
                            <? endif;?>
                            <? if(count($filter) == 1):?>
                                <div class="price-wrap">
                                    <p class="price_min"><?=$filter->min?></p>-<p class="price_max"><?=$filter->max?></p>
                                </div>
                                <section class="demo">
                                    <input type="range" multiple value="0" class="price_range_min" min="<?=$filter->min?>" max="<?=($filter->max-$filter->min)/2?>"/>
                                </section>
                                <section class="demo">
                                    <input type="range"  value="<?=$filter->max?>" class="price_range_max" min="<?=($filter->max-$filter->min)/2+1?>" max="<?=$filter->max?>"/>
                                </section>
                            <? endif;?>
                            <button type="button" name="button" class="between_prices" data-id="<?=$model->id;?>">применить</button>
                        </div>
                    </li>
                    <li><a style="cursor: pointer" class="popular" data-id="<?=$model->id;?>">Популярности</a></li>
                    <li>
                        <a >Происхождению</a>
                        <div class="coutry-dropdown">
                            <ul>
                                <? foreach ($countries as $k=>$v):?>
                                    <li><a style="cursor: pointer" class="countries" data-country-id="<?=$k?>" data-id="<?=$model->id;?>" ><?=$v?></a></li>
                                <? endforeach;?>

                            </ul>
                        </div>
                    </li>
                    <li><a style="cursor: pointer" class="new" data-id="<?=$model->id;?>">NEW</a></li>
                    <li><a style="cursor: pointer" class="promo" data-id="<?=$model->id;?>">Акции</a></li>
                    <!--                    <li><a href="#">РАСПРОДАЖА</a></li>-->
                </ul>
            </div>
            <!-- END СОРТИРОВКА ПРОДУКТОВ -->

            <div class="catalog_pagination">
                <!-- АЛКОПРОДУКТЫ -->
                <div class="products-wrapper">

                    <? foreach ($products['data'] as $v):?>

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
                                <a class="basket-btn" data-id="<?=$v->id?>" >
                                    <img src="/public/images/basket-best.png">
                                    <span>в корзину</span>
                                </a>
                                <ul>
                                    <li>Производитель: <?=$v->company?></li>
                                    <li>Крепость: <?=$v->gradus?></li>
                                    <li>Страна: <?=$v->countryName->name;?></li>
                                </ul>
                            </div>
                        </div>
                    <? endforeach;?>

                </div>
                <!-- END АЛКОПРОДУКТЫ -->

            </div>
        </div>
    </div>
    <!-- END КАТАЛОГ ПРОДУКТОВ -->
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $('body').on('click', '.orderByCheap',function(e){
        var id = $(this).attr('data-id');

        e.preventDefault();
        $.ajax({
            url: '/site/all-catalog-order-by-cheap',
            data: {id:id},
            type: 'GET',
            success: function (response) {
                $('.catalog_pagination').html(response);
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });


    $('body').on('click', '.orderByExpensive',function(e){
        var id = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            url: '/site/all-catalog-order-by-expensive',
            data: {id:id},
            type: 'GET',
            success: function (response) {
                $('.catalog_pagination').html(response);
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });


    $('body').on('click', '.popular',function(e){
        var id = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            url: '/site/all-catalog-get-popular',
            data: {id:id},
            type: 'GET',
            success: function (response) {
                $('.catalog_pagination').html(response);
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });



    $('body').on('click', '.new',function(e){
        var id = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            url: '/site/all-catalog-get-new',
            data: {id:id},
            type: 'GET',
            success: function (response) {
                $('.catalog_pagination').html(response);
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });


    $('body').on('click', '.promo',function(e){
        var id = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            url: '/site/all-catalog-get-promo',
            data: {id:id},
            type: 'GET',
            success: function (response) {
                $('.catalog_pagination').html(response);
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });


    $('body').on('click', '.countries',function(e){
        var country_id = $(this).attr('data-country-id');
        var id = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            url: '/site/all-catalog-get-by-country',
            data: {country_id:country_id,id:id},
            type: 'GET',
            success: function (response) {
                $('.catalog_pagination').html(response);
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });


    $('body').on('change', '.price_range_min',function(e){
        var price = $(this).val();
        $('.price_min').html(price);

    });

    $('body').on('change', '.price_range_max',function(e){
        var price = $(this).val();
        $('.price_max').html(price);

    });

    $('body').on('click', '.between_prices',function(e){
        var id = $(this).attr('data-id');
        var min = $('.price_min').text();
        var max = $('.price_max').text();
        e.preventDefault();
        $.ajax({
            url: '/site/all-catalog-get-between-prices',
            data: {id:id,min:min,max:max},
            type: 'GET',
            success: function (response) {
                $('.catalog_pagination').html(response);
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });


    $(".basket-btn").click(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/card/add-product",
            type: "GET",
            dataType: "json",
            data: {id:id},
            success: function(data){
                if(data.status){
                    $('#count').html(data.count);
                    $('#basket-popup').show();
                }
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });

    $(".card-continue").click(function () {
        $('#basket-popup').hide();
    });

</script>