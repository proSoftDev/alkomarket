<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aboutsub */

$this->title = 'Create Aboutsub';
$this->params['breadcrumbs'][] = ['label' => 'Aboutsubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutsub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
