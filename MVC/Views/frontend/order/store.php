<?php
include_once('./Views/frontend/header/index.php');
?>

<div>
    <div>
        <h3>Thông tin nhận hàng</h3>
        <p><span>Tên người nhận: </span><?= $customer_name ?></p>
        <p><span>Số điện thoại:</span><?= $email ?></p>
        <p><span>Địa chỉ: </span><?= $address ?></p>
    </div>
    <div>
        <div><h3>Đơn hàng thanh toán </h3></div>
        <div>
            <?php foreach ($carts as $cart): ?>
            <div>
                <img src="<?= $cart[0]["image"] ?>" alt="">
                <p><?= $cart[0]["name"]; ?></p>
            </div>
            <div><?= number_format($sum[] = $cart[0]["price"] * $cart["qty"]) . " VND"; ?></div>
            <?php endforeach; ?>
        </div>
        <div>
            <div><span>Tạm tính: </span></div>
            <div><p><?= number_format(array_sum($sum)) . "VND"; ?></p></div>
        </div>
        <div>
            <div><span>Phí vận chuyển: </span></div>
            <div><p></p></div>
        </div>
        <div>
            <div><h4>Tổng cộng</h4></div>
            <div></div>
        </div>
    </div>
</div>



<?php
include_once('./Views/frontend/footer/index.php');
?>