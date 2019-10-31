<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Remainder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="remainder-form">

    <?php if(Yii::$app->session->getFlash('remainder')):?>
        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('remainder'); ?>
        </div>
    <?php endif;?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filial_id')->dropDownList(\app\models\Filial::getList()) ?>

    <?= $form->field($model, 'product_id')->dropDownList(\app\models\Product::getList()) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
