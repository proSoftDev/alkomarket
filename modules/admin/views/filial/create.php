<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Filial */

$this->title = 'Создание филиала';
$this->params['breadcrumbs'][] = ['label' => 'Filials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
