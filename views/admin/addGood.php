<form method="post" action="index.php?c=admin&act=add" class="admin-form" enctype="multipart/form-data">
    <p><strong>Добавить товар:</strong></p>
    <hr>
    <p><strong>Загрузите картинку в формате JPEG, PNG или GIF. Размером не более 10мб.</strong></p>
    <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" required></p>
    <p>Введите наименование: <br><input type="text" name="name" maxlength="100" required></p>
    <p>Введите краткое описание: <br><textarea name="smallDesc" rows="10" required></textarea></p>
    <p>Введите подробное описание: <br><textarea name="fullDesc" rows="10" required></textarea></p>
    <p>Введите цену: <br><input type="number" name="price" maxlength="20" required></p>

    <p><input type="submit" name="submit" value="Добавить" class="buy-btn"></p>
</form>