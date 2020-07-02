<?php
include_once("connect.php");
$sql = "SELECT image, name, price,weight FROM case_study.products";
$stmt = $connect->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>


    <div class="search">
        <div class="search-left">
            <h1><a href="../index.php"><img src="../picture/logofresh.png" alt=""></a></h1>
        </div>

        <div class="search-between">
            <form action="search.php" method="get">
                <input type="text" name="input" id="" placeholder="Search for Product or Brand">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="search-right">
            <div><a href="login.php" class="icon-search">LOGIN</a></div>
            <div class = "gift">
                <!-- <a href="#" class="icon-search"><i class="far fa-user"></i></a>
                <a href="#" class="icon-search"><i class="far fa-heart"></i></a> -->
                <a href="#" class="icon-search"><i class="fas fa-shopping-bag"></i></a>
                <a href="#" class="icon-search">$0.00</a>
            </div>

        </div>
    </div>
    <!-- <div class="header">
        <div class="header-left">
            <a href="#" class="icon-header"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="icon-header"><i class="fab fa-instagram"></i></a>
            <a href="#" class="icon-header"><i class="fab fa-youtube"></i></a>
            <a href="#" class="icon-header">BLOG</a>
        </div>
        <div class="header-right">
            <div class="header-right1">
                <a href="#"><i class="fas fa-map-marker-alt"></i> ABOUT</a>
            </div>
            <div class="header-right1">
                <a href="#"><i class="far fa-envelope"></i> CONTACT</a>
            </div>
            <div class="header-right1">
                <a href="../login.php">LOGIN</a>
            </div>
        </div>
    </div> -->

    <div class="list">
        <div class="menu dropdown">TRANG CHỦ </div>
        <div class="menu dropdown1">SẢN PHẨM <i class="fas fa-caret-down"></i>
            <div class="dropdown-content">
                <?php foreach ($results as $result) : ?>
                    <a class="menu-one" href="#"><?= $result["name"] ?></a><br>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="menu dropdown1">MENU <i class="fas fa-caret-down"></i>
            <div class="dropdown-content">
                <a class="menu-one" href="../rau.php">RAU CỦ QUẢ</a><br>
                <a class="menu-one" href="../tptuoisong.php">THỰC PHẨM TƯƠI SỐNG</a><br>
                <a class="menu-one" href="../tpkho.php">THỰC PHẨM KHÔ</a><br>
            </div>
        </div>
        <div class="menu dropdown">BLOG </div>
        <div class="menu dropdown">GIỚI THIỆU </div>
        <div class="menu dropdown">LIÊN HỆ </div>
        <!-- <div class="menu dropdown">REUSABLE <i class="fas fa-caret-down"></i></div>
        <div class="menu dropdown">GIFTS & HOME <i class="fas fa-caret-down"></i></div>
        <div class="menu dropdown">SALE <i class="fas fa-caret-down"></i></div>
        <div class="menu dropdown">BRANDS <i class="fas fa-caret-down"></i></div> -->
    </div>
    <script src="https://kit.fontawesome.com/607b7b9d04.js" crossorigin="anonymous"></script>

</body>

</html>