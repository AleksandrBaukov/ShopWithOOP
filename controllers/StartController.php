<?php

class StartController extends Controller
{
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

    public function action_index()
    {
        $this->title .= 'Portfolio PSD Template';
    }

    public function render()
    {
        $vars = array('title' => $this->title, 'content' => $this->content);
        $page = $this->Template('views/start.php', $vars);
        echo $page;
    }
}