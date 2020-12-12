<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


?>

<div class="container">

    <?php if(Yii::$app->session->hasFlash('success')): ?>

        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" >&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true" >&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>

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
                        <td><a class="text-dark" href="<?= \yii\helpers\Url::to(['product/view', 'id'=> $id]) ?>"><?= $item['name'] ?></a></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['price'] ?> руб</td>

<!--                        <td>//=$item['qty'] *  $item['price'] ?> руб</td> сумма если будет необходима-->

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

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>
        <?= Html::submitButton('Заказать', ['class'=>'bnt ']) ?>
        <?php ActiveForm::end(); ?>


    <?php endif; ?>
    <!--<span class="glyphicon glyphicon-remove aria-hidden="true" text-danger del-item></span>-->
</div>