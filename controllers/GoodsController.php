<?php

class GoodsController extends BaseController {
    function __construct()
    {
        $this->user = $this->getUser();
    }

    /**
     * Главная страница
     */
    public function action_index(){
        $this->title .= 'Portfolio/Catalog';
        $goods = SQL::Instance()->Select("goods");

        $this->content = $this->Template('views/index.php', ["goods"=>$goods, ]);//'test'=>$test
    }


    /**
     * Страница отдельного товара
     */
    public function action_good(){
        $id =$_GET["id"];
        $good = SQL::Instance()->Select("goods", "id", $id);
        $comm = SQL::Instance()->Select('comments', 'id_good', $id, true);
        $comments = $this->Template('views/comments.php', ['comments'=>$comm]);

        $this->title .=  $good["name"] ;
        $this->content = $this->Template('views/good.php', ["good"=>$good, 'comments'=>$comments]);
    }

    /**
     * Добавление товара в корзину
     */
    public function action_cartAdd(){

        if(isset($_POST['id'])){
            $id = (int)($_POST['id']);
            $goodTemp = SQL::Instance()->HardQuery("SELECT * FROM `cart` WHERE `user`= '".$this->user."' AND `id_good`=".$id);

            if($goodTemp !== false){
                $id = $goodTemp['id_good'];
                $quantity = $goodTemp['quantity'];
                $quantity++;

                SQL::Instance()->HardQuery("UPDATE `cart` SET `quantity`=".$quantity." WHERE `user`= '".$this->user."' AND `id_good`=".$id);

                exit($this->cart = $this->getCart());
            }else {
                SQL::Instance()->HardQuery("INSERT INTO `cart`(`id_good`, `quantity`, `user`) VALUES (".$id." , 1 , '".$this->user."')");

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
                SQL::Instance()->HardQuery("DELETE FROM `cart` WHERE `user`= '".$this->user."' AND `id_good`=".$id);
                exit($this->cart = $this->getCart());
            } else {
                $quantity = $goodTemp['quantity'];
                $quantity--;
                SQL::Instance()->HardQuery("UPDATE `cart` SET `quantity`=".$quantity." WHERE `user`= '".$this->user."' AND `id_good`=".$id);
                exit($this->cart = $this->getCart());
            }
        }
    }

}