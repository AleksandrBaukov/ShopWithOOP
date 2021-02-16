<?php

require_once "Autoloader.php";

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

if (isset($_GET['c'])) {
    if ($_GET['c'] == 'page') {
        $controller = new GoodsController();
    } else if ($_GET['c'] == 'user') {
        $controller = new UserController();
    }else if ($_GET['c'] == 'admin') {
        $controller = new AdminController();
    }else if($_GET['c'] == 'start'){
        $controller = new StartController();
    }
} else {
    $controller = new GoodsController();
}

//if (isset($_GET['c'])) {
//    switch ($_GET['c']){
//        case 'page':
//            $controller = new GoodsController();
//            break;
//        case 'user':
//            $controller = new UserController();
//            break;
//        case 'admin':
//            $controller = new AdminController();
//            break;
//        case 'start':
//            $controller = new StartController();
//            break;
//        default:
//            $controller = new StartController();
//            break;
//    }
//}



$controller->Request($action);