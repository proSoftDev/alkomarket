
<!-- MAIN -->
<main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
        <div class="container">
            <ul>
                <li><a href="<?=\yii\helpers\Url::toRoute([Yii::$app->view->params['menu'][0]->url])?>"><?=Yii::$app->view->params['menu'][0]->text?></a></li>
                <li class="active"><a href="#"><?=$model->text?></a></li>
            </ul>
        </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->

    <!-- О МАГАЗИНЕ -->
    <div class="about-market">
        <div class="container">
            <div class="title wow fadeInUp">
                <h3><?=Yii::$app->view->params['menu'][1]->text?></h3>
                <p>
                   <?= $about['sub'][0]->name?>
                </p>
            </div>

            <div class="info-market">
                <? $m=0;?>
                <? foreach ($about['info'] as $v):?>
                <?$m++;?>
                <div class="info-market-item wow fadeInUp">
                    <div class="icon-title">
                    <span>
                      <img src="/public/images/done.png">
                    </span>
                        <p><?=$v->name?></p>
                    </div>
                    <div class="number-content">
                        <span><?=$m?></span>
                        <p><?=$v->content?></p>
                    </div>
                </div>
                <? endforeach;?>

            </div>

            <div class="comfort-info">
                <div class="comfort-img">
                    <img src="<?=$about['comfort']->getImage();?>">
                </div>
                <div class="comfort-content">
                    <h4><?= $about['sub'][1]->name?></h4>
                    <?=$about['comfort']->content?>
                    <img class="wow zoomIn" src="/public/images/advantage-arrow.png">
                </div>
            </div>
        </div>
    </div>
    <!-- END О МАГАЗИНЕ -->

    <!-- НАШИ ПРЕИМУЩЕСТВА -->
    <div class="our-advantages">
        <div class="container">
            <div class="title">
                <h3><?= $about['sub'][2]->name?></h3>
            </div>
            <div class="advantage-wrapper">
                <? foreach ($about['adv'] as $v):?>
                <div class="advantage-item">
                    <span class="contain"></span>
                    <div class="advantag-icon">
                        <img src="<?=$v->getImage()?>">
                    </div>
                    <p><?=$v->content?></p>
                </div>
                <? endforeach;?>
            </div>
            <img class="bokal-wine wow bounceInRight" src="/public/images/bokal-wine.png" data-wow-duration="1.5s">
        </div>
    </div>
    <!-- END НАШИ ПРЕИМУЩЕСТВА -->

    <!-- ХИТЫ ПРОДАЖ -->
    <?=$this->render('../partials/hitProduct',['title'=> 'Популярные товары','class'=>'populars-products wow fadeInUp']);?>
    <!-- END ХИТЫ ПРОДАЖ -->
</main>
