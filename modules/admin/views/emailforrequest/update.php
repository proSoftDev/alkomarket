<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Emailforrequest */

$this->title = 'Редактирования эл. почту';
$this->params['breadcrumbs'][] = ['label' => 'Emailforrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emailforrequest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
