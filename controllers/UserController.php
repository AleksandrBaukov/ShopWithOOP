<?php

class UserController extends BaseController {
//    private $user;
    private $reg = "views/registration.php";
    private $auth = "views/authorization.php";

    public function __construct () {
        $this->user = new User();
    }

    public function action_reg() {

        $this->title .= 'Portfolio/Registration';
        $this->content = $this->Template($this->reg, array());

        if($this->isPost()) {
            $result = $this->user->registration($_POST['login'], $_POST['email'], $_POST['password']);
            if ($result) {
                $this->content = $this->Template($this->reg, array('text' => $_POST['login']." вы успешно зарегестрированы!"));
            } else {
                $this->content = $this->Template($this->reg, array('text' => "Такой пользователь уже зарегестрирован !"));
            }
        }
    }

    public function action_login() {
        $this->title .= 'Portfolio/Login';
        $this->content = $this->Template($this->auth, array());

        if($this->isPost()) {
            $result = $this->user->login($_POST['login'], $_POST['password']);
            $this->content = $this->Template($this->auth, array('text' => $result));

        }
    }

    public function action_logout() {
        $this->user->logout();

        $this->title .= 'Portfolio/catalog';
        $goods = SQL::Instance()->SelectWithKey("goods");
        $this->content = $this->Template('views/index.php', ["goods"=>$goods]);
    }

    public function action_acc() {
        $this->title .= 'Portfolio/Account';
        $user = SQL::Instance()->SelectWithKey("users", "login", $_SESSION["login"]);
        $this->content = $this->Template('views/account.php', ['user' => $user]);
    }
}
?>