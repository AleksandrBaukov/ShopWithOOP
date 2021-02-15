<?php

class PageController extends BaseController {

    function __construct()
    {
        $user = $this->getUser();
    }

    public function action_index(){
        //$test = SQL::Instance()->SelectWithKey('cart','id_good', 2);
        $this->title .= 'Portfolio/catalog';

        $goods = SQL::Instance()->SelectWithKey("goods");
        $this->content = $this->Template('views/index.php', ["goods"=>$goods, ]);//'test'=>$test
    }

    public function action_good(){
        $good = SQL::Instance()->SelectWithKey("goods", "id", $_GET["id"]);

        $this->title .=  $good["name"] ;
        $this->content = $this->Template('views/good.php', ["good"=>$good]);
    }

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
                exit("$quantity");
            }else {
                //die("НЕ Работает !");
                SQL::Instance()->HardQuery("INSERT INTO `cart`(`id_good`, `quantity`, `user`) VALUES (".$id." , 1 , '".$this->user."')");
                //INSERT INTO `cart`(`id_good`, `quantity`, `user`) VALUES (5 , 1 , 'asgfdsb')
                exit("Товар добавлен в корзину !");
            }
        }
    }

    public function action_cartDel(){
        if(isset($_POST['del-id'])){
            $id = (int)($_POST['del-id']);

            $goodTemp = SQL::Instance()->HardQuery("SELECT * FROM `cart` WHERE `user`= '".$this->user."' AND `id_good`=".$id);

            if($goodTemp['quantity'] == 1){
                //$id = $goodTemp['id_good'];
                SQL::Instance()->HardQuery("DELETE FROM `cart` WHERE `user`= '".$this->user."' AND `id_good`=".$id);
                exit("Товар удален из корзины!");
            } else {
                $quantity = $goodTemp['quantity'];
                $quantity--;
                SQL::Instance()->HardQuery("UPDATE `cart` SET `quantity`=".$quantity." WHERE `user`= '".$this->user."' AND `id_good`=".$id);
                exit("$quantity");
            }
        }
    }

}