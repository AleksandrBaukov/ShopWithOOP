<?php

session_start();

/**
 * Базовый абстрактный класс.
 */
abstract class Controller
{
    protected abstract function render();

    protected abstract function before();

    /**
     * @param $action
     */
    public function Request($action)
    {
        $this->before();
        $this->$action();   //$this->action_index
        $this->render();
    }


    protected function IsGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    protected function IsPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * @param $classname
     * @param array $vars
     * @return false|string
     * Собственный шаблонизатор
     */
    protected function Template($classname, $vars = array())
    {
        foreach ($vars as $k => $v) {
            $$k = $v;
        }

        ob_start();
        include "$classname";
        return ob_get_clean();
    }

    private function __sleep() {}
    private function __wakeup() {}
    private function __clone() {}
}
