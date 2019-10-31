<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mainabout */

$this->title = 'Create Mainabout';
$this->params['breadcrumbs'][] = ['label' => 'Mainabouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainabout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
