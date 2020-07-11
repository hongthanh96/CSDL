<?php require ('./Views/frontend/header/index.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class = "ishot">
        <h1>  <?php foreach ($categoriesFind as $categoryFind) : ?>
            <?= $categoryFind["type_name"] ?>
            <?php endforeach; ?>

        </h1>
    </div>
    <div class="products">
        <?php foreach ($productsFind as $productFind) : ?>
            <div class="product">
            <a href="index.php?controller=product&action=show&id=<?= $productFind["food_ID"] ?>"> <img src='<?= $productFind["image"] ?>'></a>
                <p class = "product-name"><?= $productFind["name"] ?></p>
                <p class = "product-price"><?= $productFind["price"] ?> VND</p>
                <button><a href="index.php?controller=cart&action=store&id=<?= $productFind["food_ID"] ?>">Thêm vào giỏ hàng!</a></button>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php require ('./Views/frontend/footer/index.php'); ?>