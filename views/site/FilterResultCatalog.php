
<? use yii\widgets\LinkPager;?>
<!-- АЛКОПРОДУКТЫ -->
<div class="products-wrapper">
    <? foreach ($products['data'] as $v):?>

        <div class="bestseller-item">
            <a href="/product/view?id=<?=$v->id?>">
                <img src="<?=$v->getImageA()?>">
            </a>
            <? if($v->isNew):?>
                <div class="new">
                    new
                </div>
            <? endif;?>

            <? if($v->isDiscount):?>
                <div class="stock">
                    <?=$v->promo.'%'?>
                </div>
            <? endif;?>
            <p>
                <?=$v->name?>
            </p>
            <? if(!$v->isDiscount):?>
                <span><?=$v->price?> ₸</span>
            <? endif;?>
            <? if($v->isDiscount):?>
                <div class="stock-price">
                    <strike><?=$v->price?> ₸</strike>
                    <span><?=$v->newPrice?> ₸</span>
                </div>
            <? endif;?>
            <div class="bestseller__hide-info">
                <a class="basket-btn" data-id="<?=$v->id?>" >
                    <img src="/public/images/basket-best.png">
                    <span>в корзину</span>
                </a>
                <ul>
                    <li>Производитель: <?=$v->company?></li>
                    <li>Крепость: <?=$v->gradus?></li>
                    <li>Страна: <?=$v->country?></li>
                </ul>
            </div>
        </div>
    <? endforeach; ?>

</div>
<!-- END АЛКОПРОДУКТЫ -->

<!-- ПАГИГАЦИЯ -->
<div class="pagination">
    <ul>
        <?=LinkPager::widget([
            'pagination' => $products['pagination'],
            'activePageCssClass' => 'active',
            'hideOnSinglePage' => true,
            'prevPageLabel' => '<',
            'prevPageCssClass' => ['class' => 'prev-page'],
            'nextPageLabel' => '>',
            'nextPageCssClass' => ['class' => 'next-page'],
        ]);
        ?>

    </ul>
</div>
<!-- END ПАГИГАЦИЯ -->