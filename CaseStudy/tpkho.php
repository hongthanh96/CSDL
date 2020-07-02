<?php
include_once ("connect.php");
include_once ("layout/header.php");
$sql = "SELECT image, name, price,weight FROM case_study.products WHERE typeofproduct_type_ID = 3";
$stmt = $connect->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
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
        <?php foreach ($results as $result) : ?>
            <div class="product">
                <img src='<?= $result["image"] ?>'>
                <p><?= $result["name"] ?></p>
                <p>$<?= $result["price"] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>