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

    /**
     * Задаем параметры которые будем выводить на страницу через шаблонизатор.
     */
    protected function before()
    {
        $this->title = '';
        $this->content = '';
    }

    /**
     * @return mixed|string
     * Задает значение переменной user, используется для добавления товаров в корзину.
     */
    protected function getUser(){
        if ($_SESSION['login']) {
            return $this->user = $_SESSION['login'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
            $stringIp = str_replace('.', '', $ip);
            $this->user = "newUser_".$stringIp;
            $_SESSION['login'] = $this->user;
            return $this->user;
        }
    }

    /**
     * @return false|string
     * Генерирует корзину товаров.
     */
    protected function getCart()
    {
        if ($_SESSION['login']){
            $user = $_SESSION['login'];
            $cartGoods = SQL::Instance()->SelectWithKey('cart', 'user', $user , true);
        } else $cartGoods = null;

        return $cart = $this->Template('views/cart.php', ['cartGoods'=> $cartGoods]);
    }

    protected function getComments()
    {

    }

    /**
     *Рендерит получившуюся страницу, с заданными параметрами.
     */
    public function render()
    {
        $vars = array('title' => $this->title, 'content' => $this->content, 'cart'=> $this->getCart());
        $page = $this->Template('views/main.php', $vars);
        echo $page;
    }
}