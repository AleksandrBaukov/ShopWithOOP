<?php

class User
{

    public function pass($login, $password): string
    {
        return strrev(md5($login)) . md5($password);
    }


    public function getUser($id): array
    {
        return SQL::Instance()->Select("users", "id", $id);
    }

    public function registration($login, $email, $password): bool
    {
        $user = SQL::Instance()->Select("users", "login", $login);
        if (!$user) {
            SQL::Instance()->Insert("users", ["login" => $login, "email" => $email, "pass" => $this->pass($login, $password), "admin" => 0]);
            return true;
        } else {
            return false;
        }
    }

    public function login($login, $password): string
    {
        $user = SQL::Instance()->Select("users", "login", $login);
        if ($user) {
            if ($user['pass'] == $this->pass($user['login'], strip_tags($password))) {
                $_SESSION['login'] = $user['login'];
                return 'Добро пожаловать в систему, ' . $user['login'] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
    }

    public function logout(): bool
    {
        if (isset($_SESSION["login"])) {
            $_SESSION["login"] = null;
            session_destroy();
            return true;
        }
        return false;

    }
}

?>