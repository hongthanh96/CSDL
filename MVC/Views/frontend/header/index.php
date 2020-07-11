<?php
// include_once("connect.php");
// $sql = "SELECT image, name, price,weight FROM case_study.products";
// $stmt = $connect->prepare($sql);
// $stmt->execute();
// $results = $stmt->fetchAll();
// echo "<pre>";
// die;
// die(var_dump($products));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleSignup.css">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <link rel="stylesheet" href="../css/styleCart.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="headerfixed">
        <div class="search">
            <div class="search-left">
                <h1><a href="../index.php?controller=homepage"><img src="../picture/logofresh.png" alt=""></a></h1>
            </div>

            <div class="search-between">
                <form action="index.php" method="get">
                    <div class="search-between-input">
                        <input type="hidden" name="controller" value="product">
                        <input type="hidden" name="action" value="search">
                        <input type="text" name="input" id="" placeholder="Search for Product or Brand">
                    </div>
                    <div>
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </div>

                </form>
            </div>
            <div class="search-right">
                <?php if (isset($_SESSION["user"])) : ?>
                    <div class="logout"><a href="../index.php?controller=login&action=logout">Log out</a></div>
                    <div class="icon-search icon-user"><a href="#"><i class="fas fa-heart"></i></a></div>
                <?php else : ?>
                    <div class="dropdown1 icon-search icon-user"><i class="fas fa-user"></i>
                        <div class="dropdown-content user">

                            <a class="menu-one" href="../index.php?controller=login" title="Đăng nhập">LOGIN</a><br>
                            <a class="menu-one" href="./index.php?controller=signup" title="Đăng kí">SIGN UP</a><br>
                        </div>
                    </div>
                    <div class="icon-search icon-user"><a href="#"><i class="fas fa-heart"></i></a></div>
                    <!-- <div class="icon-search"><a href="../index.php?controller=login">LOGIN</a></div>
            <div class="icon-search"><a href="../index.php?controller=signup">SIGN UP</a></div> -->
                <?php endif; ?>

                <div class="icon-search icon-user"><a href="../index.php?controller=cart&action=index"><i class="fas fa-shopping-cart"></i></a></div>
                    <?php if (isset($_SESSION["cart"])) : ?>
                        <?php $i = 0; ?>
                        <?php foreach ($_SESSION["cart"] as $key => $value) : ?>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        <div class = "div_sum"><button id="count" style="color:red"><a href="../index.php?controller=cart&action=index"><?= $i ?? '' ?></a></button></div>

                    <?php endif; ?>
                

                <div class="icon-search icon-user"><a href="orderdetail.php">$0.00</a></div>



            </div>
        </div>

        <div class="list">
            <div class="menu dropdown"><a href="../index.php?controller=homepage">TRANG CHỦ </a></div>
            <!-- <div class="menu dropdown1">SẢN PHẨM <i class="fas fa-caret-down"></i>
                <div class="dropdown-content">
                    <?php foreach ($products as $krey => $product) : ?>
                        <?php if ($key % 5 == 0) echo "<div>" ?>
                        <a class="menu-one" href="index.php?controller=product&action=show&id=<?= $product["food_ID"] ?>"><?= $product["name"] ?></a><br>
                        <?php if ($key % 5 == 4) echo "</div>" ?>
                        <?php endforeach; ?>
                </div>
            </div> -->

            <div class="menu dropdown"><a href="#">GIỚI THIỆU </a></div>
            <div class="menu dropdown1">SẢN PHẨM <i class="fas fa-caret-down"></i>
                <div class="dropdown-content">
                    <?php foreach ($categories as $category) : ?>
                        <a class="menu-one" href="index.php?controller=category&action=show&id=<?= $category["type_ID"] ?>"><?= $category["type_name"] ?></a><br>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="menu dropdown"><a href="#">HƯỚNG DẪN</a></div>
            <div class="menu dropdown"><a href="#">TIN TỨC </a></div>
            <div class="menu dropdown"><a href="#">BLOG </a></div>

            <div class="menu dropdown"><a href="#">LIÊN HỆ </a></div>
            <!-- <div class="menu dropdown">REUSABLE <i class="fas fa-caret-down"></i></div>
        <div class="menu dropdown">GIFTS & HOME <i class="fas fa-caret-down"></i></div>
        <div class="menu dropdown">SALE <i class="fas fa-caret-down"></i></div>
        <div class="menu dropdown">BRANDS <i class="fas fa-caret-down"></i></div> -->
        </div>
    </div>
    <script src="https://kit.fontawesome.com/607b7b9d04.js" crossorigin="anonymous"></script>

</body>

</html>