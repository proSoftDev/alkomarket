<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            [
//                'value' => function ($model) {
//                    return
//                        Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', ['move-up', 'id' => $model->id]) .
//                        Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', ['move-down', 'id' => $model->id]);
//                },
//                'format' => 'raw',
//                'contentOptions' => ['style' => 'text-align: center'],
//            ],
            'text',
            [
                'attribute' => 'status',
                'filter' => \app\modules\admin\controllers\Label::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\Label::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            //'metaName',
            //'metaDesc:ntext',
            //'metaKey:ntext',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {view}'],
        ],
    ]); ?>
</div>
