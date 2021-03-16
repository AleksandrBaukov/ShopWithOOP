<?php
class FormCheck{
    /**
     * @param $fio
     * @return bool
     * Валидация комментария.
     */
    public static function CommentsCheck($fio): bool
    {

        $regForFio = '/^[а-яёa-z0-9-_]{3,}$/iu';
        $correctFio = preg_match($regForFio, $fio);
        if ($correctFio){
            return true;
        } exit('Введите корректное имя/логин. Не короче 2х символов');
    }

    /**
     * Добавление комментария.
     */
    public static function CommentAdd(){
        $fio = trim(htmlspecialchars($_POST['fio']));
        $text = trim(htmlspecialchars($_POST['text']));


        $res = self::CommentsCheck($fio);
        if ($res){
            SQL::Instance()->Insert('comments', ['fio'=>$fio, 'text'=>$text, 'id_good'=> $_GET['id']]);
            return header("Location: index.php?act=good&id=".$_GET['id']);
        } echo '<h1>Что то пошло не так =(</h1>>'; exit;
    }

    /**
     * Добавление и редактирование товаров.
     */
    public static function GoodAddOrEdit(){

            $name = trim(htmlspecialchars($_POST['name']));
            $smallDesc = trim(htmlspecialchars($_POST['smallDesc']));
            $fullDesc = trim(htmlspecialchars($_POST['fullDesc']));
            $price = (int)trim(htmlspecialchars($_POST['price']));

            /**
             * @param $input
             * @return string
             * Функция взята из интернета.
             */
            function translate($input): string
            {
                $assoc = array(
                    'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'j', 'з'=>'z', 'и'=>'i', 'й'=>'i', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'y', 'ф'=>'f', 'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh', 'ы'=>'i', 'э'=>'e', 'ю'=>'u', 'я'=>'ya',
                    'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ё'=>'Yo', 'Ж'=>'J', 'З'=>'Z', 'И'=>'I', 'Й'=>'I', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O', 'П'=>'P', 'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'Y', 'Ф'=>'F', 'Х'=>'H', 'Ц'=>'C', 'Ч'=>'Ch', 'Ш'=>'Sh', 'Щ'=>'Sh', 'Ы'=>'I', 'Э'=>'E', 'Ю'=>'U', 'Я'=>'Ya', 'ь'=>'', 'Ь'=>'', 'ъ'=>'', 'Ъ'=>'',
                );
                return $res = strtr($input, $assoc);
            }

        /**
         * @param $dir
         * @param $dir_thumbs
         * @param $newwidth
         * @param false $newheight
         * @param int $quality
         * Функция взята из интернета.
         */
        function image_resize(
                $dir,
                $dir_thumbs,
                $newwidth,
                $newheight = FALSE,
                $quality = 100 // качество для формата jpeg
            ) {
                ini_set("gd.jpeg_ignore_warning", 1); // иначе на некоторых jpeg-файлах не работает

                list($oldwidth, $oldheight, $type) = getimagesize($dir);
                switch ($type) {
                    case IMAGETYPE_JPEG: $typestr = 'jpeg'; break;
                    case IMAGETYPE_GIF: $typestr = 'gif' ;break;
                    case IMAGETYPE_PNG: $typestr = 'png'; break;
                }
                $function = "imagecreatefrom$typestr";
                $src_resource = $function($dir);

                if (!$newheight) { $newheight = round($newwidth * $oldheight/$oldwidth); }
                elseif (!$newwidth) { $newwidth = round($newheight * $oldwidth/$oldheight); }
                $destination_resource = imagecreatetruecolor($newwidth,$newheight);

                imagecopyresampled($destination_resource, $src_resource, 0, 0, 0, 0, $newwidth, $newheight, $oldwidth, $oldheight);

                if ($type = 2) { # jpeg
                    imageinterlace($destination_resource, 1); // чересстрочное формирование изображение
                    imagejpeg($destination_resource, $dir_thumbs, $quality);
                }
                else { # gif, png
                    $function = "image$typestr";
                    $function($destination_resource, $dir_thumbs);
                }

                imagedestroy($destination_resource);
                imagedestroy($src_resource);
            }

            $filePath  = $_FILES['img']['tmp_name'];
            $fileName  = translate($_FILES['img']['name']);
            $type = $_FILES['img']['type'];
            $size = $_FILES['img']['size'];

            if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
                if($size>0 and $size<10*1024*1024){ // Первое число из 3х, это количество МБ
                    if(copy($filePath,"public/img/".$fileName)){
                        image_resize("public/img/".$fileName, "public/img/".$fileName, 750, 500); //Задаем нужную ширину и высоту
                        if(isset($_POST["edit"])){
                            $id = (int)trim(strip_tags($_POST['edit']));
                            SQL::Instance()->Update('goods', ['name'=>$name, 'price'=>$price, 'path'=>"public/img/".$fileName,
                                                    'smallDesc'=>$smallDesc, 'fullDesc'=> $fullDesc], "id=$id");
                            //editProduct($connect, $id, $name, $price, "img/".$fileName, $smallDesc, $fullDesc); //тут Путь с пабликом
                            header("Location: index.php?c=admin");
                        }else{
                            SQL::Instance()->Insert('goods', ['name'=>$name, 'price'=>$price, 'path'=>"public/img/".$fileName,
                                'smallDesc'=>$smallDesc, 'fullDesc'=> $fullDesc]);
                            //newProduct($connect, $name, $price, "img/".$fileName, $smallDesc, $fullDesc); //тут Путь с пабликом
                            header("Location: index.php?c=admin");
                        }
                    }else{
                        echo "<h1 style='color: red'>Ошибка! Не удалось загрузить файл на сервер!</h1>";
                        exit;
                    }
                }else{
                    echo "<h1 style='color: red'>Ошибка - картинка превышает 10 Мб.</h1>";
                    exit;
                }
            }else{
                echo "<h1 style='color: red'>Картинка не подходит по типу! Картинка должна быть в формате JPEG, PNG или GIF</h1>";
                exit;
            }
    }
}