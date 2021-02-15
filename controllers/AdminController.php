<?php

class AdminController extends Controller {

    protected $title;
    protected $content;

    function __construct()
    {
    }

    protected function before()
    {
        $this->title = '';
        $this->content = '';
    }

    public function action_index(){
        $this->title .= 'Admin';

        $goods = SQL::Instance()->SelectWithKey("goods");
        $this->content = $this->Template('views/admin/index.php', ["goods"=>$goods]);
    }

    public function render()
    {
        $vars = array('title' => $this->title, 'content' => $this->content);
        $page = $this->Template('views/admin/main.php', $vars);
        echo $page;
    }
}