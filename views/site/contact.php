<?php
$tel = explode( ',', Yii::$app->view->params['contact']->phone);
?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
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

    <!-- КОНТАКТЫ -->
    <div class="contacts">
        <div class="container">
            <div class="contacts-wrapper">
                <div class="left-side">
                    <? foreach ($tel as $v):?>
                        <a href="tel: <?=$v?>" class="tel-number"><?=$v?></a>
                    <? endforeach;?>

                    <a href="mailto: <?=Yii::$app->view->params['contact']->email?>" class="email"><?=Yii::$app->view->params['contact']->email?></a>
                    <div class="contacts-form">
                        <h4>Свяжитесь с нами</h4>
                        <div >
                            <input type="text" class = "feedback-name" placeholder="Имя">
                            <input class="phone_us" type="text" placeholder="+7 (___) ___-__-__" id="feedbackPhone">
                            <textarea name="name" class="sms"  placeholder="Сообщение"></textarea>
                            <div class="form-group" >
                                <input type="checkbox" id="html" class="checkbox"  >
                                <label for="html"></label>
                                <?=$agreement->text?>
                            </div>
                            <a class="btn-call">Связаться</a>
                        </div>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

                <script>
                    $(".feedback-name").keyup(function(e) {
                        var regex = /^[a-zA-Zа-яА-Яа-яА-Я ]+$/;
                        if (regex.test(this.value) !== true)
                            this.value = this.value.replace(/[^a-zA-Zа-яА-Яа-яА-Я ]+/, '');
                    });
                    $('.feedback-phone').inputmask("(999) 999-9999");
                </script>



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $(".btn-call").click(function () {
                            var name = $(".feedback-name").val();
                            var phone = $("#feedbackPhone").val();
                            var content = $(".sms").val();
                            var chekbox = $(".checkbox").prop('checked');

                            if(!name){
                                swal('Ошибка!', 'Заполните поле имя!', 'error');
                            }else if(!phone || phone.length < 16){
                                swal('Ошибка!', 'Заполните поле номер!', 'error');
                            }else if(!content){
                                swal('Ошибка!', 'Заполните поле сообщение!', 'error');
                            }else if(!chekbox){
                                swal('Ошибка!', 'Подвердите!', 'error');
                            }else{
                                $.ajax({
                                    url: "/site/request",
                                    type: "GET",
                                    dataType: "json",
                                    data: {name:name,phone:phone,content:content},
                                    success: function(data){
                                        if(data.status){
                                            swal('Заказ успешно отправлен!', 'В ближайшее время мы свяжемся с вами.', 'success');
                                        }else{
                                            swal('Упс!', 'Что-то пошло не так.', 'error');
                                        }
                                    },
                                    error: function () {
                                        swal('Упс!', 'Что-то пошло не так.', 'error');
                                    }
                                });


                                $.ajax({
                                    url: "/site/request-email",
                                    type: "GET",
                                    dataType: "json",
                                    data: {name:name,phone:phone,content:content},
                                    success: function(data){

                                    },
                                    error: function () {
                                        // swal('Упс!', 'Что-то пошло не так.', 'error');
                                    }
                                });
                            }
                        });
                    });
                </script>

                <div class="right-side">
<!--                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d160017.55987631876!2d71.38299536520746!3d51.195595795070865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x424580c47db54609%3A0x97f9148dddb19228!2z0J3Rg9GALdCh0YPQu9GC0LDQvSAwMjAwMDA!5e0!3m2!1sru!2skz!4v1554183660526!5m2!1sru!2skz" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                    <div id="map" style="width: 100%; height: 480px;border:0" ></div>
                    <script>
                        //document.getElementById("office-city").innerHTML="<?//=$city->name?>//";
                        ymaps.ready(init);
                        var center_map = [0, 0];
                        var map = "";
                        function init() {
                            map = new ymaps.Map('map', {
                                center: center_map,
                                zoom: 8,
                            });

                            var myGeocoder = ymaps.geocode("Астана");
                            myGeocoder.then(
                                function (res) {
                                    var street = res.geoObjects.get(0);
                                    var coords = street.geometry.getCoordinates();
                                    map.setCenter(coords);
                                },
                                function (err) {

                                }
                            );

                            <?foreach($filial as $v){?>
                            map.geoObjects.add(new ymaps.Placemark([<?=$v->latitude?>, <?=$v->longitude?>], {
                                balloonContent: '<div class="company-name wow fadeInUp"><h6><?=$v->name?></div>'
                            }, {
                                iconLayout: 'default#image',
                                iconImageHref: '/public/images/mark.png',
                                preset: 'islands#icon',
                                iconColor: '#0095b6'
                            }));
                            <?}?>
                        }
                    </script>
                    <div class="map-address">
                        <ul>
                            <? foreach ($filial as $v):?>
                            <li><?=$v->name?></li>
                            <? endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END КОНТАКТЫ -->

    <!-- ХИТЫ ПРОДАЖ -->
    <?=$this->render('../partials/hitProduct',['title'=> 'Популярные товары','class'=>'populars-products wow fadeInUp']);?>
    <!-- END ХИТЫ ПРОДАЖ -->
</main>
