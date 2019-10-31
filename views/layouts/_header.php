<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 01.04.2019
 * Time: 11:48
 */

use yii\helpers\Url;

$tel = explode( ',', Yii::$app->view->params['contact']->phone);

?>


<header class="header" id="header">
    <div class="header__top">
        <div class="container">
            <ul>
                <? foreach (Yii::$app->view->params['menu'] as $v):?>
                    <li><a href="<?=Url::toRoute([$v->url])?>"><?=$v->text?></a></li>
                <? endforeach;?>
            </ul>
            <? if(!Yii::$app->user->isGuest):?>
            <p>
                <a href="/account/index">Личный кабинет</a>
                <a href="/account/logout">Выйти</a>
            </p>
            <? endif;?>
            <? if(Yii::$app->user->isGuest):?>
                <p>
                    <a href="#login" class="cabinet__btn">Логин</a>
                    <a href="#register" class="cabinet__btn">Регистрация</a>
                </p>

            <? endif;?>
        </div>
    </div>
    <!--/ END HEADER TOP -->

    <div class="header__middle">
        <div class="container">
            <a href="/site/index" class="logo">
                GRADUS.KZ
            </a>

            <div class="header-search">
                <form action="/search/index">
                    <input type="search" placeholder="Поиск" name="text">
                    <button>
                        <img src="/public/images/search.png">
                    </button>
                </form>
            </div>

            <div class="middle-orders">
                <div class="order-days">
                    <span>Обработка заказов</span>
                    <p><?=Yii::$app->view->params['contact']->workTimeHeader?></p>
                </div>

                <div class="order-tels">
                    <span>Заказ по телефону</span>
                    <p><a href="tel:<?=$tel[0]?>"><?=$tel[0]?></a></p>
                </div>
            </div>

            <a class="middle-basket" href="/card/index">
                <div class="basket">
                    <img src="/public/images/basket.png">
                    <span id="count"><?=count($_SESSION['basket']);?></span>
                </div>
                <div class="basket-price">
                    <span>Корзина</span>
                    <p id="sum"><?=Yii::$app->view->params['sumMoney'];?> ₸</p>
                </div>
            </a>
        </div>
    </div>
    <!--/ END HEADER MIDDLE -->

    <div class="header__bottom shadow">
        <div class="container">
            <ul>
                <?foreach (Yii::$app->view->params['catalog'] as $v):?>
                    <li>
                        <a href="#"><?=$v->name?></a>
                        <? $category = $v->catalogItems;?>
                        <? if($category != null):?>
                            <div class="alco-drop">
                                <? $m=0;?>
                                <?foreach ($category as $val):?>
                                    <? $m++;?>
                                    <? if($m % 6== 1):?>
                                        <ul>
                                    <? endif;?>
                                    <li><a href="/site/catalog?id=<?=$val->id?>"><?=$val->name?></a></li>
                                    <? if($m % 6 == 0):?>
                                        </ul>
                                    <? endif;?>
                                <? endforeach;?>
                            </div>
                        <? endif;?>
                    </li>
                <? endforeach;?>
            </ul>
            <a class="header-menu-toggle" href="#0">
                <span class="header-menu-icon"></span>
                <span class="header-menu-icon mt-2"></span>
                <span class="header-menu-icon mt-2"></span>
            </a>
        </div>
    </div>
    <!--/ END HEADER BOTTOM -->

    <!-- MOBILE MENU -->
    <nav class="header-nav shadow">

        <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

        <div class="header-nav__content">
            <ul>
                <li><a href="#login" class="pers-cab-mob">Личный кабинет</a></li>
                <?foreach (Yii::$app->view->params['menu'] as $v):?>
                    <li><a href="<?=Url::toRoute([$v->url])?>" class="active"><?=$v->text?></a></li>
                <? endforeach;?>
                <?foreach (Yii::$app->view->params['catalog'] as $v):?>
                    <li><a  data-toggle="collapse" href="#mobileDrop<?=$v->id;?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?=$v->name?></a>	
						<? $category = $v->catalogItems;?>
                        <? if($category != null):?>
							<ul class="collapse" id="mobileDrop<?=$v->id;?>">
								<?foreach ($category as $val):?>
									<li><a href="/site/catalog?id=<?=$val->id?>"><?=$val->name?></a></li>
								<? endforeach;?>
							</ul>
						<? endif;?>
					</li>
                <? endforeach;?>
            </ul>
        </div>
    </nav>
    <!-- END MOBILE MENU -->
</header>
