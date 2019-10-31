<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoyaltyProgram */

$this->title = 'Create Loyalty Program';
$this->params['breadcrumbs'][] = ['label' => 'Loyalty Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loyalty-program-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
