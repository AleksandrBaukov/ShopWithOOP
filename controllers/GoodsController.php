<?php

class GoodsController extends BaseController {

    function __construct()
    {
        $this->user = $this->getUser();
    }

//    /**
//     * @return mixed
//     */
//     public function getCart()
//    {
//        return $this->cart;
//    }

    /**
     * Главная страница
     */
    public function action_index(){
        $this->title .= 'Portfolio/Catalog';
        $goods = SQL::Instance()->SelectWithKey("goods");

        $this->content = $this->Template('views/index.php', ["goods"=>$goods, ]);//'test'=>$test
    }


    /**
     * Страница отдельного товара
     */
    public function action_good(){
        $good = SQL::Instance()->SelectWithKey("goods", "id", $_GET["id"]);

        $this->title .=  $good["name"] ;
        $this->content = $this->Template('views/good.php', ["good"=>$good]);
    }

    /**
     * Добавление товара в корзину
     */
    public function action_cartAdd(){

        if(isset($_POST['id'])){
            $id = (int)($_POST['id']);

            //$goodTemp = SQL::Instance()->SelectWithKey('cart','id_good', $id);
            $goodTemp = SQL::Instance()->HardQuery("SELECT * FROM `cart` WHERE `user`= '".$this->user."' AND `id_good`=".$id);
            //die($goodTemp);


            if($goodTemp !== false){
                $id = $goodTemp['id_good'];
                $quantity = $goodTemp['quantity'];
                $quantity++;

                SQL::Instance()->HardQuery("UPDATE `cart` SET `quantity`=".$quantity." WHERE `user`= '".$this->user."' AND `id_good`=".$id);
                //UPDATE `cart` SET `quantity`=3 WHERE `user`= 'test' AND `id_good`= 2
                //exit($quantity);

                exit($this->cart = $this->getCart());
            }else {
                //die("НЕ Работает !");
                SQL::Instance()->HardQuery("INSERT INTO `cart`(`id_good`, `quantity`, `user`) VALUES (".$id." , 1 , '".$this->user."')");
                //INSERT INTO `cart`(`id_good`, `quantity`, `user`) VALUES (5 , 1 , 'asgfdsb')
                //exit("Товар добавлен в корзину !");
                exit($this->cart = $this->getCart());
            }
        }
    }

    /**
     * Удаление товара из корзины
     */
    public function action_cartDel(){
        if(isset($_POST['del-id'])){
            $id = (int)($_POST['del-id']);

            $goodTemp = SQL::Instance()->HardQuery("SELECT * FROM `cart` WHERE `user`= '".$this->user."' AND `id_good`=".$id);

            if($goodTemp['quantity'] == 1){
                //$id = $goodTemp['id_good'];
                SQL::Instance()->HardQuery("DELETE FROM `cart` WHERE `user`= '".$this->user."' AND `id_good`=".$id);
                //exit("Товар удален из корзины!");
                exit($this->cart = $this->getCart());
            } else {
                $quantity = $goodTemp['quantity'];
                $quantity--;
                SQL::Instance()->HardQuery("UPDATE `cart` SET `quantity`=".$quantity." WHERE `user`= '".$this->user."' AND `id_good`=".$id);
                //exit("$quantity");
                exit($this->cart = $this->getCart());
            }
        }
    }

}