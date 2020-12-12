<?php
use yii\helpers\Html;
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

<div class="container ">
    <h2 class="text-center">Хиты продаж</h2>
    <div class="row d-flex h-auto position-relative">
                <?php if(!empty($hits)): ?>
                    <?php foreach($hits as $hit):  ?>
                    <div class="card  col-sm-12 col-md-3 col-lg-3 position-relative" >
                            <!--<img src="image/stark-outpost.jpg" class="card-img-top" alt="stark-outpost">-->
                            <?= Html::img("@web/image/products_two/{$hit->img}",['alt'=>$hit->name, 'class'=>'card-img-top']) ?>
                            <div class="card-body">
                                <p class="card-text text-center"><a class="hit" href="<?= \yii\helpers\Url::to(['product/view', 'id'=>$hit->id])  ?>"><?= $hit->name ?></a></p>
                                <span  class="price d-flex justify-content-center font-weight-bolder"><?= $hit->price ?> р</span>
<!--                                <button type="button" class="btn text-white btn_cart"></button>-->
                                <div class="bike-one bike-one-hit">
                                    <a href="<?= \yii\helpers\Url::to(['web/cart/add', 'id'=>$hit->id]) ?>" data-id="<?= $hit->id ?>" class=" d-flex justify-content-center cart-js card_link "><button type="button" class="btn  btn_cart text-body">Купить</button></a>
                                </div>
                            </div>
                  </div>
                    <?php endforeach; ?>
                <?php endif; ?>
    </div>
    </div>



<script>
    $('.catalog').dcAccordion({
        speed:300
    }); /*плагин для сворачивания списка*/
</script>





