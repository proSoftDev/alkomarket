<?php

use app\models\City;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Filial */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<div class="filial-form" >

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'city_id')->dropDownList(\yii\helpers\ArrayHelper::map(City::find()->all(), 'id', 'name'), ['prompt' => '']) ?>

    <div id="map" style="width: 100%; height: 250px"></div>

    <script>
        ymaps.ready(init);
        var center_map = [0, 0];
        var map = "";
        function init() {
            map = new ymaps.Map('map', {
                center: center_map,
                zoom: 8,
            });

            <?php if(empty($model->longitude)&&empty($model->latitude)){ ?>
            var myGeocoder = ymaps.geocode("<?=$model->city->name?>");
            myGeocoder.then(
                function (res) {
//                    map.geoObjects.add(res.geoObjects);
                    var street = res.geoObjects.get(0);
                    var coords = street.geometry.getCoordinates();
                    map.setCenter(coords);
                },
                function (err) {

                }
            );
            <?php }else{ ?>
            map.setCenter([<?=$model->latitude?>, <?=$model->longitude?>]);

            map.geoObjects.add(new ymaps.Placemark([<?=$model->latitude?>, <?=$model->longitude?>], {
                balloonContent: ''
            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6'
            }));
            <?php } ?>
            $('#filial-city_id').change(function(){
                $.ajax({
                    type: "GET",
                    url: "/admin/filial/city",
                    data: {id: $(this).val()},
                    success: function(rez){
                        map.geoObjects.removeAll();
                        var myGeocoder = ymaps.geocode(rez);
                        myGeocoder.then(
                            function (res) {
//                                map.geoObjects.add(res.geoObjects);
                                var street = res.geoObjects.get(0);
                                var coords = street.geometry.getCoordinates();
                                map.setCenter(coords);
                            },
                            function (err) {

                            }
                        );
                    }
                });
            });
            map.events.add('click', function (e) {
                map.geoObjects.removeAll();
                var coords = e.get('coords');
                map.geoObjects.add(new ymaps.Placemark(coords, {
                    balloonContent: ''
                }, {
                    preset: 'islands#icon',
                    iconColor: '#0095b6'
                }));



                var firstGeoObject = map.geoObjects.get(0);
                address = firstGeoObject.getAddressLine();


                $("#filial-latitude").val(coords[0].toPrecision(9));
                $("#filial-longitude").val(coords[1].toPrecision(9));
                $("#filial-name").val(address);

            });
        }
    </script>


    <div class="form-group" style="padding-bottom: 20px;">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
