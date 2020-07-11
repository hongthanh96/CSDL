<?php
include('./Views/frontend/header/index.php');
?>
    <div class = "chitiet">
        <div class="chitiet_left">
            <?php foreach ($productsFind as $productFind) : ?>
                <img src="<?= $productFind["image"] ?>">
            <?php endforeach; ?>
        </div>
        <div class="chitiet_right">
            <h2><?= $productFind["name"] ?></h2>
            <p>Trọng lượng: <?= $productFind["weight"] ?></p>
            <p><?= number_format($productFind["price"]) ?> VND</p>
            <div>
                <button><a href = "../index.php?controller=cart&action=store&id=<?= $productFind["food_ID"] ?>">THÊM VÀO GIỎ HÀNG</a></button>
                <button>MUA NGAY</button>
            </div>
        </div>
    </div>

    <div>
        <p>MÔ TẢ SẢN PHẨM</p>
        <p>BÌNH LUẬN</p>
        <p>SẢN PHẨM KHÁC</p>
    </div>
    <div><?= $productFind["description"] ?></div>
    <hr>
    <p>BÌNH LUẬN</p>
    <hr>
    <input type="text" name="" id="" placeholder="Thêm bình luận...">
    <p>SẢN PHẨM KHÁC</p>
    <hr>
<?php
include_once('./Views/frontend/footer/index.php');
?>
<script>
    if('<?= $_SESSION['success'] ?>' != ''){
        let mes = '<?= $_SESSION['success'] ?>';
        alert(mes);
        <?php $_SESSION['success']='' ?>
    }
    
</script>