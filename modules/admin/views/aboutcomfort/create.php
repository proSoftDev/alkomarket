<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aboutcomfort */

$this->title = 'Create Aboutcomfort';
$this->params['breadcrumbs'][] = ['label' => 'Aboutcomforts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutcomfort-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
