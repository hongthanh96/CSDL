
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chi tiết</title>
</head>

<body>
    <div class = "chitiet">
        <div class="chitiet_left">
            <?php foreach ($products as $product) : ?>
                <img src="<?= $product["image"] ?>">
            <?php endforeach; ?>
        </div>
        <div class="chitiet_right">
            <h2><?= $product["name"] ?></h2>
            <p>Trọng lượng: <?= $product["weight"] ?></p>
            <p><?= $product["price"] ?> VND</p>
            <div>
                <button><a href = "order.php?id=<?= $product["food_ID"] ?>">THÊM VÀO GIỎ HÀNG</a></button>
                <button>MUA NGAY</button>
            </div>
        </div>
    </div>

    <div>
        <p>MÔ TẢ SẢN PHẨM</p>
        <p>BÌNH LUẬN</p>
        <p>SẢN PHẨM KHÁC</p>
    </div>
    <div><?= $product["description"] ?></div>
    <hr>
    <p>BÌNH LUẬN</p>
    <hr>
    <input type="text" name="" id="" placeholder="Thêm bình luận...">
    <p>SẢN PHẨM KHÁC</p>
    <hr>
</body>

</html>