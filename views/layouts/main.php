
<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="icon" href="favicon.ico">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="author" content="Марат Мутигуллин">
    <meta name="description" content="Продажа и аренда велосипедов и электросамокатов" />
    <meta name="keywords" content="Велосипеды, самокаты, электросамокаты" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    <link href="https://fonts.googleapis.com/css?family=Roboto:400,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
<!--    <link rel="stylesheet" href="css/style.css">-->
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header-desktop" >
    <div class="container">
        <nav class="navbar d-flex navbar_desktop">
            <ul class="nav d-flex pt-3">
                <li class="nav-item"><a href="#">Услуги</a></li>
                <li class="nav-item ml-4"><a href="#">Доставка</a></li>
                <li class="nav-item ml-4"><a href="#">Оплата</a></li>
                <li class="nav-item ml-4"><a href="#">Сервис</a></li>
            </ul>
            <ul class="nav nav_geo">
                <li class="nav-item"><a class="geo text-white mr-2"><i class="fas fa-map-marker-alt"></i
                        ></a><a href="#">Краснодар</a></li>
                <li class="nav-item ml-3 mt-1"><a href="#">+79528613959</a></li>
            </ul>

        </nav>

        <nav class="navbar navbar_one" >
            <ul class="nav ml-4">
                <li><a href="#"><h1 class=""><span class="logo">Eco</span><span class="text-white">Bike</span></h1></a></li>
            </ul>

            <ul class="nav mb-3 mr-4">
                <li class="nav-item text-white"><a href="#">Вход</a></li>
                <li class="nav-item ml-4"><i class="fas fa-shopping-cart text-white"></i><a href="#"></a></li>
            </ul>
        </nav>
    </div>
</header>  <!-- //header-desktop -->

<header class="header-mobile">
    <div class="container">
        <nav class="navbar navbar-sm d-flex justify-content-sm-between">
            <ul class="nav d-flex justify-content-sm-between">
                <li><a href="#"><h1 class=""><span class="text-success">Eco<span/><span class="text-white">Bike</span></h1></a></li>
            </ul>
            <ul class="d-flex mt-3">
                <li class="nav-item mr-3"><a href=""><i class="fas fa-key text-white text-white"></i></a></li>
                <li class="nav-item"><a href=""><i class="fas fa-shopping-cart text-white"></i></a></li>
            </ul>

        </nav>
    </div>
</header> <!-- //header-mobile -->








<div class="container">
    <nav class="menu p-2 d-flex  justify-content-sm-between">
        <ul class="nav">
            <li><a class="nav-link" href="">Акции</a></li>
            <li class="bike_menu"><a class="nav-link" href="">Велосипеды</a>
                <ul class="nav_item">
                    <li class="mt-3"><a class="" href="#">Горные</a></li>
                    <li class="mt-3"><a class="" href="#">Женские</a></li>
                    <li class="mt-3"><a class="" href="#">Детские</a></li>
                    <li class="mt-3"><a class="" href="#">Дорожные</a></li>
                    <li class="mt-3"><a class="" href="#">Трюковые</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="">Электросамокаты</a></li>
            <li><a class="nav-link" href="">Прокат</a></li>
            <li><a class="nav-link" href="">Тестдрайв</a></li>
        </ul>
        <ul class="nav">
            <form class="nav_form" action="action_page.php">
                <input type="text" placeholder="Поиск" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </ul>
    </nav>  <!-- /menu_desktop -->
</div> <!-- //container menu -->

<nav class="hamburger-menu menu_mob">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
        <span></span>
    </label>

    <ul class="menu__box">
        <li><a class="menu__item" href="#">Акции</a></li>
        <li><a class="menu__item" href="#">Велосипеды</a></li>
        <li><a class="menu__item" href="#">Электросамокаты</a></li>
        <li><a class="menu__item" href="#">Прокат</a></li>
        <li><a class="menu__item" href="#">Тестдрайв</a></li>
    </ul>

    <ul class="nav_form_mob">
        <form class="nav_form" action="action_page.php">
            <input type="text" placeholder="Поиск" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </ul>
</nav>

<?= Alert::widget() ?>
<?= $content ?>



<!--<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">-->
<!--    <div class="carousel-inner d-flex">-->
<!--        <div class="carousel-item active">-->
<!--            <img src="image/ban1.jpg" class="d-block w-100 " alt="...">-->
<!--        </div>-->
<!--        <div class="carousel-item">-->
<!--            <img src="image/ban2.jpg" class="d-block w-100 " alt="...">-->
<!--        </div>-->
<!--        <div class="carousel-item">-->
<!--            <img src="image/ban3.jpg" class="d-block w-100 " alt="...">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!---->
<!--<section class="main mt-4 stocks">-->
<!--    <h2 class="text-center">Хиты продаж</h2>-->
<!--    <div class="wrapper mt-2">-->
<!--        <input type="radio" name="point" id="slide1" checked>-->
<!--        <input type="radio" name="point" id="slide2">-->
<!--        <input type="radio" name="point" id="slide3">-->
<!--        <div class="slider">-->
<!---->
<!--            <div class="slides slide1 d-flex justify-content-center">-->
<!--                <div>-->
<!--                    <img src="image/stark-outpost.jpg" alt="" width="300"><p class="bike_text text-center">Горный велосипед-->
<!--                        Stark Outpost 26.1 D(2020)</p><button type="button" class="btn text-white">16 990 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--                </div>-->
<!---->
<!--                <div>-->
<!--                    <img  src="image/stark-slash.jpg" alt="" width="300"><p class="-->
<!--bike_text text-center">Горный велосипед-->
<!--                        Stark Slash 26.1 D(2020)</p><button type="button" class="btn text-white">16-->
<!--                        990 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <img  src="image/stark-tank.jpg" alt="" width="300"><p p class="-->
<!--bike_text text-center">Горный велосипед-->
<!--                        Stark Tank 29.1 HD(2020)</p><button type="button" class="btn text-white">23 				250 P<i class="fas fa-shopping-cart slide_icon"></i></button>     </div>-->
<!--            </div>  <!-- //slide-->-->
<!---->
<!--            <div class="slides slide2 d-flex justify-content-center">-->
<!---->
<!--                <div><img src="image/schwinn-baywood.jpg" alt="" width="300"><p class="bike_text text-center">Женский велосипед-->
<!--                        Schwinn Sierra Women (2020)-->
<!--                    </p><button type="button" class="btn btn-success">29-->
<!--                        950 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--                </div>-->
<!---->
<!--                <div><img src="image/schwinn-s1-women.jpg" alt="" width="292"><p class="bike_text text-center">Женский велосипед-->
<!--                        Schwinn S1 Women(2020)-->
<!--                    </p><button type="button" class="btn btn-success">17 490 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--                </div>-->
<!---->
<!--                <div>-->
<!--                    <img src="image/schwinn-sierra-women.jpg" alt="" width="300">-->
<!--                    <p class="bike_text text-center">Женский велосипед-->
<!--                        Schwinn Sierra Women(2020)-->
<!--                    </p><button type="button" class="btn btn-success">29 950 P<i class="fas-->
<!--fa-shopping-cart slide_icon"></i></button>-->
<!--                </div>-->
<!---->
<!--            </div>  <!-- //slide2-->-->
<!---->
<!--            <div class="slides slide3 d-flex justify-content-center">-->
<!--                <div>-->
<!--                    <img src="image/harley-scooter-H8P.jpg" alt="" width="300">-->
<!--                    <p class="bike_text text-center">Электроскутер-->
<!--                        Harley Scooter H8P 1000W (60V/12Ah)-->
<!--                    </p><button type="button" class="btn btn-success">48 000 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--                </div>-->
<!---->
<!--                <div>-->
<!--                    <img src="image/mi-electric-scooter.jpg" alt="" width="300">-->
<!--                    <p class="bike_text text-center">Электросамокат-->
<!--                        Xiaomi Mi Electric Scooter-->
<!--                    </p><button type="button" class="btn btn-success">20 500 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <img src="image/mija-m365.jpg" alt="" width="300">-->
<!--                    <p class="bike_text text-center">Электросамокат-->
<!--                        Xiaomi Mijia M365 7800mAh-->
<!--                    </p><button type="button" class="btn btn-success">20 900 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--                </div>-->
<!--            </div>  <!-- slide3 -->-->
<!---->
<!---->
<!--        </div>-->
<!--        <div class="controls">-->
<!--            <label for="slide1"></label>-->
<!--            <label for="slide2"></label>-->
<!--            <label for="slide3"></label>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--<section class="stocks_mob">-->
<!--    <div>-->
<!--        <img src="image/stark-outpost.jpg" alt="" width="300"><p class="bike_text text-center">Горный велосипед-->
<!--            Stark Outpost 26.1 D(2020)</p><button type="button" class="btn text-white">16 990 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--    </div>-->
<!---->
<!--    <div>-->
<!--        <img  src="image/stark-slash.jpg" alt="" width="300"><p class="-->
<!--bike_text text-center">Горный велосипед-->
<!--            Stark Slash 26.1 D(2020)</p><button type="button" class="btn text-white">16-->
<!--            990 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!--    </div>-->
<!---->
<!--    <div>-->
<!--        <img  src="image/stark-tank.jpg" alt="" width="300"><p p class="-->
<!--bike_text text-center">Горный велосипед-->
<!--            Stark Tank 29.1 HD(2020)</p><button type="button" class="btn text-white">23 				250 P<i class="fas fa-shopping-cart slide_icon"></i></button>-->
<!---->
<!--    </div>-->
<!---->
<!--</section> <!-- /хиты продаж моб весия -->-->
<!---->
<!---->
<!--<div class="container">-->
<!--    <div class="email row mb-4 mt-5 justify-content-sm-center">-->
<!--        <div class="col-6 email_item " >-->
<!--            <label class="" for=""><img src="image/mail.png" alt="" width="35">Унай о всех акциях первым</label>-->
<!--        </div>-->
<!---->
<!--        <div class="email_inp col-6 d-flex justify-content-end">-->
<!--            <input type="email" placeholder="введите свою почту">-->
<!--            <button class="email_btn" >Подписаться</button>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div> <!-- /подписаться на почту -->-->


<footer>
    <div class="container h-100">
        <div class="row mb-3">
            <div class="col-6 p-0  col-sm-6">
                <ul class="d-flex justify-content-start menu_footer justify-content-sm-start">
                    <li class="text-white" ><a href=""></a>Каталог</li>
                    <li class="ml-3 text-white" ><a href=""></a>Помощь</li>
                    <li class="ml-3 text-white" ><a href=""></a>О нас</li>
                </ul>
            </div>
            <div class="col-6 p-0  col-sm-6">
                <ul class="d-flex  justify-content-end menu_icon">
                    <li class="nav-item"><a href=""><i class="fab fa-vk text-white footer-icon"></i></a></li>
                    <li class="nav-item ml-3"><a href=""><i class="fab fa-facebook-f footer-icon text-white footer-icon"></i></a></li>
                    <li class="nav-item ml-3 mr-3"><a href=""><i class="fab fa-instagram footer-icon text-white footer-icon"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>