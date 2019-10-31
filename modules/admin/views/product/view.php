<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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
            'name',
            'volume',
            [
                'attribute' => 'isMain',
                'value' => function ($model) {
                    return \app\modules\admin\controllers\Label::statusLabel($model->isMain);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'isNew',
                'value' => function ($model) {
                    return \app\modules\admin\controllers\LabelNew::statusLabel($model->isNew);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'isDiscount',
                'value' => function ($model) {
                    return \app\modules\admin\controllers\LabelDiscount::statusLabel($model->isDiscount);
                },
                'format' => 'raw',
            ],
            ['attribute'=>'category_id', 'value'=>function($model){ return $model->categoryName;}],
            'price',
            'newPrice',
            'promo',
            'company',
            'gradus',
            ['attribute'=>'country', 'value'=>function($model){ return $model->countryName->name;}],
            'articul',

            [
                'format' => 'html',
                'attribute' => 'imagea',
                'filter' => '',
                'value' => function($data){
                    return Html::img($data->getImageA(), ['width'=>100]);
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'imageb',
                'filter' => '',
                'value' => function($data){
                    return Html::img($data->getImageB(), ['width'=>100]);
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'imagec',
                'filter' => '',
                'value' => function($data){
                    return Html::img($data->getImageC(), ['width'=>100]);
                }
            ],

            [
                'format' => 'raw',
                'attribute' => 'content',
                'value' => function($data){
                    return $data->content;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'contenta',
                'value' => function($data){
                    return $data->contenta;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'contentb',
                'value' => function($data){
                    return $data->contentb;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'contentc',
                'value' => function($data){
                    return $data->contentc;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'contentd',
                'value' => function($data){
                    return $data->contentd;
                }
            ],
            'metaName',
            'metaDesc:ntext',
            'metaKey:ntext',
        ],
    ]) ?>

</div>
