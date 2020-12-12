<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Product;
use app\models\Category;
use app\controllers\ProductController;
use app\controllers\CategoryController;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <!--    яндекс метрика-->
        <meta name="yandex-verification" content="282a5133b0cd233e" />
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <link rel="icon" href="favicon.ico">
        <!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <meta name="author" content="Марат Мутигуллин">
        <meta name="description" content="Продажа и аренда велосипедов" />
        <meta name="keywords" content="Велосипеды, детскиевелосипеды, женские велосипеды, горные велосипеды, " />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,900i&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/fontawesome/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <?php $this->registerCsrfMetaTags() ?>
        <title>Админка | <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header class="header-desktop" >
        <div class="container">



            <div class="row mt-4">
                <div class="col-8">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link nav_link" href="#">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Доставка</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Оплата</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Сервис</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link " href="#"
                            ><i class="fas fa-map-marker-alt"></i
                                ></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Краснодар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">+79528613959</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row d-flex align-items-center" >
                <div class="col-8">
                    <ul class="nav">
                        <li><a href="<?= \yii\helpers\Url::home() ?>"><span class="logo">Eco</span><span class="text-white logo_two">Bike</span></a></li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="nav ">
  <?php  if(!Yii::$app->user->isGuest): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= \yii\helpers\Url::to(['/site/logout']) ?>"><?= Yii::$app->user->identity['username'] ?>(Выход)</a>
                            </li>
<?php endif;?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cart-link" href="#" ><i class=" fas fa-shopping-cart text-white" ></i></a>
                        </li>
                    </ul>
                </div>
            </div>
    </header>  <!-- //header-desktop -->

    <header class="header-mobile">
        <div class="container">
            <nav class="navbar d-flex justify-content-sm-between">
                <ul class="nav d-flex justify-content-sm-between">
                    <li><a href="<?= \yii\helpers\Url::home() ?>"><h1 class=""><span class="text-success">Ecod <span/><span class="text-white">Bike</span></h1></a></li>
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
            <ul class="nav nav-tabs">
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Категории</a>  <!--dropdown-toggle стрелочка-->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['category/index'])?>">Список категорий</a>
                        <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['category/create'])?>">Добавить категорию</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Товары</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" role="menu">
                        <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['product/index'])?>">Список товаров</a>
                    </ul>
                </li>
            </ul>
            <ul class="nav d-flex align-items-center">

                <ul class="nav">
                    <form action="<?= \yii\helpers\Url::to(['category/search']) ?>" class="form-inline " method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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
            <li><a class="menu__item" href="#">Ремонт</a></li>
            <li><a class="menu__item" href="#">Тестдрайв</a></li>
        </ul>

        <ul class="nav_form_mob">
            <form action="<?= \yii\helpers\Url::to(['category/search']) ?>" class="form-inline my-2 my-lg-0" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>
    </nav>
    <?= Alert::widget() ?>
    <div class="container">
        <?= $content ?>
    </div>

    <footer class="footer">
        <div class="container container_footer">
            <div class="row d-flex justify-content-between ">
                <div class="col-2">

                    <ul class=" menu_footer ">
                        <li class=" text-white" ><h2>Каталог</h2></li>
                        <li class="mt-3text-white" ><a href="#">Акции</a></li>
                        <li class="mt-3 text-white" ><a href="#">Велосипеды</a></li>
                        <li class="mt-3 text-white" ><a href="#">Прокат</a></li>
                        <li class="mt-3 text-white" ><a href="#">Ремонт</a></li>
                    </ul>
                </div>
                <div class="col-2">
                    <ul class=" menu_footer ">
                        <li class="text-white " ><h2>О нас</h2></li>
                        <li class="text-white mt-3" ><a href="#">Адрес</a></li>
                        <li class="text-white mt-3" ><a href="#">Контакты</a></li>
                        <li class="text-white mt-3" ><a href="#">Отзывы</a></li>
                    </ul>
                </div>
                <div class="col-5 d-flex flex-row-reverse m-0 p-0">

                    <div class="menu_footer ">
                        <h2 class="m-0 p -0">Мы в социальных сетях</h2>
                        <ul class=" d-flex mt-3">
                            <li class="nav-item "><a href=""><i class="fab fa-vk text-white footer-icon"></i></a></li>
                            <li class="nav-item ml-4"><a href=""><i class="fab fa-facebook-f footer-icon text-white footer-icon"></i></a></li>
                            <li class="nav-item ml-4"><a href=""><i class="fab fa-instagram footer-icon text-white footer-icon"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>