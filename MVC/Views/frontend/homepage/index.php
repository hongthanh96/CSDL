<?php require('./Views/frontend/header/index.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
</head>

<body>
    <div class="introduce" id="changeimg">
        <div class="introduce-left"><button onclick="myfunction1()"><i class="fas fa-chevron-left"></i></button></div>
        <div class="introduce-between">
            <h3 id="change_h3">Rau củ quả</h3>
            <h1 id="change_h1">TƯƠI NGON MỖI NGÀY</h1>
            <button><a href='../index.php?controller=product&action=index'>XEM NGAY!</a></button>
        </div>
        <div class="introduce-right"><button onclick="myfunction2()"><i class="fas fa-chevron-right"></i></button></div>
    </div>

    <div class="ishot">
        <h3>WHAT HOT</h3>
        <h1>SẢN PHẨM NỔI BẬT</h1>
    </div>
    <div class="products">
        <?php foreach ($productsHot as $productHot) : ?>
            <div class="product">
                <a href="index.php?controller=product&action=show&id=<?= $productHot["food_ID"] ?>"><img src='<?= $productHot["image"] ?>'></a>
                <p  class = "product-name"><?= $productHot["name"] ?></p>
                <p class = "product-price"><?= number_format($productHot["price"]) ?> VND</p>
                <button><a href="index.php?controller=cart&action=store&id=<?= $productHot["food_ID"] ?>">Thêm vào giỏ hàng!</a></button>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- <div class = "img-bghot"><img src="./picture/bghot.jpeg"></div> -->
    <div class="isnew">
        <h3>WHAT NEW</h3>
        <h1>SẢN PHẨM MỚI</h1>
    </div>
    <div class="products">
        <?php foreach ($productsNew as $productNew) : ?>
            <div class="product">
                <a href="index.php?controller=product&action=show&id=<?= $productNew["food_ID"] ?>"><img src='<?= $productNew["image"] ?>'></a>
                <p class = "product-name"><?= $productNew["name"] ?></p>
                <p class = "product-price"><?= number_format($productNew["price"]) ?> VND</p>
                <button><a href="index.php?controller=cart&action=store&id=<?= $productNew["food_ID"] ?>">Thêm vào giỏ hàng!</a></button>
            </div>
        <?php endforeach; ?>
    </div>
    <div class = "imgfood">
        <div class="imgfood1"><img src="./picture/imgfood1.webp" alt=""></div>
        <div class="imgfood1"><img src="./picture/imgfood2.webp" alt=""></div>

    </div>


    <script>
        function myfunction1() {
            document.getElementById("changeimg").style.backgroundImage = "url('picture/background1.webp')";
            document.getElementById("change_h3").innerHTML = "Thực phẩm sạch";
            document.getElementById("change_h1").innerHTML = "ĐẢM BẢO SỨC KHỎE";
        }

        function myfunction2() {
            document.getElementById("changeimg").style.backgroundImage = "url('picture/background3.webp')";
            document.getElementById("change_h3").innerHTML = "Tháng vàng ưu đãi";
            document.getElementById("change_h1").innerHTML = "TIẾT KIỆM ĐẾN 20%";
        }

        let slide_show = ["url('picture/background2.webp')","url('picture/background1.webp')", "url('picture/background3.webp')"];
        let change_h3 = ["Rau củ quả","Thực phẩm sạch","Tháng vàng ưu đãi"];
        let change_h1 = ["TƯƠI NGON MỖI NGÀY","ĐẢM BẢO SỨC KHỎE","TIẾT KIỆM ĐẾN 20%"];
        let i = 0;
        window.onload = function() {
            setInterval(function() {
                document.getElementById('changeimg').style.backgroundImage = slide_show[i];
                document.getElementById("change_h3").innerHTML = change_h3[i];
                document.getElementById("change_h1").innerHTML = change_h1[i];

                i++;
                if (i > 2) i = 0;
            }, 3000)
        }
    </script>
</body>

</html>
<?php require('./Views/frontend/footer/index.php'); ?>