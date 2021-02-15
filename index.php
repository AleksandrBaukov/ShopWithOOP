<?php

require_once "Autoloader.php";

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

if (isset($_GET['c'])) {
    if ($_GET['c'] == 'page') {
        $controller = new PageController();
    } else if ($_GET['c'] == 'user') {
        $controller = new UserController();
    }else if ($_GET['c'] == 'admin') {
        $controller = new AdminController();
    }
} else {
    $controller = new PageController();
}



$controller->Request($action);