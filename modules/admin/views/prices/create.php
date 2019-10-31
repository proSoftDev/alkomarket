<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prices */

$this->title = 'Создание цена';
$this->params['breadcrumbs'][] = ['label' => 'Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>