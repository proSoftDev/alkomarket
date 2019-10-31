<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

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
            'name',
//            'price',
//            'imagea',
//            'imageb',
            //'imagec',
            //'company',
            //'gradus',
            //'country',
            //'articul',
            //'content:ntext',
            //'contenta:ntext',
            //'contentb:ntext',
            //'contentc:ntext',
            //'contentd:ntext',

            [
                'attribute' => 'isMain',
                'filter' => \app\modules\admin\controllers\Label::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\Label::statusLabel($model->isMain);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'isNew',
                'filter' => \app\modules\admin\controllers\LabelNew::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\LabelNew::statusLabel($model->isNew);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'isDiscount',
                'filter' => \app\modules\admin\controllers\LabelDiscount::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\LabelDiscount::statusLabel($model->isDiscount);
                },
                'format' => 'raw',
            ],
            //'newPrice',
            //'promo',

            ['attribute'=>'category_id', 'value'=>function($model){ return $model->categoryName;},'filter'=>\app\models\Category::getList()],
            //'metaName',
            //'metaDesc:ntext',
            //'metaKey:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
