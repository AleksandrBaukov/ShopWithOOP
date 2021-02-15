<?php
/**
 * Базовый класс, отвечающий за подстановку данных на страницы.
 */
abstract class BaseController extends Controller
{
    protected $title;
    protected $content;
    protected $cart;
    protected $user;

    function __construct()
    {
    }

    protected function before()
    {
        $this->title = '';
        $this->content = '';
    }

    protected function getUser(){
        if ($_SESSION['login']) {
            return $this->user = $_SESSION['login'];
        } else return $this->user = null;
    }

    private function getCart()
    {
        if ($_SESSION['login']){
            $user = $_SESSION['login'];
            $cartGoods = SQL::Instance()->SelectWithKey('cart', 'user', $user , true);
        } else $cartGoods = null;

        return  $this->Template('views/cart.php', ['cartGoods'=> $cartGoods]);
    }

    public function render()
    {
        $vars = array('title' => $this->title, 'content' => $this->content, 'cart'=> $this->getCart()); // , 'cart'=> $this->cart
        $page = $this->Template('views/main.php', $vars);
        echo $page;
    }
}