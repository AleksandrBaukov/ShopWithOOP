<?php
if(!($_SESSION['login'] == 'admin')) {
    ?> <h1>"Вы не вошли или вы не Админ!"</h1> <?}
else{
//        print_r($_SESSION['login']) ;
?>
<div class="menu">
    <a href="index.php" class="buy-btn admin-btn"><span>Сайт</span></a>
    <a href="index.php?c=admin" class="buy-btn admin-btn"><span>Главная</span></a>
    <a href="adding.php" class="buy-btn admin-btn"><span>Добавить товар</span></a>
    <a href="orders.php" class="buy-btn admin-btn"><span>Заказы</span></a>
</div>

<div class="admin-content">
    <h1>Админка</h1>
    <div class="admin-block">
        <?php
        foreach ($goods as $good) {
                ?>
                <div class="admin-item">
                    <img src="<?= $good['path'] ?>" alt="<?= $good['name'] ?>" title="<?= $good['name'] ?>" width="375px" height="250px">
                    <div>
                        <h3 class="item-name"><?= $good['name'] ?></h3>
                        <a href="editing.php?id=<?= $good['id'] ?>" title="Редактировать" class="buy-btn">Редактировать</a>
                        <br>
                        <a href="removal.php?id=<?= $good['id'] ?>" title="Удалить" class="buy-btn">Удалить</a>
                    </div>
                </div>
                <?
            }?>
    </div>
    <?}
    ?>
</div>