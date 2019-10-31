<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FilterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Цены для филтера';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-index">

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
            'min',
            'max',
            ['attribute'=>'category_id', 'value'=>function($model){ return $model->categoryName;},'filter'=>\app\models\Category::getList()],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
