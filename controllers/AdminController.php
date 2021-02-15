<?php

class AdminController extends BaseController {

    public function action_index(){
        $this->title .= 'Admin';

        $goods = SQL::Instance()->SelectWithKey("goods");
        $this->content = $this->Template('views/admin/index.php', ["goods"=>$goods]);
    }
}