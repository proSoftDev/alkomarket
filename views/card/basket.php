<?php
use yii\helpers\Url;
?>

<!-- MAIN -->
<main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
        <div class="container">
            <ul>
                <li><a href="<?=\yii\helpers\Url::toRoute([Yii::$app->view->params['menu'][0]->url])?>"><?=Yii::$app->view->params['menu'][0]->text?></a></li>
                <li class="active"><a href="#"><?=$model->text?></a></li>
            </ul>
        </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->

    <!-- GRADUS BASKET -->
    <div class="basket">
        <div class="container">
            <div class="title wow fadeInUp">
                <h3>Корзина</h3>
            </div>

            <?php if(count($_SESSION['basket']) == 0):?>
                <div style="margin-top: 50px;margin-bottom: 200px;">
                    <p> Ваша корзина пуста!</p>
                </div>
            <?php endif;?>
            <?php if(count($_SESSION['basket']) != 0):?>
            <div class="basket-table">
                <div class="product-info">
                    <p>Фото</p>
                    <p>Наименование</p>
                    <p>Объем</p>
                    <p>Количество</p>
                    <p>Цена</p>
                    <p></p>
                </div>

                <div class="basket-product-wrapper">
                    <?php foreach ($_SESSION['basket'] as $v):?>
                    <li>
                        <div class="product-img">
                            <img src="<?=$v->getImageB();?>" alt="<?=$v->name;?>" style="height: 198px;width: 180px">
                        </div>
                        <div class="product-title">
                            <p><?=$v->name;?> </p>
                        </div>
                        <div class="product-volume">
                            <p><?=$v->volume;?></p>
                        </div>
                        <div class="product-quantity">
                            <div class="number-quantity">
                                <span class="minus" data-id="<?=$v->id?>" id="down<?=$v->id?>">
                                  -
                                </span>
                                <input type="text" value="<?=$v->count?>" data-id="<?=$v->id?>" id="countProduct<?=$v->id?>" class="quantity">
                                <span class="plus" data-id="<?=$v->id?>" id="up<?=$v->id?>">
                                  +
                                </span>
                            </div>
                        </div>
                        <div class="product-price">
                            <p id="sumProduct<?=$v->id;?>"><?=$v->getSumProduct($v->id)?> ₸</p>
                        </div>
                        <a class="product-button" style="cursor: pointer;" data-id="<?=$v->id?>">
                            <button><img src="/public/images/delet.png"></button>
                        </a>
                    </li>
                    <? endforeach; ?>
                </div>
            </div>

            <div class="basket-contacts-and-paying">
                <form action="/card/order-by-guest">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                    <? $isGuest = Yii::$app->user->isGuest;?>
                    <div class="left-side">
                        <span>ФИО*</span>
                        <input type="text" placeholder="Фамилия, имя, отчество" name="Orders[fio]" value="<?=$isGuest ? "":$profile->fio;?>">
                        <div class="email-tel">
                            <div>
                                <span>E-mail*</span>
                                <input type="email" placeholder="yourmail@mail.ru" name="Orders[email]" value="<?=$isGuest ? "":$user->email;?>">
                            </div>
                            <div>
                                <span>Мобильный телефон*</span>
                                <input class="phone_us" type="text" placeholder="+7 (___) ___-__-__" name="Orders[telephone]" value="<?=$isGuest ? "":$profile->telephone;?>">
                            </div>
                        </div>
                        <span>Адрес доставки</span>
                        <select name="Orders[address]" class="delivery_price_sum">
                            <? $priceSum = 0; ?>
                            <option value="<?= $priceSum; ?>"></option>
                            <? foreach ($address as $v):?>
                                <option class="price_sum" value="<?=$v->id;?>" data-price = "<?=$v->price;?>"  ><?=$v->address;?></option>
                            <? endforeach;?>
                        </select>
<!--                        <input type="text" placeholder="Например: г.Алматы, ул. Московская" name="Orders[address]" value="--><?//=$isGuest ? "":$profile->address;?><!--">-->
                        <div class="comment">
                            <span>Коментарии</span>
                            <textarea  id="comment" placeholder="Сообщение" name="Orders[comment]"></textarea>
                        </div>
                    </div>


                    <div class="right-side">
                        <div class="pay-price">
                            <div class="products-price">
                                <p>Товары:</p>
                                <p id="sumBasket"><?=$sum?> ₸</p>
                            </div>
                            <div class="products-price">
                                <p>Доставка:</p>
                                <p class="delivery_price">0,00 ₸</p>
                            </div>
                            <hr>
                            <div class="total">
                                <p>Итого с доставкой:</p>
                                <p id="sumBasketDelivery"><?=$sum?> ₸</p>
                            </div>
                            <div class="total-payment">
                                <div class="next-del">
                                    <a href="/">Продолжить покупки</a>
                                    <a href="<?=Url::toRoute(['/card/delete-all'])?>">Очистить корзину</a>
                                </div>
                                <? if(!Yii::$app->user->isGuest):?>
                                    <a style="cursor: pointer" class="btn-pay" id="pay-by-user">
                                        Перейти к оплате
                                    </a>
                                <? endif;?>
                                <? if(Yii::$app->user->isGuest):?>
                                    <a style="cursor: pointer" class="btn-pay" id="pay-by-guest">
                                        Перейти к оплате
                                    </a>
                                <? endif;?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif;?>
        </div>
    </div>
    <!-- END GRADUS BASKET -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>


            $(".product-button").click(function () {
                var id = $(this).attr('data-id');
                swal({
                    title: "Вы уверены?",
                    text: "что хотите удалить этот товар!",
                    icon: "warning",
                    buttons: ["Отмена", "OK"],
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "/card/delete-product?id="+id;
                        } else {

                        }
                    });
            });




            $('select[name="Orders[address]"]').change(function () {
                var price = $('option:selected', this).attr('data-price');
                $('.delivery_price').html(price+' ₸');

                <?
                $sum =0;
                foreach ($_SESSION['basket'] as $v){
                    if($v->isDiscount){
                        $price = $v->newPrice;
                    }else{
                        $price = $v->price;
                    }
                    $sum+=(int)$v->count*(int)$price;
                }?>

                var sum = <?=$sum?> + parseInt(price);

                $('#sumBasketDelivery').html(sum+' ₸');

            });






            $(".minus").click(function () {
                var id = $(this).attr('data-id');
                var price = $('option:selected', '.delivery_price_sum').attr('data-price');
                $.ajax({
                    url: "/card/down-clicked",
                    type: "GET",
                    dataType: "json",
                    data: {id:id},
                    success: function(data){
                        $('#countProduct'+id).html(data.countProduct);
                        $('#sum').html(data.sum);
                        $('#sumBasket').html(data.sum);
                        $('#sumBasketDelivery').html(parseInt(data.sum)+parseInt(price));
                        $('#sumProduct'+id).html(data.sumProduct);
                    },
                    error: function () {
                        // alert('FAILED');

                    }
                });
            });


            $(".plus").click(function () {
                var id = $(this).attr('data-id');
                var price = $('option:selected', '.delivery_price_sum').attr('data-price');

                $.ajax({
                    url: "/card/up-clicked",
                    type: "GET",
                    dataType: "json",
                    data: {id:id},
                    success: function(data){
                        $('#countProduct'+id).html(data.countProduct);
                        $('#sum').html(data.sum);
                        $('#sumBasket').html(data.sum);
                        $('#sumBasketDelivery').html(parseInt(data.sum)+parseInt(price));
                        $('#sumProduct'+id).html(data.sumProduct);

                    },
                    error: function () {

                    }
                });
            });

            $(".quantity").on("change paste keyup",function () {
                var id = $(this).attr('data-id');
                var v = $(this).val();
                var price = $('option:selected', '.delivery_price_sum').attr('data-price');
                $.ajax({
                    url: "/card/count-changed",
                    type: "GET",
                    dataType: "json",
                    data: {id:id,v:v},
                    success: function(data){
                        $('#sum').html(data.sum);
                        $('#sumBasket').html(data.sum);
                        $('#sumBasketDelivery').html(parseInt(data.sum)+parseInt(price));
                        $('#sumProduct'+id).html(data.sumProduct);
                    },
                    error: function () {
                        // alert('FAILED');
                    }
                });
            });



            $("#pay-by-guest").click(function () {
                $.ajax({
                    type: 'POST',
                    url: "/card/order-by-guest",
                    data: $(this).closest('form').serialize(),
                    success: function(data){
                        if(data==1){
                            window.location.href = "/";
                        }else if(data==0){
                            swal('Ошибка!',"Что-то пошло не так!", 'error');
                        }else{
                            swal('Ошибка!',data, 'error');
                        }
                    },
                    error: function () {
                        swal('Ошибка!',"Что-то пошло не так!", 'error');
                    }
                });
            });


            $("#pay-by-user").click(function () {
                $.ajax({
                    type: 'POST',
                    url: "/card/order-by-user",
                    data: $(this).closest('form').serialize(),
                    success: function(data){
                        if(data==1){
                            window.location.href = "/";
                        }else if(data==0){
                            swal('Ошибка!',"Что-то ошло не так!", 'error');
                        }else{
                            swal('Ошибка!',data, 'error');
                        }
                    },
                    error: function () {
                        swal('Ошибка!',"Что-то пошло не так!", 'error');
                    }
                });
            });




    </script>

    <!-- ХИТЫ ПРОДАЖ -->
    <?=$this->render('../partials/hitProduct',['title'=> 'Популярные товары','class'=>'populars-products wow fadeInUp']);?>
    <!-- END ХИТЫ ПРОДАЖ -->
</main>