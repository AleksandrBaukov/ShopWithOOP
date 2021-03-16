<div class="admin-content">
    <h1>Админка</h1>
    <div class="admin-block">
        <?php
        foreach ($goods as $good) {
                ?>
                <div class="admin-item">
                    <img src="<?= $good['path'] ?>" alt="<?= $good['name'] ?>" title="<?= $good['name'] ?>" width="200px">
                    <h3 class="admin-item-name"><?= $good['name'] ?></h3>
                    <a href="index.php?c=admin&act=edit&id=<?= $good['id'] ?>" title="Редактировать" class="buy-btn admin-btn">Редактировать</a>
                </div>
                <?
            }?>
    </div>
</div>