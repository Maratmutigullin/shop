<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//$this->title = 'My Shop';
?>
<div id="carouselExampleSlidesOnly" class="container carousel slide" data-ride="carousel">
    <div class="carousel-inner d-flex">
        <div class="carousel-item active">
            <img src="/image/ban1.jpg" class="d-block w-100 " alt="Реклама">
        </div>
        <div class="carousel-item">
            <img src="/image/ban2.jpg" class="d-block w-100 " alt="Реклама">
        </div>
        <div class="carousel-item">
            <img src="/image/ban3.jpg" class="d-block w-100 " alt="Реклама">
        </div>
    </div>
</div>




<div class="container mt-5">
    <h2 class="text-center"><?= $category->name ?></h2>
    <div class="row d-flex position-relative">
            <?php if(!empty($products)): ?>
                <?php $i = 0; foreach($products as $product):  ?>
                    <div class="card  col-lg-3 col-md-3">


                        <!--<img src="image/stark-outpost.jpg" class="card-img-top" alt="stark-outpost">-->

                        <?= Html::img("@web/image/products_two/{$product->img}",['alt'=>$product->name, 'class'=>'card-img-top']) ?>

                        <div class="card-body position-relative">
                            <h5 class="card-title text-center"><?= $category->name ?></h5>
                            <h5 class="card-text text-center"><a class="hit" href="<?= \yii\helpers\Url::to(['product/view', 'id'=>$product->id])  ?>"><?= $product->name ?></a></h5>
                            <span  class="price d-flex justify-content-center font-weight-bolder "><?= $product->price ?> р</span>
                        </div>

                        <div class="bike-one bike-view">
                            <a href="<?= \yii\helpers\Url::to(['web/cart/add', 'id'=>$product->id]) ?>" data-id="<?= $product->id ?>" class=" d-flex justify-content-center cart-js card_link "><button type="button" class="btn text-white btn_cart  text-body">Купить</button></a>
                        </div>
                    </div>
                <?php $i++;  ?>
                <?php if($i % 4 ==0): ?>

                <?php endif; ?>
                <?php endforeach; ?>
                <div class="clearfix"></div>

            <?php else: ?>
                <h3 style="height: 500px">В этой категории товаров нет</h3>
            <?php endif;?>


    </div>
</div>
<div class="container">
<div class="pagination pagination-md" >
    <?php
    // отображаем ссылки на страницы
    echo \yii\widgets\LinkPager::widget([
        'pagination' => $pages,
    ]);

    ?>
</div>
</div>
<script>
    $('.catalog').dcAccordion({
        speed:300
    }); /*плагин для сворачивания списка*/
</script>