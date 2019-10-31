<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aboutadv */

$this->title = 'Создания преимущества';
$this->params['breadcrumbs'][] = ['label' => 'Aboutadvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutadv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
