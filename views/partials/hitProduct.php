<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30.04.2019
 * Time: 10:06
 */
?>
<? if(count(Yii::$app->view->params['bestProduct']) > 0):?>
<div class="<?=$class?>" data-wow-duration="1s">
    <div class="container">
        <div class="title">
            <h4><?=$title?></h4>
        </div>
        <div id="carouselOne" class="owl-carousel owl-theme">
            <? foreach ( Yii::$app->view->params['bestProduct'] as $v):?>
                <div class="bestseller-item">
                    <a href="/product/view?id=<?=$v->id?>">
                        <img src="<?=$v->getImageA();?>">
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
                            <span  >в корзину</span>

                        </a>
                        <ul>
                            <li>Производитель: <?=$v->company?></li>
                            <li>Крепость: <?=$v->gradus?></li>
                            <li>Страна: <?=$v->countryName->name?></li>
                        </ul>
                    </div>

                </div>
            <? endforeach;?>
        </div>
    </div>
</div>
<? endif;?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
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


    });
</script>
