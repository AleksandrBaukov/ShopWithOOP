<?php
class CommentsController extends BaseController {

    public function action_index(){
        if($_POST['submit']){
           FormCheck::CommentAdd();
        }
    }


}