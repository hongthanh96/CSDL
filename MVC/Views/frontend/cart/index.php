<?php
include('./Views/frontend/header/index.php');
// unset ($_SESSION['cart']);
?>
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
                            <td class="td-img"><img src="<?= $cart[0]['image']; ?>" </td> <td><?= $cart[0]["name"]; ?></td>
                            <td><?= $cart[0]["weight"]; ?></td>
                            <td><input id = "cart-input" type="number" name="qty[<?= $cart[0]["food_ID"] ?>]" id="" value="<?= $cart["qty"]; ?>"></td>
                            <td><?= number_format($cart[0]["price"]) . " VND"; ?></td>
                            <td><?= number_format($sum[] = $cart[0]["price"] * $cart["qty"]) . " VND"; ?></td>
                            <td><a href="../index.php?controller=cart&action=delete&id=<?= $cart[0]["food_ID"] ?>"><i class="fas fa-trash-alt"></i></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class = "tr-sum">
                        <td class = "td-sum" colspan="6">Tổng tiền</td>
                        <td class = "td-price" colspan="2"><?= number_format(array_sum($sum)). "VND"; ?></td>
                    </tr>

                </tbody>
            </table>
            <div class="router">
                <div class = "router-left"> <i><a href="../index.php?controller=homepage">Tiếp tục mua hàng</a></i></div>
                <div class = "router-right">
                    <button id="delete"><a href="../index.php?controller=cart&action=destroy">Xóa tất cả </a></button>
                    <button id="update">Cập nhật</button></div>
            </div>
        </form>
        <div class="order"><button onclick="showform()">ĐẶT HÀNG</button></div>
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