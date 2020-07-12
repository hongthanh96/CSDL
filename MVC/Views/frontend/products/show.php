<?php
include('./Views/frontend/header/index.php');
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/styleDetail.css">

<body>
</body>

</html>


<?php $_SESSION["products"] = $productsFind ?>
<h2><?= $_SESSION["products"][0]["name"] ?></h2>
<div class="detail">


    <!-- <div class="w3-container">
  <h2>Slideshow Indicators</h2>
  <p>Using images to indicate how many slides there are in the slideshow, and highlight the image the user is currently viewing.</p>
</div> -->

    <div class="w3-content detail_left">
        <div class="show_img">
            <img class="mySlides" src="<?= $_SESSION["products"][0]["image"] ?>" style="width:100%;display:none">
            <img class="mySlides" src="<?= $_SESSION["products"][0]["image3"] ?>" style="width:100%">
            <img class="mySlides" src="<?= $_SESSION["products"][0]["image4"] ?>" style="width:100%;display:none">

        </div>

        <div class="w3-row-padding w3-section img_view">
            <div class="w3-col s4">
                <img class="demo w3-opacity w3-hover-opacity-off" src="<?= $_SESSION["products"][0]["image"] ?>" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
            </div>
            <div class="w3-col s4">
                <img class="demo w3-opacity w3-hover-opacity-off" src="<?= $_SESSION["products"][0]["image3"] ?>" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
            </div>
            <div class="w3-col s4">
                <img class="demo w3-opacity w3-hover-opacity-off" src="<?= $_SESSION["products"][0]["image4"] ?>" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
            </div>
        </div>
    </div>

    <script>
        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " w3-opacity-off";
        }
    </script>



    <div class="detail_between">
        <h2><?= $_SESSION["products"][0]["name"] ?></h2>
        <div>
            <p><span>Trọng lượng: </span><?= $_SESSION["products"][0]["weight"] ?></p>
            <p><span>Giá tiền: </span><?= number_format($_SESSION["products"][0]["price"]) ?> VND</p>
        </div>
        <div id="mota">
            <p><?= $_SESSION["products"][0]["description"] ?></p>
        </div>

        <div class = "detail_button">
            <button class = "button_cart"><a href="../index.php?controller=cart&action=store&id=<?= $_SESSION["products"][0]["food_ID"] ?>">THÊM VÀO GIỎ HÀNG</a></button>
            <button class = "button_buy"><a href="">MUA NGAY</a></button>
        </div>
    </div>
    <div class="detail_right">
        <div class="detail_icon car_free">
            <img src="../picture/free_car.png" alt="">
            <p><b>Giao hàng miễn phí</b></p>
        </div>
        <div class="detail_icon big">
            <img src="../picture/pig.png" alt="">
            <p><b>Tích điểm đổi quà</b></p>
        </div>
        <div class="detail_icon plane">
            <img src="../picture/plane.png" alt="">
            <p><b>Giao hàng toàn quốc</b></p>
        </div>
        <div class=" detail_icon headphone">
            <img src="../picture/headphone.png" alt="">
            <p><b>Tư vấn 24/7</b></p>
        </div>

    </div>
</div>


<div class="w3-container" id="description">

    <div class="w3-row">
        <a href="javascript:void(0)" onclick="openCity(event, 'London');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><b>Mô tả sản phẩm</b></div>
        </a>
        <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><b>Bình luận</b></div>
        </a>
        <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding"><b>Sản phẩm khác</b></div>
        </a>
    </div>

    <div id="London" class="w3-container city" style="display:none">
        <h2>Mô tả sản phẩm</h2>
        <p><?= $_SESSION["products"][0]["description"] ?></p>
    </div>

    <div id="Paris" class="w3-container city" style="display:none">
        <h2>Bình luận</h2>
        <p>Paris is the capital of France.</p>
    </div>

    <div id="Tokyo" class="w3-container city" style="display:none">
        <h2>Sản phẩm khác</h2>
        <p>Tokyo is the capital of Japan.</p>
    </div>
</div>

<script>
    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-border-red";
    }
</script>


<?php
include_once('./Views/frontend/footer/index.php');
?>
<script>
    if ('<?= $_SESSION['success'] ?>' != '') {
        let mes = '<?= $_SESSION['success'] ?>';
        alert(mes);
        <?php $_SESSION['success'] = '' ?>
    }
</script>