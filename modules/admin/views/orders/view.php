<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view" style="padding-bottom: 600px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fio',
            'email:email',
            'telephone',
            [
                'attribute' => 'address',
                'value' => function ($model) {
                    return $model->getAddressName();
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'comment',
                'value' => function ($model) {
                    return $model->getComment();
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'filter' => \app\modules\admin\controllers\LabelProgress::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\LabelProgress::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            ['attribute'=>'sum', 'value'=>function($model){ return $model->sum." тг";}],
            'order_date',
        ],
    ]) ?>



    <h2>Продукты заказа:</h2>
    <br>
    <?php foreach ($products as $v) :?>
        <div style="float: left;margin-right: 50px;">
            <p style="width: 200px"><?=$v->name;?><b>  X <?=$v->count?></b></p>
            <img src="<?=$v->getImageA();?>" width="100">
        </div>
    <?php endforeach;?>

</div>
