<?php
use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\db\Exception;
?>

<div class="container mt-5">
    <div class="row m-0 w-100 ">
        <div class=" col-sm-3 ">
            <h2 class="text-center">Категории</h2>
            <div class="position-absolute">
                <ul class="catalog">
                    <?=\app\components\MenuWidget::widget(['tpl'=>'menu']) ?>  <!--вывод виджета списка категорий из БД-->
                </ul>
            </div>
        </div>




        <div class="col-sm-9 col-9 p-0 m-0">
            <h2 class="text-center">Горные велосипеды</h2>

            <?php if(!empty($products)): ?>
                <?php $i = 0; foreach($products as $product):  ?>
                    <div class="card  col-sm-4 col-3">


                        <!--<img src="image/stark-outpost.jpg" class="card-img-top" alt="stark-outpost">-->

                        <?= Html::img("@web/image/products/{$product->img}",['alt'=>$product->name, 'class'=>'card-img-top']) ?>

                        <div class="card-body position-relative">
                            <h5 class="card-text text-center"><a class="hit" href="<?= \yii\helpers\Url::to(['product/view', 'id'=>$product->id])  ?>"><?= $product->name ?></a></h5>
                            <a href="#" data-id="<?= $product->id ?>" class="d-flex justify-content-center card_link"><button type="button" class="btn btn_cart text-white "><?= $product->price ?></button></a>

                        </div>


                    </div>
                    <?php $i++;  ?>
                    <?php if($i % 3 ==0): ?>

                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="clearfix"></div>
                <div class="pagination" >
                    <?php
                    // отображаем ссылки на страницы
                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                    ]);

                    ?>
                </div>
            <?php else: ?>
                <h3 style="height: 500px">В этой категории товаров нет</h3>
            <?php endif;?>

        </div>
    </div>
</div>
<script>
    $('.catalog').dcAccordion({
        speed:300
    }); /*плагин для сворачивания списка*/
</script>
