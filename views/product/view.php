<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\Category;
?>
<div class="container">
    <div class="row m-0 mt-5">
        <div class="col-lg-6">
            <div class="product_image" >
                <?= Html::img("@web/image/products_two/{$product->img}",['alt'=>$product->name, 'class'=>'']) ?>
            </div>
        </div>


        <div class="col-lg-6 product_card col-sm-12 col-md-6">
                <h2 class="text-center"><?= $product->name ?></h2>
            <div class="d-flex">
                <img src="/image/products_two/warranty .png" width="273" alt="">
                <img src="/image/products_two/repairs.png" width="273" alt="">
            </div>
            <h1 class="font-weight-bold" ><?= $product->price ?> р</h1>
            <div class="card-body position-relative pl-0">
                <p class="">Товар в наличии</p>
                <a href=" #" data-id="<?= $product->id ?>" class="cart-js btn text-white btn_product">Купить</a>

            </div>
        </div>
    </div>
    <h3 class="mt-4">Описание</h3>
    <p class="text-muted col-sm-12 col-md-12"  ><?= $product->content ?></p>
    <div class="row mt-4">
        <div class="col-lg-9 col-md-12 col-sm-12">
            <h2>Как подобрать велосипед</h2>
            <img src="/image/products_two/sizechart_city.jpg" alt="">
            <table class="table border table-sm border-right-success">
                <thead>
                <tr >
                    <th class="p-3" scope="col">Рост(см)</th>
                    <th class="p-3" scope="col">Размеры рамы</th>
                    <th class="p-3" scope="col">Размеры рамы(дюймы)</th>
                    <th class="p-3" scope="col">Размеры рамы(см)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">135 — 150</th>
                    <td>XS</td>
                    <td>14''</td>
                    <td>35</td>
                </tr>
                <tr>
                    <th scope="row">150 — 160</th>
                    <td>XS, S</td>
                    <td>15''</td>
                    <td>37</td>
                </tr>
                <tr>
                    <th scope="row">155 — 165</th>
                    <td>S, M</td>
                    <td>16''</td>
                    <td>40</td>
                </tr>
                <tr>
                    <th scope="row">165 — 175</th>
                    <td>S, M</td>
                    <td>17''</td>
                    <td>43</td>
                </tr>
                <tr>
                    <th scope="row">170 — 180</th>
                    <td>L</td>
                    <td>18''</td>
                    <td>45</td>
                </tr>
                <tr>
                    <th scope="row">175 — 185</th>
                    <td>L</td>
                    <td>19''</td>
                    <td>48</td>
                </tr>
                <tr>
                    <th scope="row">180 — 190</th>
                    <td>XL</td>
                    <td>20''</td>
                    <td>50</td>
                </tr>
                <tr>
                    <th scope="row">185 — 190</th>
                    <td>XL</td>
                    <td>21''</td>
                    <td>53</td>
                </tr>
                <tr>
                    <th scope="row">185 — 195</th>
                    <td>XXL</td>
                    <td>22''</td>
                    <td>55</td>
                </tr>
                <tr>
                    <th scope="row">190 — 200</th>
                    <td>XXL</td>
                    <td>23''</td>
                    <td>58</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
