<?php

/* @var $this yii\web\View */

use yii\helpers\Url;


?>


<script>
    <?php if(Yii::$app->session->getFlash('basketSuccess')):?>
        swal('Спасибо!',"Ваш заказ принят!", 'success');
    <?php endif;?>
</script>
<!-- MAIN -->
<main class="main">
    <div id="carouselExampleIndicators" class="carousel slide wow fadeInUp" data-wow-duration="1s" data-ride="carousel">
        <ol class="carousel-indicators">
            <? $active = 'active';?>
            <? $m=0?>
            <? foreach ($banner as $v):?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$m?>" class="<?=$active?>"></li>
                <? $active = '';?>
                <? $m++?>
            <? endforeach;?>
        </ol>
        <div class="carousel-inner">
            <? $active = 'active';?>
            <? foreach ($banner as $v):?>
                <div class="carousel-item <?=$active?>">
                    <div class="banner" style="background-image: url(<?=$v->getImage();?>)">
                        <div class="container">
                            <div class="banner-caption">
                                <h3><?=$v->name?></h3>
                                <p><?=$v->content?></p>
                                <div class="price">
                                    <span><?=$v->price?> ₸</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <? $active = '';?>
            <? endforeach;?>
        </div>
    </div>
    <!--/ END BANNER -->

    <!-- ХИТЫ ПРОДАЖ -->
   <?=$this->render('../partials/hitProduct',['title'=> $mainsub[0]->name,'class'=>'bestsellers wow fadeInUp']);?>
    <!-- END ХИТЫ ПРОДАЖ -->

	
	
    <!-- КАТЕГОРИИ ПРОДУКЦИИ -->
	<? if(count($category) > 0):?>
    <div class="category-products wow fadeInUp" data-wow-duration="1s">
        <div class="container">
            <div class="title">
                <h4><?=$mainsub[1]->name?></h4>
            </div>

            <ul class="category-wrapper">
                <? foreach ($category as $v):?>
                <li>
                    <a href="/site/catalog?id=<?=$v->id?>">
                       <span class="img">
                          <span class="inner">
                             <img src="<?=$v->getImage();?>">
                          </span>
                       </span>
                        <p><?=$v->name?></p>
                    </a>
                </li>
                <? endforeach;?>

            </ul>
        </div>
    </div>
	<? endif;?>
    <!-- END КАТЕГОРИИ ПРОДУКЦИИ -->


    <!-- БРЕНДЫ -->
    <div class="brands wow fadeInUp" data-wow-duration="1s">
        <div class="container">
            <div class="title">
                <h4><?=$mainsub[2]->name?></h4>
            </div>
            <div id="carouselTwo" class="owl-carousel owl-theme">
                <? foreach ($brand as $v):?>
                <div class="brand-item">
                    <img src="<?=$v->getImage();?>">
                </div>
                <? endforeach;?>
            </div>
        </div>
    </div>
    <!-- END БРЕНДЫ -->


    <!-- О НАС -->
    <div class="about wow fadeInUp" data-wow-duration="1s">
        <div class="container">
            <div class="title">
                <h4><?=$mainsub[3]->name?></h4>
            </div>

            <div class="about-wrapper">
                <div class="about-content">
                    <?=$mainabout->content?>
                </div>

                <div class="about-img">
                    <img src="<?=$mainabout->getImage()?>">
                </div>
            </div>
        </div>
    </div>
    <!-- END О НАС -->
</main>
<!-- END MAIN -->