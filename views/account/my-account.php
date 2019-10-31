<!-- MAIN -->
<main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
        <div class="container">
            <ul>
                <li><a href="#">Главная</a></li>
                <li class="active"><a href="#">Мой кабинет</a></li>
            </ul>
        </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->

    <!-- MY ACCOUNT -->
    <div class="my-account">
        <div class="container">
            <div class="title">
                <h3>Мой кабинет</h3>
            </div>
            <div class="my-account-wrapper">
                <!-- ACCOUNT TABS -->
                <div class="account-left-side">
                    <ul class="tabs">
                        <li class="tab-link current" data-tab="tab-1">Мои заказы</li>
                        <li id="favorites" class="tab-link" data-tab="tab-2">Избранное</li>
                        <li class="tab-link" data-tab="tab-3">Мои данные</li>
                        <li class="tab-link" data-tab="tab-4">Программные лояльности</li>
                    </ul>
                </div>
                <!-- END ACCOUNT TABS -->

                <!-- ACCOUNT CONTENT -->
                <div class="account-right-side">
                    <div id="tab-1" class="tab-content current wow fadeInRight" data-wow-duration="1.5s">
                        <div class="orders-table">
                            <ul>
                                <li>
                                    <span>Заказ</span>
                                    <span>Дата</span>
                                    <span>Адресат</span>
                                    <span>Сумма заказа</span>
                                    <span>Статус заказа</span>
                                </li>
                                <? foreach ($orders as $v):?>
                                <? $date = date('d.m.Y', strtotime($v->order_date));?>
                                <li>
                                    <span><?=$v->id?></span>
                                    <span><?=$date?></span>
                                    <span><?=$v->fio?></span>
                                    <span><?=$v->sum?> тг</span>
                                    <span><?=$v->status == 1 ? "Выполнен":"В прогрессе";?></span>
                                </li>
                                <? endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-content wow fadeInRight">
                        <div class="favorite-wrapper">
                            <? if($fav == null):?>
                                Ваше избранные пусто!
                            <? endif?>
                            <? if($fav != null):?>
                                <? foreach ($fav as $v):?>
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
                                            <li>Страна: <?=$v->country?></li>
                                        </ul>
                                    </div>
                                </div>
                                <? endforeach;?>
                            <? endif?>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-content wow fadeInRight">
                        <form action="/account/updateAccountData" >
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                            <div class="input-item">
                                <p>Ваш логин: <span><?=$user->username;?></span></p>
                                <input type="text" placeholder="sergkabanov" value="<?=$userProfile->fio;?>" name="UserProfile[fio]">
                            </div>
                            <div class="input-item">
                                <p>Пол: </p>
                                <ul>
                                    <li><input type="radio" name="UserProfile[gender]" value="1" <?=$userProfile->gender==1 ? "checked":"";?>/><label for="muhRadio1" >Мужской</label></li>
                                    <li><input type="radio" name="UserProfile[gender]" value="2" <?=$userProfile->gender==2 ? "checked":"";?>/><label for="muhRadio2" >Женский</label></li>
                                </ul>
                            </div>
                            <div class="input-item">
                                <p>Дата рождения: <span><?=$userProfile->getDate();?></span></p>
                                <input type="date" name="UserProfile[date_of_birth]" value="<?=$userProfile->date_of_birth;?>">
                            </div>
                            <div class="input-item">
                                <p>Контактный телефон: <span><?=$userProfile->telephone;?></span></p>
                                <input type="tel" placeholder="+7 (987) 654-32-21" class="phone_us" name="UserProfile[telephone]" value="<?=$userProfile->telephone;?>">
                            </div>
                            <div class="input-item">
                                <p>Адрес: <span><?=$userProfile->address;?></span></p>
                                <input type="text" placeholder="г. Москва, ул. Московская, д. 1" name="UserProfile[address]" value="<?=$userProfile->address;?>">
                            </div>
                            <div class="input-item">
                                <p>Индекс: <span><?=$userProfile->index_number;?></span></p>
                                <input type="text" placeholder="123456" class="index" name="UserProfile[index_number]" value="<?=$userProfile->index_number;?>">
                            </div>
                            <div class="input-item">
                                <p>Ваш пароль: <span>*******</span></p>
                                <input type="password" placeholder="Новый пароль" value="<?=$user->password;?>" name="User[password]">
                            </div>
                            <div class="input-item">
                                <input type="password" placeholder="Подвердите пароль:" value="<?=$user->password_verify;?>" name="User[password_verify]">
                            </div>
                            <div class="save-del-buttons">
                                <button type="button" name="button" class="save-btn">Сохранить</button>
                                <a href="/account/delete-account" class="delete-account">Удалить аккаунт</a>
                            </div>
                        </form>
                    </div>
                    <div id="tab-4" class="tab-content wow fadeInRight">
                        <a href="/" class="logo">
                            GRADUS.KZ
                        </a>
                        <h4><?=$program->title?></h4>
                        <?=$program->content?>
                    </div>
                </div>
                <!-- END ACCOUNT CONTENT -->
            </div>
        </div>
    </div>

    <!-- ХИТЫ ПРОДАЖ -->
    <?=$this->render('../partials/hitProduct',['title'=> 'Популярные товары','class'=>'populars-products wow fadeInUp']);?>
    <!-- END ХИТЫ ПРОДАЖ -->
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $('body').on('click', '.save-btn', function (e) {
        $.ajax({
            type: 'POST',
            url: '/account/update-account-data',
            data: $(this).closest('form').serialize(),
            success: function (response) {
                if(response == 1){
                    swal('Ваши изменения',' успешно сохранен.', 'success');
                }else{
                    swal('Ошибка!', response, 'error');
                }
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });

    $(".btn-in-basket").click(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/card/add-product",
            type: "GET",
            dataType: "json",
            data: {id:id},
            success: function(data){
                if(data.status){
                    $('#count').html(data.count);
                    swal("Товар добавлен в корзину", {
                        buttons: {
                            catch: {
                                text: "Оформить заказ",
                                value: "catch",
                            },
                            cancel: "Продолжить покупки",
                            defeat: false,
                        },
                    })
                        .then((value) => {
                            switch (value) {
                                case "catch":
                                    window.location.href = "/card/index";
                                    break;
                            }
                        });
                }
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });

</script>