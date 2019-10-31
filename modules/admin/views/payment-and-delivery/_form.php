<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentAndDelivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-and-delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', // basic, standard, full
            'inline' => false, //по умолчанию false
        ],
    ]);
    ?>

    <div class="form-group" style="padding-bottom: 20px;">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
