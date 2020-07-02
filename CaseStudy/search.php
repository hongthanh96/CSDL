<?php
include_once("connect.php");
include_once("layout/header.php");
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $input = strtoupper($_GET["input"]);
    $search = "%$input%";
    $sql = "SELECT image, name, price,weight FROM case_study.products WHERE name LIKE ?";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$search]);
    $results = $stmt->fetchAll();
}
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
        <?php if(count($results) > 0): ?>
        <?php foreach ($results as $result) : ?>
            <div class="product">
                <img src='<?= $result["image"] ?>'>
                <p><?= $result["name"] ?></p>
                <p><?= $result["weight"] ?></p>
                <p><?= $result["price"] ?> VND</p>

            </div>
        <?php endforeach; ?>
        <?php else: ?>
        <?= "Sản phẩm bạn tìm không có!" ?>
        <?php endif; ?>
    </div>

</body>

</html>