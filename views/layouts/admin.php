<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AdminAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?= Url::toRoute(['menu/index'])?>" class="logo">
            <span class="logo-mini"></span>
            <span class="logo-lg">Админ. Панель</span>
        </a>
<!--        --><?//= Html::a('<span class="logo-mini"></span><span class="logo-lg">Админ. панель</span>', ['default/index'], ['class' => 'logo']) ?>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <?= Html::a(
                            'Выйти',
                            ['/auth/logout']
                        ) ?>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <?= dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        ['label' => 'Меню', 'icon' => 'fa fa-user', 'url' => ['/admin/menu/index'],'active' => $this->context->id == 'menu'],

                        [
                            'label' => 'Главная страница',
                            'icon' => 'fa fa-user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Заголовки контента', 'icon' => 'fa fa-user', 'url' => ['/admin/mainsub/index'],  'active' => $this->context->id == 'mainsub'],
                                ['label' => 'Баннер', 'icon' => 'fa fa-user', 'url' => ['/admin/banner/index'],'active' => $this->context->id == 'banner'],
                                ['label' => 'Бренды', 'icon' => 'fa fa-user', 'url' => ['/admin/brand/index'], 'active' => $this->context->id == 'brand'],
                                ['label' => 'О нас', 'icon' => 'fa fa-user', 'url' => ['/admin/mainabout/index'], 'active' => $this->context->id == 'mainabout'],
                            ],
                        ],

                        [
                            'label' => 'О магазине',
                            'icon' => 'fa fa-user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Заголовки контента', 'icon' => 'fa fa-user', 'url' => ['/admin/aboutsub/index'],  'active' => $this->context->id == 'aboutsub'],
                                ['label' => 'О магазине', 'icon' => 'fa fa-user', 'url' => ['/admin/aboutinfo/index'],'active' => $this->context->id == 'aboutinfo'],
                                ['label' => 'С нами комфортно', 'icon' => 'fa fa-user', 'url' => ['/admin/aboutcomfort/index'],'active' => $this->context->id == 'aboutcomfort'],
                                ['label' => 'Наши преимущества', 'icon' => 'fa fa-user', 'url' => ['/admin/aboutadv/index'], 'active' => $this->context->id == 'aboutadv'],
                            ],
                        ],

                        ['label' => 'Оплата и доставка', 'icon' => 'fa fa-user', 'url' => ['/admin/payment-and-delivery/index'],'active' => $this->context->id == 'payment-and-delivery'],

                        [
                            'label' => 'Продукция',
                            'icon' => 'fa fa-user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Продукция ', 'icon' => 'fa fa-user', 'url' => ['/admin/catalog/index'],'active' => $this->context->id == 'catalog'],
                                ['label' => 'Категории продукции', 'icon' => 'fa fa-user', 'url' => ['/admin/category/index'],'active' => $this->context->id == 'category'],
                                ['label' => 'Продукты', 'icon' => 'fa fa-user', 'url' => ['/admin/product/index'], 'active' => $this->context->id == 'product'],
                                ['label' => 'Остатки продуктов', 'icon' => 'fa fa-user', 'url' => ['/admin/remainder/index'], 'active' => $this->context->id == 'remainder'],
                                ['label' => 'Цены для филтера', 'icon' => 'fa fa-user', 'url' => ['/admin/filter/index'], 'active' => $this->context->id == 'filter'],
                                ['label' => 'Адрес доставки', 'icon' => 'fa fa-user', 'url' => ['/admin/delivery-price/index'], 'active' => $this->context->id == 'delivery-price'],
                            ],
                        ],

                        ['label' => 'Программные лояльности', 'icon' => 'fa fa-user', 'url' => ['/admin/loyalty-program/index'], 'active' => $this->context->id == 'loyalty-program'],

                        [
                            'label' => 'Контакты',
                            'icon' => 'fa fa-user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Контакты', 'icon' => 'fa fa-user', 'url' => ['/admin/contact/index'],  'active' => $this->context->id == 'contact'],
                                ['label' => 'Филиалы', 'icon' => 'fa fa-user', 'url' => ['/admin/filial/index'],  'active' => $this->context->id == 'filial'],
                                ['label' => 'Согласование', 'icon' => 'fa fa-user', 'url' => ['/admin/agreement/index'],  'active' => $this->context->id == 'agreement'],
                                ['label' => 'Эл. почта для связи', 'icon' => 'fa fa-user', 'url' => ['/admin/emailforrequest/index'],'active' => $this->context->id == 'emailforrequest'],
                            ],
                        ],


                        ['label' => 'Заявки', 'icon' => 'fa fa-user', 'url' => ['/admin/feedback/index'],'active' => $this->context->id == 'feedback'],
                        ['label' => 'Заказы', 'icon' => 'fa fa-user', 'url' => ['/admin/orders/index'],'active' => $this->context->id == 'orders'],
                    ],
                ]
            ) ?>
        </section>
    </aside>



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

            <?=$content?>

        </section>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>


    <div class="control-sidebar-bg"></div>
</div>

<?php $this->endBody() ?>
<?php $this->registerJsFile('/ckeditor/ckeditor.js');?>
<?php $this->registerJsFile('/ckfinder/ckfinder.js');?>
<script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
    })
    $.widget.bridge('uibutton', $.ui.button);
</script>
</body>
</html>
<?php $this->endPage() ?>
