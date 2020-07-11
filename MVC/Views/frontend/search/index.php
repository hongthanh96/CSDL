<?php
    include ('./Views/frontend/header/index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="products">
        <?php if(count($productsSearch) > 0): ?>
        <?php foreach ($productsSearch as $productSearch) : ?>
            <div class="product">
            <a href="index.php?controller=product&action=show&id=<?= $productSearch["food_ID"]?>"><img src='<?= $productSearch["image"] ?>'></a>
                <p><?= $productSearch["name"] ?></p>
                <p><?= $productSearch["weight"] ?></p>
                <p><?= number_format($productSearch["price"]) ?> VND</p>

            </div>
        <?php endforeach; ?>
        <?php else: ?>
        <?= "Sản phẩm bạn tìm không có!" ?>
        <?php endif; ?>
    </div>

</body>

</html>