<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Категории продукции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

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
            [
                'format' => 'html',
                'attribute' => 'image',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>50]);
                }
            ],
            [
                'attribute' => 'isPopular',
                'filter' => \app\modules\admin\controllers\LabelPopular::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\LabelPopular::statusLabel($model->isPopular);
                },
                'format' => 'raw',
            ],
            ['attribute'=>'catalog_id', 'value'=>function($model){ return $model->catalogName;},'filter'=>\app\models\Catalog::getList()],
//            'metaName',
//            'metaDesc:ntext',
            //'metaKey:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
