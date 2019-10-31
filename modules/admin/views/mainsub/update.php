<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mainsub */

$this->title = 'Редактирования заголовка: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mainsubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainsub-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
