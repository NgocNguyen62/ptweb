<?php

/** @var yii\web\View $this */

/** @var app\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

use app\models\base\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$items = Yii::$app->user->identity->getCart();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/cart.css" />
</head>
<body>
<?php echo $this->render('navbar'); ?>
<div class="total-container">
    <div class="left-cart">
    <table class="table-cart">
    <thead>
        <tr class="tr-table">
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>SỐ LƯỢNG</th>
            <th>Tạm tính</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item) {
            $product = $item[0];
            $quantity = $item[1];
            ?>
            <tr>
                <td class="product">
                    <img class="img-cart" src="<?= $product->avatar ?>" alt="">
                    <?= $product->name ?>
                </td>
                <td class="price" id="price-<?= $product->id ?>"><?= $product->price ?>đ</td>
                <td>
                    <div class="quantity">
                        <button onclick="decreaseQuantity(<?= $product->id ?>)">-</button>
                        <input type="text" id="quantity-<?= $product->id ?>" value="<?= $quantity ?>">
                        <button onclick="increaseQuantity(<?= $product->id ?>)">+</button>
                    </div>
                </td>
                <td class="subtotal" id="subtotal-<?= $product->id ?>"><?= $product->price * $quantity ?>đ</td>
                <td>
                    <?php
                    ActiveForm::begin();
                    echo Html::a(
                        'Xóa',
                        ['cart/delete', 'id' => \app\models\base\Cart::findOne(['product_id' => $product->id])->id],
                        [
                            'class' => 'delete-item',
                            'data' => [
                                'method' => 'post', // Set the method to POST
                                'confirm' => 'Are you sure you want to remove this product from favorites?',
                            ],
                        ]
                    );
                    ActiveForm::end();
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    </div>
    <div class="right-cart">
        <h4>Tổng: <?= Yii::$app->user->identity->getTotalPrice() ?>đ</h4>
    </div>
</div>
<?php echo $this->render('footer'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // function addCart(id){
    //     $.get('<?php echo Yii::$app->homeUrl.'products/add-to-cart' ?>', {'id': id}, function(data){
    //         alert('Đã thêm vào giỏ hàng');
    //     });
    // }
    function decreaseQuantity(productId) {
        var quantityInput = document.getElementById("quantity-" + productId);
        var currentQuantity = parseInt(quantityInput.value, 10);
        if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
        updateSubtotal(productId);
        }
    }

    function increaseQuantity(productId) {
        var quantityInput = document.getElementById("quantity-" + productId);
        var currentQuantity = parseInt(quantityInput.value, 10);
        quantityInput.value = currentQuantity + 1;
        updateSubtotal(productId);
    }

    function updateSubtotal(productId) {
        var quantityInput = document.getElementById("quantity-" + productId);
        var priceCell = document.getElementById("price-" + productId);
        var subtotalCell = document.getElementById("subtotal-" + productId);

        var currentQuantity = parseInt(quantityInput.value, 10);
        var price = parseFloat(priceCell.textContent.replace('đ', '').replace(',', ''));
        var subtotal = currentQuantity * price;

        subtotalCell.textContent = formatCurrency(subtotal) + "đ";
    }

    function formatCurrency(value) {
        return value;
    }

    
</script>
</body>