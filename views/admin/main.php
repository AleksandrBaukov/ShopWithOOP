<?php session_start();
if(!($_SESSION['login'] == 'admin'))
    exit("<h1 class='admin-error'>Вы не вошли или вы не Админ!</h1>");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$title?></title>

    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/fonts/fonts.css">
    <link rel="SHORTCUT ICON" href="../public/img/logos.png" type="image/png">
</head>
<body>
<div class="menu">
    <a href="index.php" class="buy-btn admin-btn"><span>Сайт</span></a>
    <a href="index.php?c=admin" class="buy-btn admin-btn"><span>Главная</span></a>
    <a href="index.php?c=admin&act=add" class="buy-btn admin-btn"><span>Добавить товар</span></a>
    <a href="orders.php" class="buy-btn admin-btn"><span>Заказы</span></a>
</div>
<div class="container">
    <?=$content?>
</div>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>-->
<!--<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"-->
<!--        integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="../public/js/app.js"></script>-->
</body>
</html>