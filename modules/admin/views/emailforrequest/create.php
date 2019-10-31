<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Emailforrequest */

$this->title = 'Create Emailforrequest';
$this->params['breadcrumbs'][] = ['label' => 'Emailforrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emailforrequest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
