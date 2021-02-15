<?php
require_once "../config/Config.php";
require_once "../models/SQL.php";

if(isset($_SESSION['login'])){
    $user = $_SESSION['login'];
} else $user = "new user".rand(1,100);

if(isset($_POST['id'])){
    $id = (int)($_POST['id']);


    $goodTemp = SQL::Instance()->SelectWithKey('cart','id_good', $id);


    if(isset($goodTemp)){
        $id = $goodTemp['id_good'];
        $quantity = $goodTemp['quantity'];
        $quantity++;

        SQL::Instance()->Update('cart', ['quantity'=>$quantity], 'id_good='.$id);
        echo $quantity;
    }else{
        //return "НЕ Работает !"; //die("НЕ Работает !");
        SQL::Instance()->Insert('cart',['id_good'=>$id, 'quantity'=>1, 'user'=>$user]);
        echo "Alert(Товар добавлен)";
    }
}
?>

