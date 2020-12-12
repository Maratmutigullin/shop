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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header-desktop header" >
    <div class="container">
        <div class="row row-header d-flex align-items-center justify-content-around" >
            <div class="col-lg-7 col-md-7">
                <ul class="nav">
                    <li><a class="logo" href="<?= \yii\helpers\Url::home() ?>"><img src="/image/products_two/bikeshop.svg" alt="" width="200rem"></a></li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-5">
                <ul class="nav">
<?php  if(!Yii::$app->user->isGuest): ?>

                    <li class="nav-item">
                        <a class="nav-link nav-link-header " href="<?= \yii\helpers\Url::to(['/site/logout']) ?>"><?= Yii::$app->user->identity['username'] ?>(Выход)</a>
                    </li>
<?php endif;?>
                    <li class="nav-item">
                        <a class="nav-link nav-link-header" href="<?= \yii\helpers\Url::to(['/admin']) ?>">Вход</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link cart-link nav-link-header" href="#" ><i class=" fas fa-shopping-cart text-white" ></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-header" href="#">Краснодар</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-header" href="tel:+79528613959">+79528613959</a>
                    </li>
                </ul>
            </div>
        </div>
</header>  <!-- //header-desktop -->

<header class="header-mobile">
    <div class="container">
        <nav class="navbar d-flex justify-content-sm-beetwen ">
            <ul class="nav nav-sm d-flex justify-content-sm-beetwen">
                <li ><a href="<?= \yii\helpers\Url::home() ?>"><h1 class=""><img src="/image/products_two/bikeshop.svg" alt="" width="200rem"></a></li>
            </ul>
            <ul class="d-flex mt-5 pt-4 nav-icon-sm">
                <li class="nav-item mr-3"><a href=""><i class="fas fa-key text-white text-white"></i></a></li>
                <li class="nav-item"><a href=""><i class="fas fa-shopping-cart text-white"></i></a></li>
            </ul>

        </nav>
    </div>
</header> <!-- //header-mobile -->








<div class="container">
    <nav class="menu p-2 d-flex  justify-content-sm-between">
       <ul class="nav">
  <li class="nav-item dropdown">
    <a class="nav-link nav-link-menu" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Велосипеды</a>  <!--dropdown-toggle стрелочка-->
      <ul class="dropdown-menu ">
          <?=\app\components\MenuWidget::widget(['tpl'=>'menu']) ?>  <!--вывод виджета списка категорий из БД-->
      </ul>
      <!--    <div class="dropdown-menu">-->
<!--      <a class="dropdown-item" href=" \yii\helpers\Url::to(['category/bike']) ">Горные</a>-->
<!--      <a class="dropdown-item" href="#">Женские</a>-->
<!--      <a class="dropdown-item" href="#">Детские</a>-->
<!--        <a class="dropdown-item" href="#">Дорожные</a>-->
<!--        <a class="dropdown-item" href="#">Трюковые</a>-->
<!--    </div>-->
  </li>

  <li class="nav-item">
    <a class="nav-link nav-link-menu" href="<?= \yii\helpers\Url::to(['/hire/hire']) ?>" tabindex="-1" aria-disabled="true">Прокат</a>
  </li>
           <li class="nav-item">
               <a class="nav-link nav-link-menu" href="<?= \yii\helpers\Url::to(['site/delivery'])?>">Доставка и оплата </a>
           </li>
           <li class="nav-item">
               <a class="nav-link nav-link-menu" href="<?= \yii\helpers\Url::to(['site/service']) ?>">Сервис</a>
           </li>
</ul>
<ul class="nav d-flex align-items-center nav-desctop nav-mob">

        <ul class="nav mt-2 search-mob">
            <form action="<?= \yii\helpers\Url::to(['category/search']) ?>" class="form-inline " method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0 btn-search-md" type="submit">Поиск</button>
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
        <li><a class="menu__item" href="#">Велосипеды</a></li>
        <li><a class="menu__item" href="#">Прокат</a></li>
        <li><a class="menu__item" href="#">Доставка и оплата</a></li>
        <li><a class="menu__item" href="#">Сервис</a></li>
    </ul>

    <ul class="nav_form_mob">
        <form action="<?= \yii\helpers\Url::to(['category/search']) ?>" class="form-inline my-2 my-lg-0" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </ul>
</nav>


<?= Alert::widget() ?>
<?= $content ?>


<footer class="footer mt-5 pt-5">
    <div class="container container_footer">
        <div class=" row d-flex justify-content-between ">
            <div class="col-lg-8 col-md-8">

                <ul class=" menu_footer ">
                    <li class=" text-white" ><h2>Каталог</h2></li>
                    <li class="mt-3 text-white " ><a class="nav-link-header" href="#">Велосипеды</a></li>
                    <li class="mt-3 text-white" ><a class="nav-link-header" href="#">Прокат</a></li>
                    <li class="mt-3 text-white" ><a class="nav-link-header" href="#">Доставка и оплата</a></li>
                    <li class="mt-3 text-white" ><a class="nav-link-header" href="#">Сервис</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4  d-flex flex-row-reverse m-0 p-0">

                <div class="menu_footer ">
                    <h2 class="m-0 p-0 socia">Мы в социальных сетях</h2>
                    <ul class=" d-flex mt-3">
                        <li class="nav-item "><a class="nav-link-header" href=""><i  class="fab fa-vk text-white footer-icon"></i></a></li>
                        <li class="nav-item  ml-4"><a class="nav-link-header" href=""><i class="fab fa-facebook-f footer-icon text-white footer-icon"></i></a></li>
                        <li class="nav-item ml-4"><a class="nav-link-header" href=""><i class="fab fa-instagram footer-icon text-white footer-icon"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--footer md-->
<!--<footer class="footer-mob">-->
<!--    <div class="container container-fluid">-->
<!--        <div class="row">-->
<!--            <div class="col-md-8">-->
<!---->
<!--                <ul class=" menu_footer ">-->
<!--                    <li class=" text-white" ><h2>Каталог</h2></li>-->
<!--                    <li class="mt-3 text-white " ><a class="nav-link-header" href="#">Велосипеды</a></li>-->
<!--                    <li class="mt-3 text-white" ><a class="nav-link-header" href="#">Прокат</a></li>-->
<!--                    <li class="mt-3 text-white" ><a class="nav-link-header" href="#">Доставка и оплата</a></li>-->
<!--                    <li class="mt-3 text-white" ><a class="nav-link-header" href="#">Сервис</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="col-md-4 d-flex flex-row-reverse m-0 p-0">-->
<!---->
<!--                <div class="menu_footer ">-->
<!--                    <h2 class="m-0 p-0">Мы в социальных сетях</h2>-->
<!--                    <ul class=" d-flex mt-3">-->
<!--                        <li class="nav-item "><a class="nav-link-header" href=""><i  class="fab fa-vk text-white footer-icon"></i></a></li>-->
<!--                        <li class="nav-item  ml-4"><a class="nav-link-header" href=""><i class="fab fa-facebook-f footer-icon text-white footer-icon"></i></a></li>-->
<!--                        <li class="nav-item ml-4"><a class="nav-link-header" href=""><i class="fab fa-instagram footer-icon text-white footer-icon"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->





<!--МОДАЛЬНОЕ ОКНО-->
<?php
\yii\bootstrap\Modal::begin([
'header' => '<h4 class="cart-title">Корзина<h4/>',
'id' =>'cart',
'size'=>'modal-lg',
'footer' => '<button type="button" class="btn btn-outline-default btn-modal" data-dismiss="modal">Продолжить покупки</button>
            <a href="'.  \yii\helpers\Url::to(['cart/view']). ' " class="btn btn-modal">Оформить заказ</a>
            <button type="button" class="btn bg-danger del" >Очистить корзину</button>'
]);
\yii\bootstrap\Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>