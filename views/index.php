

<section class="projects">
    <div class="projects-head">
        <h1 class="projects-title">Here you can check and buy our products.</h1>
    </div>
    <p><?= $_SESSION['login']?></p>
    <div class="projects-blocks">
<?php
foreach ($goods as $good) {
    ?>
    <div class="projects-blocks-item">
        <a href="index.php?act=good&id=<?= $good["id"] ?>" target="_blank"><img src="<?= $good["path"] ?>"
                                                                                    alt="<?= $good["name"] ?>"
                                                                                    width="370px" height="237px"></a>
        <div class="projects-blocks-item-wrp projects-blocks-item-wrp-catalog">
            <a href="index.php?act=good&id=<?= $good["id"] ?>" target="_blank" class="projects-blocks-item-wrp-a">
                <h3 class="projects-blocks-item-wrp-title projects-blocks-item-wrp-title-catalog"><?= $good["name"] ?></h3>
            </a>
            <p class="projects-blocks-item-wrp-text projects-blocks-item-wrp-text-catalog"><?= $good["price"] ?></p>
            <p><?= $good["smallDesc"] ?></p>
            <button class="buy-btn" onclick="addProduct(<?= $good["id"] ?>)"><span class="buy-btn-txt">Buy</span>
            </button>
        </div>
    </div>
    <?
}
?>
    </div>

</section>