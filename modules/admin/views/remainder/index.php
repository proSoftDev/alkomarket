<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RemainderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Остатки продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remainder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
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

            'amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
