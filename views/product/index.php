<!-- MAIN -->
<main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
        <div class="container">
            <ul>
                <li><a href="<?=\yii\helpers\Url::toRoute([Yii::$app->view->params['menu'][0]->url])?>"><?=Yii::$app->view->params['menu'][0]->text?></a></li>
                <li><a href="#">Каталог</a></li>
                <li class="active"><a href="#">Карточка товара</a></li>
            </ul>
        </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->


    <!-- GRADUS CARD -->
    <div class="gradus-card">
        <div class="container">
            <div class="gradus-wrapper">
                <div class="gradus-img">
                    <img src="<?=$product->getImageB();?>">
                    <a href="<?=$product->getImageB();?>" data-fancybox data-caption="<?=$product->name;?>" class="zoom-img" id="btn-zoom-img">Увеличить</a>
                </div>

                <div class="gradus-content">
                    <div class="title">
                        <h3><?=$product->name;?></h3>
                        <div class="pagination-card">
                            <ul>
                                <? if($product->getPreviuosId() != null):?>
                                    <li><a href="/product/view?id=<?=$product->getPreviuosId();?>"><img src="/public/images/card-prev.png"></a></li>
                                <? endif;?>
                                <? if($product->getNextId() != null):?>
                                    <li><a href="/product/view?id=<?=$product->getNextId();?>"><img src="/public/images/card-next.png"></a></li>
                                <? endif;?>

                            </ul>
                        </div>
                    </div>
                    <div class="articul">
                        <ul>
                            <li>Артикул: <?=$product->articul;?></li>
                            <li>Есть на складе в вашем городе (Москва)</li>
                        </ul>
                    </div>
					 <div class="manufacturer">
                        <p>Страна: <span><?=$product->countryName->name;?></span></p>
                    </div>
                    <div class="card-info">
                        <p>Производитель: <span><?=$product->company;?></span></p>
                    </div>
                    <div class="card-info">
                        <?=$product->content?>
                    </div>
                    <div class="about-alco">
                        <?=$product->contenta?>
                    </div>
                    <div class="product-buy">
                        <div class="red-price">
                            <? if($product->isDiscount):?>
                            <span><?=$product->newPrice?> ₸</span>
                            <p>Старая цена <span><?=$product->price?> ₸ <span class="line"></span></span></p>
                            <? endif;?>
                            <? if(!$product->isDiscount):?>
                                <span><?=$product->price?> ₸</span>
                            <? endif;?>
                        </div>
                        <img src="/public/images/fav.png" style="width: 40px;height: 40px;cursor: pointer" id="add-to-fav" data-id="<?=$product->id?>" data-user-id="<?=Yii::$app->user->identity->id?>">
                        <button type="button" class="btn-in-basket" data-id="<?=$product->id?>">
                            в корзину
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END GRADUS CARD -->

    <!-- STORY BLOCK-->
    <div class="story-block">
        <div class="container">
            <ul class="story-tabs">
                <li class="tab active" datas-tab="tabs-1">Закуска</li>
                <li class="tab" datas-tab="tabs-2">История</li>
                <li class="tab" datas-tab="tabs-3">Это интересно</li>
            </ul>

            <div id="tabs-1" class="tab-contents active">
                <div class="story-tab-content">
                    <div class="left-side">
                        <?=$product->contentb?>
                    </div>
                    <?if($product->imagec != null):?>
                        <div class="right-side">
                            <img src="<?=$product->getImageC()?>" alt="">
                        </div>
                    <? endif;?>
                </div>
            </div>

            <div id="tabs-2" class="tab-contents">
                <div class="story-tab-content">
                    <div class="left-side">
                        <?=$product->contentc?>
                    </div>
                    <?if($product->imagec != null):?>
                        <div class="right-side">
                            <img src="<?=$product->getImageC()?>" alt="">
                        </div>
                    <? endif;?>
                </div>
            </div>

            <div id="tabs-3" class="tab-contents">
                <div class="story-tab-content">
                    <div class="left-side">
                        <?=$product->contentd?>
                    </div>
                    <?if($product->imagec != null):?>
                        <div class="right-side">
                            <img src="<?=$product->getImageC()?>" alt="">
                        </div>
                    <? endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- STORY BLOCK-->

    <?=$this->render('../partials/hitProduct',['title'=> 'Популярные товары','class'=>'populars-products wow fadeInUp']);?>
    <!-- END ХИТЫ ПРОДАЖ -->
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(".btn-in-basket").click(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/card/add-product",
            type: "GET",
            dataType: "json",
            data: {id:id},
            success: function(data){
                if(data.status){
                    $('#count').html(data.count);
                    $('#basket-popup').show();
                }
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });


    $(".card-continue").click(function () {
        $('#basket-popup').hide();
    });


    $("#add-to-fav").click(function () {
        var product_id = $(this).attr('data-id');
        var user_id = $(this).attr('data-user-id');

        if(user_id == ""){
            swal('Ошибка!', 'Чтобы добавить товар в избранное нужно войти!', 'error');
        }else{
            $.ajax({
                url: "/product/add-to-favorite",
                dataType: "json",
                data: {product_id:product_id,user_id:user_id},
                type: "GET",
                success: function(data){
                    alert(data.text);
                },
                error: function () {
                    swal('Упс!', 'Что-то пошло не так.', 'error');
                }
            });
        }
    });

</script>