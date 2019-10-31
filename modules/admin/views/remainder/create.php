<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Remainder */

$this->title = 'Создание остаток товара';
$this->params['breadcrumbs'][] = ['label' => 'Remainders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remainder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
