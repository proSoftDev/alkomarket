<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mainsub */

$this->title = 'Create Mainsub';
$this->params['breadcrumbs'][] = ['label' => 'Mainsubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainsub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
