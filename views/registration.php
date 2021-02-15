<section class="registration">

    <h1>Registration</h1>
    <hr>
    <?
    if(isset($_SESSION['login']) && isset($_SESSION['pass'])){
        echo "You are already log in";
    }else{
        echo $text?$text:"";?>
        <form method="post">
            <p>Логин: <input type="text" name="login" maxlength="30" placeholder="Введите Логин" autofocus required></p>
            <p>Email: <input type="email" name="email" maxlength="30" placeholder="Введите Email" required></p>
            <p>Пароль: <input type="password" minlength="2" name="pass" placeholder="Введите Пароль" required></p>
            <input type="submit" name="submit" value="Зарегистрироваться">
        </form>
    <?}?>
</section>