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
        $this->title .= 'Portfolio/Admin';

        $goods = SQL::Instance()->Select("goods");
        $this->content = $this->Template('views/admin/index.php', ["goods"=>$goods]);
    }

    public function render()
    {
        $vars = array('title' => $this->title, 'content' => $this->content);
        $page = $this->Template('views/admin/main.php', $vars);
        echo $page;
    }

    public function action_add(){
        if($_POST['submit']){
            FormCheck::GoodAddOrEdit();
        }

        $this->title .= 'Portfolio/Admin/Add';
        $this->content = $this->Template('views/admin/addGood.php');
    }

    public function action_edit(){
        if($_POST['submit']){
            FormCheck::GoodAddOrEdit();
        }
        $id =$_GET["id"];
        $good = SQL::Instance()->Select("goods", "id", $id);

        $this->title .= 'Portfolio/Admin/Edit';
        $this->content = $this->Template('views/admin/editGood.php', ["good"=>$good]);
    }

    public function action_del(){
        $id =$_GET["id"];
        $path = $_GET['path'];
        SQL::Instance()->Delete('goods', "id=$id");

        unlink($path);

        header("Location: index.php?c=admin");
        exit;
    }
}