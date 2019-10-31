<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form" style="padding-bottom: 600px;">

    <?php $form = ActiveForm::begin(); ?>


    <div class="col-md-12 pl-0 pr-0">
        <div class="form-group" style="float: right;margin-top:7px;">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
        <ul id="myTab" role="tablist" class="nav nav-tabs">
            <li class="nav-item active">
                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link active">Основное</a>
            </li>
            <li class="nav-item">
                <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link">Мета теги</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content bg-white box-shadow p-4 mb-4">
            <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">


                <?= $form->field($model, 'metaName')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'metaDesc')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'metaKey')->textarea(['rows' => 6]) ?>

            </div>
            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active in">


                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?php
                echo $form->field($model, 'image')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                ]);
                ?>

                <?= $form->field($model, 'isPopular')->dropDownList([0 => 'Нет', 1 => 'Да']) ?>

                <?= $form->field($model, 'catalog_id')->dropDownList(\app\models\Catalog::getList()) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
