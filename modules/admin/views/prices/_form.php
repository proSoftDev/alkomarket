<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prices-form">

    <?php if(Yii::$app->session->getFlash('prices')):?>
        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('prices'); ?>
        </div>
    <?php endif;?>

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12 pl-0 pr-0" >
        <div class="form-group" style="float: right;margin-top:7px;">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
        <ul id="myTab" role="tablist" class="nav nav-tabs">
            <li class="nav-item active">
                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link active">Основное</a>
            </li>


            <li class="nav-item">
                <a id="profile-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="profile" aria-selected="false" class="nav-link">Акция</a>
            </li>

        </ul>
        <div id="myTabContent" class="tab-content bg-white box-shadow p-4 mb-4">

            <div id="discount" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">


                <?= $form->field($model, 'newPrice')->textInput() ?>

                <?= $form->field($model, 'percent')->textInput() ?>

                <?= $form->field($model, 'isDiscount')->dropDownList([0 => 'Не действует', 1 => 'Действует']) ?>


            </div>
            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active in">
                <?= $form->field($model, 'price')->textInput() ?>

                <?= $form->field($model, 'filial_id')->dropDownList(\app\models\Filial::getList()) ?>

                <?= $form->field($model, 'product_id')->dropDownList(\app\models\Product::getList()) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
