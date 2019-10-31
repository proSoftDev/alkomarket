<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fio',
            'email:email',
            //'telephone',
            [
                'attribute' => 'status',
                'filter' => \app\modules\admin\controllers\LabelProgress::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\LabelProgress::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
//            'address',
            //'comment:ntext',
            //'products_id',
            //'status',
            //'sum',
            //'order_date',
            //'date_of_receiving',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
