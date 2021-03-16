<form method="post" action="index.php?c=admin&act=edit&id=<?=$_GET['id']?>" class="admin-form" enctype="multipart/form-data">
    <p><strong>Редактировать товар:</strong></p>
    <hr>
    <a href="index.php?c=admin&act=del&id=<?= $good['id'] ?>&path=<?=$good['path']?>" class="buy-btn">Удалить Товар</a>
    <hr>
    <p><strong>Загрузите картинку в формате JPEG, PNG или GIF. Размером не более 10мб.</strong></p>
    <p><img src="<?=$good['path']?>" width="200"></p>
    <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" required></p>
    <p>Наименование: <br><input type="text" name="name" maxlength="100" value="<?=$good['name']?>"></p>
    <p>Краткое описание: <br><textarea name="smallDesc" rows="10"><?=$good['smallDesc']?></textarea></p>
    <p>Подробное описание: <br><textarea name="fullDesc" rows="10"><?=$good['fullDesc']?></textarea></p>
    <p>Цена: <br><input type="number" name="price" maxlength="20" value="<?=$good['price']?>" ></p>
    <input type="hidden" name="src" value="<?=$good['path']?>">
    <input type="hidden" name="edit" value="<?=$good['id']?>">
    <p><input type="submit" name="submit" value="Редактировать" class="buy-btn"></p>
</form>
