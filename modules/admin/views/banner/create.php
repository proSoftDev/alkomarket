<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */

$this->title = 'Создания баннера';
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
