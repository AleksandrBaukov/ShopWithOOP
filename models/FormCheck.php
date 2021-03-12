<?php
class FormCheck{
    public static function CommentsCheck($fio) {

        $regForFio = '/^[а-яёa-z0-9-_]{3,}$/iu';
        $correctFio = preg_match($regForFio, $fio);
        if ($correctFio){
            return true;
        } exit('Введите корректное имя/логин. Не короче 2х символов');
    }

    public static function CommentAdd(){
        $fio = trim(htmlspecialchars($_POST['fio']));
        $text = trim(htmlspecialchars($_POST['text']));


        $res = self::CommentsCheck($fio);
        if ($res){
            SQL::Instance()->Insert('comments', ['fio'=>$fio, 'text'=>$text, 'id_good'=> $_GET['id']]);
            return header("Location: index.php?act=good&id=".$_GET['id']);
        } exit('Что то пошло не так =(');
    }
}