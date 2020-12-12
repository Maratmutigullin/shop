<?php if(!empty($session['cart'])): ?>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th><span class="text-danger " aria-hidden="true" >Удалить</span></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($_SESSION['cart'] as $id => $item) :?>
            <tr>
                <td><?= \yii\helpers\Html::img("@web/image/products/{$item['img']}", ['alt'=>$item['name'], 'height'=> 50])  ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td><?= $item['price'] ?> руб</td>
                <td><span  data-id="<?= $id ?>" class="del-item glyphicon glyphicon-remove aria-hidden="true" text-danger del-item></span></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="">Итого:</td>
                <td><?= $_SESSION['cart.qty'] ?></td>
            </tr>
            <tr>
                <td colspan="4">На сумму:</td>
                <td><?= $_SESSION['cart.sum'] ?>р</td>
            </tr>
        </tbody>
    </table>
</div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
<!--<span class="glyphicon glyphicon-remove aria-hidden="true" text-danger del-item></span>-->