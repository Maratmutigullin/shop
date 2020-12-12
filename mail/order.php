<div class="table-responsive">
    <table style="width:100%; border:1px solid #ddd; border-collapse: collapse;" class="table table-hover table-striped">
        <thead>
        <tr style="background: #f9f9f9;">
            <th style="padding: 8px; border:1px solid #ddd;">Наименование</th>
            <th style="padding: 8px; border:1px solid #ddd;">Количество</th>
            <th style="padding: 8px; border:1px solid #ddd;">Цена</th>
            <th style="padding: 8px; border:1px solid #ddd;">Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($session['cart'] as $id => $item) :?>
            <tr>
                <td style="padding: 8px; border:1px solid #ddd;"><?= $item['name'] ?></td>
                <td style="padding: 8px; border:1px solid #ddd;"><?= $item['qty'] ?></td>
                <td style="padding: 8px; border:1px solid #ddd;"><?= $item['price'] ?> руб</td>
                <td style="padding: 8px; border:1px solid #ddd;"><?= $item['qty'] * $item['price']  ?> руб</td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Итого:</td>
            <td><?= $_SESSION['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="3">На сумму:</td>
            <td><?= $_SESSION['cart.sum'] ?>р</td>
        </tr>
        </tbody>
    </table>
</div>