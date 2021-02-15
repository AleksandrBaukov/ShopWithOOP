<section class="login">
    <?
    if(isset($_SESSION['login'])){
        echo "Welcome ".$_SESSION['login']." !";
    }else{
        echo "<h1>Log in</h1><hr>";
        echo $text?$text:"";
        ?>
        <form method="post">
            <p>Login: <input type="text" name="login" maxlength="30" placeholder="Enter login" autofocus required></p>
            <p>Пароль: <input type="password" minlength="2" name="pass" placeholder="Enter password" required></p>
            <input type="submit" name="enter" value="Login" ">
        </form>
    <?}?>
</section>