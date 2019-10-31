<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Prices */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prices-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'price',
            [
                'attribute'=>'filial_id',
                'value'=>function($model){ return $model->filial->name;},
                'filter'=>\app\models\Filial::getList()
            ],
            [
                'attribute'=>'product_id',
                'value'=>function($model){ return $model->product->name;},
                'filter'=>\app\models\Product::getList()
            ],
            [
                'attribute' => 'isDiscount',
                'filter' => \app\modules\admin\controllers\LabelDiscount::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\LabelDiscount::statusLabel($model->isDiscount);
                },
                'format' => 'raw',
            ],
            'newPrice',
            'percent',
        ],
    ]) ?>

</div>
