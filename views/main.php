<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$title?></title>

    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/fonts/fonts.css">
    <link rel="SHORTCUT ICON" href="../public/img/logos.png" type="image/png">
</head>
<body>
<div class="container">
    <header class="header catalog-header">
        <div class="head catalog-head">
            <div class="logo">
                <a href="index.php" class="logo-icon"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="56" viewBox="0 0 64 56">
                        <path d="M31.854 19.905L26.6 10.713h10.508zm-1.314.766H20.032l5.254-9.191zm2.628 0l5.254-9.191 5.254 9.191zm10.508 1.53l-5.254 9.189-5.254-9.188zm-13.136 0l-5.254 9.189-5.254-9.188zm-11.822.766l5.253 9.187H13.465zm21.02 9.187l5.252-9.187 5.253 9.187zm-2.63-22.97H26.6l5.254-9.19zm2.63 24.502h10.505l-5.253 9.188zm-26.273 0H23.97l-5.253 9.188zm-1.314.765l5.253 9.19H6.897zm34.152 9.19l5.254-9.19 5.254 9.19zm10.508 1.53l-5.254 9.188-5.254-9.187zm-13.135 0l-5.254 9.188-5.254-9.187zm-36.779 0h10.507L12.15 54.36zm-1.315.768l5.254 9.189H.33zm26.272 0l5.254 9.189H26.6zm13.136 0l5.253 9.189H39.738zm18.387 9.189H52.873l5.252-9.189z" />
                        <path d="M31.854 19.905L26.6 10.713h10.508zm-1.314.766H20.032l5.254-9.191zm2.628 0l5.254-9.191 5.254 9.191zm10.508 1.53l-5.254 9.189-5.254-9.188zm-13.136 0l-5.254 9.189-5.254-9.188zm-11.822.766l5.253 9.187H13.465zm21.02 9.187l5.252-9.187 5.253 9.187zm-2.63-22.97H26.6l5.254-9.19zm2.63 24.502h10.505l-5.253 9.188zm-26.273 0H23.97l-5.253 9.188zm-1.314.765l5.253 9.19H6.897zm34.152 9.19l5.254-9.19 5.254 9.19zm10.508 1.53l-5.254 9.188-5.254-9.187zm-13.135 0l-5.254 9.188-5.254-9.187zm-36.779 0h10.507L12.15 54.36zm-1.315.768l5.254 9.189H.33zm26.272 0l5.254 9.189H26.6zm13.136 0l5.253 9.189H39.738zm18.387 9.189H52.873l5.252-9.189z" /></svg></a>
                <a href="index.php" class="logo-title"><span class="logo_name">Waxom</span></a>
            </div>
            <nav>
                <a href="index.php">Home</a>
                <a href="index.php" class="nav-active">Catalog</a>
                <a href="#">Reviews</a>
                <?php
                if(isset($_SESSION['login'])) {
                    echo "<a href='index.php?act=acc&c=user'>Account</a>";
                    echo "<a href='index.php?act=logout&c=user'>Log out</a><span class='test'>( ".$_SESSION['login']." )</span>";
                    echo "<a href='index.php?act=order&c=user'>Order</a>";
                }else{
                    echo "<a href='index.php?act=login&c=user'>Log in</a>";
                    echo "<a href='index.php?act=reg&c=user'>Registration</a>";
                }
                if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
                    ?>
                    <a href="index.php?c=admin">For admin</a>
                <?}?>
            </nav>
            <div class="head-icons">
                <div>
                    <button class="icon-cart" type="button" ><span class="icon-cart-btn-count"></span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                            <path d="M17.994 5.997v14.998a3 3 0 0 1-2.999 3H3.002a3 3 0 0 1-2.999-3V5.997A2.999 2.999 0 0 1 3.002 3H4.5c0-1.657 2.013-3 4.498-3 2.484 0 4.497 1.343 4.497 3h1.5a2.999 2.999 0 0 1 2.998 2.998zM6 3h5.997c0-1.037-1.342-1.5-2.998-1.5-1.656 0-2.999.463-2.999 1.5zm10.495 16.496H1.502v1.5c0 .828.672 1.5 1.5 1.5h11.993a1.5 1.5 0 0 0 1.5-1.5zm0-13.498a1.5 1.5 0 0 0-1.5-1.5h-1.499v4.5h-1.499v-4.5H6v4.5H4.501v-4.5h-1.5a1.5 1.5 0 0 0-1.499 1.5v11.998h14.993z" />
                            <path d="M17.994 5.997v14.998a3 3 0 0 1-2.999 3H3.002a3 3 0 0 1-2.999-3V5.997A2.999 2.999 0 0 1 3.002 3H4.5c0-1.657 2.013-3 4.498-3 2.484 0 4.497 1.343 4.497 3h1.5a2.999 2.999 0 0 1 2.998 2.998zM6 3h5.997c0-1.037-1.342-1.5-2.998-1.5-1.656 0-2.999.463-2.999 1.5zm10.495 16.496H1.502v1.5c0 .828.672 1.5 1.5 1.5h11.993a1.5 1.5 0 0 0 1.5-1.5zm0-13.498a1.5 1.5 0 0 0-1.5-1.5h-1.499v4.5h-1.499v-4.5H6v4.5H4.501v-4.5h-1.5a1.5 1.5 0 0 0-1.499 1.5v11.998h14.993z" /></svg>
                        <span class="icon-cart-count"></span>
                    </button>
                </div>
                <form action="#" class="head-form">
                    <input type="search" placeholder="search">
                    <button type="submit"></button>
                </form>
            </div>
            <div class="cart-block invisible">
                <?= $cart?>
                <a href="#" class="buy-btn"><span class="buy-btn-txt">Order</span></a>
            </div>
        </div>

    </header>

    <?= $content?>

    <section class="companies">
        <a href="#"><img src="../public/img/logo-01.png" alt="barber" width="200" height="100"></a>
        <a href="#"><img src="../public/img/logo-02.png" alt="delicious product" width="200" height="200"></a>
        <a href="#"><img src="../public/img/logo-03.png" alt="designers" width="200" height="100"></a>
        <a href="#"><img src="../public/img/logo-04.png" alt="cafe royal" width="200" height="150"></a>
    </section>
    <section class="information">
        <div class="information-blocks information-block-1">
            <div class="logo inf-logo">
                <a href="index.php" class="logo-icon inf-logo-icon"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="56" viewBox="0 0 64 56">
                        <path d="M31.854 19.905L26.6 10.713h10.508zm-1.314.766H20.032l5.254-9.191zm2.628 0l5.254-9.191 5.254 9.191zm10.508 1.53l-5.254 9.189-5.254-9.188zm-13.136 0l-5.254 9.189-5.254-9.188zm-11.822.766l5.253 9.187H13.465zm21.02 9.187l5.252-9.187 5.253 9.187zm-2.63-22.97H26.6l5.254-9.19zm2.63 24.502h10.505l-5.253 9.188zm-26.273 0H23.97l-5.253 9.188zm-1.314.765l5.253 9.19H6.897zm34.152 9.19l5.254-9.19 5.254 9.19zm10.508 1.53l-5.254 9.188-5.254-9.187zm-13.135 0l-5.254 9.188-5.254-9.187zm-36.779 0h10.507L12.15 54.36zm-1.315.768l5.254 9.189H.33zm26.272 0l5.254 9.189H26.6zm13.136 0l5.253 9.189H39.738zm18.387 9.189H52.873l5.252-9.189z" />
                        <path d="M31.854 19.905L26.6 10.713h10.508zm-1.314.766H20.032l5.254-9.191zm2.628 0l5.254-9.191 5.254 9.191zm10.508 1.53l-5.254 9.189-5.254-9.188zm-13.136 0l-5.254 9.189-5.254-9.188zm-11.822.766l5.253 9.187H13.465zm21.02 9.187l5.252-9.187 5.253 9.187zm-2.63-22.97H26.6l5.254-9.19zm2.63 24.502h10.505l-5.253 9.188zm-26.273 0H23.97l-5.253 9.188zm-1.314.765l5.253 9.19H6.897zm34.152 9.19l5.254-9.19 5.254 9.19zm10.508 1.53l-5.254 9.188-5.254-9.187zm-13.135 0l-5.254 9.188-5.254-9.187zm-36.779 0h10.507L12.15 54.36zm-1.315.768l5.254 9.189H.33zm26.272 0l5.254 9.189H26.6zm13.136 0l5.253 9.189H39.738zm18.387 9.189H52.873l5.252-9.189z" /></svg></a>
                <a href="index.php" class="logo-title inf-logo-title"><span class="logo_name inf-logo_name">Waxom</span></a>
            </div>
            <p class="information-block-1-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut&nbsp;laoreet dolore magna aliquam erat volutpat. Ut&nbsp;wisi enim ad&nbsp;minim veniam, quis nostrud exerci suscipit lobortis claritatem.</p>
            <a href="#" class="information-block-1-link">Read More</a>
        </div>
        <div class="information-blocks information-block-2">
            <h3 class="information-blocks-title">Recent Posts</h3>
            <div class="information-blocks-links">
                <a href="#" class="information-blocks-links-item">
                    <span>September&nbsp;08, 2015</span>
                    <p>Lorem ipsum dolor sit amet, consec&shy;tetuer adipiscing elit</p>
                </a>
                <a href="#" class="information-blocks-links-item">
                    <span>September&nbsp;08, 2015</span>
                    <p>Diam nonummy nibh euismod tincid&shy;unt ut&nbsp;laoreet dolore magna</p>
                </a>
                <a href="#" class="information-blocks-links-item">
                    <span>September&nbsp;08, 2015</span>
                    <p>Claritas est etiam processus dynamic&shy;us, qui sequitur mutationem per seac&shy;ula quarta decima</p>
                </a>
            </div>
        </div>
        <div class="information-blocks information-block-3">
            <h3 class="information-blocks-title">Our Twitter</h3>
            <div class="information-blocks-links">
                <a href="#" class="information-blocks-links-item">
                    <p><span class="twitter">@waxom</span>Cum soluta nobis eleifend option congue nihil imperdiet doming</p>
                    <span>3&nbsp;mins ago</span>
                </a>
                <a href="#" class="information-blocks-links-item">
                    <p>Mirum est <span class="twitter">#envato</span> notare quam littera gothica, quam nunc putamus parum anteposuerit litterarum</p>
                    <span>5&nbsp;hours ago</span>
                </a>
                <a href="#" class="information-blocks-links-item">
                    <p>Soluta nobis option <span class="twitter-link">bit.ly/1Hniso7</span></p>
                    <span>20&nbsp;days ago</span>
                </a>
            </div>
        </div>
        <div class="information-blocks information-block-4">
            <h3 class="information-blocks-title">Dribbble Widget </h3>
            <div class="information-block-4-foto">
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
            </div>
        </div>
    </section>
    <footer>
        <div class="copy-block">
            <span class="copy">Copyright &copy;&nbsp;2015 <span class="footer-logo">Waxom</span></span>
            <div class="copy-links">
                <a href="#">Privacy Policy</a>
                <a href="#">FAQ</a>
                <a href="#">Support</a>
            </div>
        </div>
        <div class="designet-block">
            <div class="designet-block-first">
                <span>Designed by</span>
                <a href="#">ThemeFire</a>
            </div>
            <div><span>Only on </span>
                <a href="#">Envato Market</a>
            </div>
        </div>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"
        integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP"
        crossorigin="anonymous"></script>
<script src="../public/js/app.js"></script>
</body>
</html>