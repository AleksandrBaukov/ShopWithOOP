
<section class="item">
    <img src="<?= $good["path"] ?>"
         alt="<?= $good["name"] ?>"
         width="370px" height="237px">
    <div class="progects-blocks-item-wrp progects-blocks-item-wrp-catalog item-block">
        <h1 class="progects-blocks-item-wrp-title progects-blocks-item-wrp-title-catalog item-block-title"><?= $good["name"] ?></h1>
        <p class="progects-blocks-item-wrp-text progects-blocks-item-wrp-text-catalog item-block-price">Price = <?= $good["price"] ?> $</p>
        <p class="item-block-desc"><?= $good["smallDesc"] ?></p>
        <br><br><br><br>
<!--        <p>Тут будет кнопка Купить</p>-->
                        <button class="buy-btn item-btn"><span class="buy-btn-txt">Buy</span></button>
    </div>

</section>