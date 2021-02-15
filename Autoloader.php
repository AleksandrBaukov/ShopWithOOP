<?php
require_once "config/Config.php";

spl_autoload_register('autoloadClass');

function autoloadClass($className)
{
    $dirs = ['controllers', 'models', 'config'];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.php';

        if (is_file($fileName)) {
            require_once($fileName);
            $found = true;
        }
    }
    if (!$found) {
        throw new Exception('Загрузка не удалась ' . $className);
    }
    return true;
}
