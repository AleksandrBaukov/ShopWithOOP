<?php

require_once "Autoloader.php";

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

if (isset($_GET['c'])) {
    if ($_GET['c'] == 'page') $controller = new GoodsController();
        else if ($_GET['c'] == 'user') $controller = new UserController();
        else if ($_GET['c'] == 'admin') $controller = new AdminController();
        else if($_GET['c'] == 'start') $controller = new StartController();
        else if($_GET['c'] == 'comm') $controller = new CommentsController();
}else  $controller = new GoodsController();

// Пример index.php?c=admin&act=addOrEdit&id=1

$controller->Request($action);