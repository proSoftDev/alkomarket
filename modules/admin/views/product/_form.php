<?php

use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form" style="padding-bottom: 5000px;">

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

            <div id="discount" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">


                <?= $form->field($model, 'newPrice')->textInput() ?>

                <?= $form->field($model, 'promo')->textInput() ?>

                <?= $form->field($model, 'isDiscount')->dropDownList([0 => 'Не действует', 1 => 'Действует']) ?>

            </div>
            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active in">


                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'volume')->textInput() ?>

                <?= $form->field($model, 'price')->textInput() ?>

                <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'gradus')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'country')->dropDownList(\app\models\Country::getList()) ?>

                <?= $form->field($model, 'articul')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'isNew')->dropDownList([1 => 'Новые',0 => 'Старые']) ?>

                <?= $form->field($model, 'isMain')->dropDownList([0 => 'Закрыто',1 => 'Активно'])?>

                <?= $form->field($model, 'category_id')->dropDownList(\app\models\Category::getList())?>


                <?php
                echo $form->field($model, 'imagea')->widget(FileInput::classname(), [
                    'pluginOptions' => [
                        'showUpload' => false ,
                    ] ,
                    'options' => ['accept' => 'image/*'],
                ]);
                ?>

                <?php
                echo $form->field($model, 'imageb')->widget(FileInput::classname(), [
                    'pluginOptions' => [
                        'showUpload' => false ,
                    ] ,
                    'options' => ['accept' => 'image/*'],
                ]);
                ?>


                <?php
                echo $form->field($model, 'imagec')->widget(FileInput::classname(), [
                    'pluginOptions' => [
                        'showUpload' => false ,
                    ] ,
                    'options' => ['accept' => 'image/*'],
                ]);
                ?>




                <?php
                echo $form->field($model, 'content')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?php
                echo $form->field($model, 'contenta')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?php
                echo $form->field($model, 'contentb')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?php
                echo $form->field($model, 'contentc')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?php
                echo $form->field($model, 'contentd')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>



            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
