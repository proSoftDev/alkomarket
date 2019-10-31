<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'imagea') ?>

    <?= $form->field($model, 'imageb') ?>

    <?php // echo $form->field($model, 'imagec') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'gradus') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'articul') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'contenta') ?>

    <?php // echo $form->field($model, 'contentb') ?>

    <?php // echo $form->field($model, 'contentc') ?>

    <?php // echo $form->field($model, 'contentd') ?>

    <?php // echo $form->field($model, 'isMain') ?>

    <?php // echo $form->field($model, 'isNew') ?>

    <?php // echo $form->field($model, 'isDiscount') ?>

    <?php // echo $form->field($model, 'newPrice') ?>

    <?php // echo $form->field($model, 'promo') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'metaName') ?>

    <?php // echo $form->field($model, 'metaDesc') ?>

    <?php // echo $form->field($model, 'metaKey') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
