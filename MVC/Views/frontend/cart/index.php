<?php
require('./Views/frontend/header/index.php');
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <link rel="stylesheet" href="../css/style.css"> -->
<body>
    
</body>


<?php if (isset($_SESSION["cart"])) : ?>
    <div class="cart">
        <form action="index.php?controller=cart&action=update" method="post">
            <h1>DANH SÁCH SẢN PHẨM TRONG GIỎ HÀNG</h1>
            <table id="table-cart">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>HÌNH ẢNH</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>TRỌNG LƯỢNG</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ TIỀN</th>
                        <th>THÀNH TIỀN</th>
                        <th>XÓA SẢN PHẨM</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cnt = 1 ?>
                    <?php foreach ($carts as $cart) : ?>
                        <tr>
                            <td><?= $cnt++ ?></td>
                            <td class="td-img"><img src="<?= $cart[0]['image']; ?>"></td> 
                            <td><?= $cart[0]["name"]; ?></td>
                            <td><?= $cart[0]["weight"]; ?></td>
                            <td><input id="cart-input" type="number" name="qty[<?= $cart[0]["food_ID"] ?>]" id="" value="<?= $cart["qty"]; ?>"></td>
                            <td><?= number_format($cart[0]["price"]) . " VND"; ?></td>
                            <td><?= number_format($sum[] = $cart[0]["price"] * $cart["qty"]) . " VND"; ?></td>
                            <td><a href="../index.php?controller=cart&action=delete&id=<?= $cart[0]["food_ID"] ?>"><i class="fas fa-trash-alt"></i></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="tr-sum">
                        <td class="td-sum" colspan="6">Tổng tiền</td>
                        <td class="td-price" colspan="2"><?= number_format(array_sum($sum)) . "VND"; ?></td>
                    </tr>

                </tbody>
            </table>
            <div class="router">
                <div class="router-left"> <i><a href="../index.php?controller=homepage">Tiếp tục mua hàng</a></i></div>
                <div class="router-right">
                    <button id="delete"><a href="../index.php?controller=cart&action=destroy">Xóa tất cả </a></button>
                    <button id="update">Cập nhật</button></div>
            </div>
        </form>
        <div class="order"><button onclick="document.getElementById('buy').style.display='block'" class="w3-button w3-green w3-large">ĐẶT HÀNG</button></div>
    </div>


    <div id="buy" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('buy').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <img src="picture/logofresh.png" alt="Avatar" style="width:50%" class="logo">
            </div>

            <form class="w3-container" action="index.php" method="GET">
                <input type="hidden" name="controller" value="order">
                <input type="hidden" name="action" value="store">
                <div class="w3-section">
                    <label><b>Tên Khách Hàng</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập tên khách hàng" name="customer_name" >
                    <label><b>Email khách hàng</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập email" name="email" >
                    <label><b>Số điện thoại</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập số diện thoại" name="phone" >
                    <label><b>Địa chỉ nhận hàng</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập địa chỉ" name="address" >
                    <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">MUA HÀNG</button>
    
                </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('buy').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            </div>

        </div>
    </div>





    <!-- <div class="form_order">
        <form action="index.php?controller=order&action=store" method="post">
            <div>
                <label for="">Tên khách hàng</label>
                <input type="text" name="customer_name">
            </div>
            <div>
                <label for="">Email khách hàng</label>
                <input type="text" name="customer_email">
            </div>
            <div>
                <label for="">SĐT khách hàng</label>
                <input type="text" name="customer_phone">
            </div>
            <div>
                <label for="">Địa chỉ khách hàng</label>
                <input type="text" name="customer_address">
            </div>
            <div>
                <button>Mua hàng</button>
            </div>
        </form>
    </div> -->

<?php else : ?>
    <p>Không tồn tại giỏ hàng</p>
<?php endif ?>
<?php
include_once('./Views/frontend/footer/index.php');
?>
<!-- <script>
    function showform(){
        document.getElementsByClassName("form_order").style;
    }
</script> -->