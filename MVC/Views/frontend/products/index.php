

<?php
// echo '<pre>';
// foreach ($results as $result){
//     echo $result["image"];
//     echo $result["name"];
//    echo $result["weight"];
//     echo $result["price"];
//  }
// echo "<pre>";
// print_r($products);
include ('./Views/frontend/header/index.php');
?>  
    <div class = "product_all"><h2>TẤT CẢ SẢN PHẨM</h2></div>
    <div class="products">
        <?php foreach ($products as $result) : ?>
            <div class="product">
                <a href="index.php?controller=product&action=show&id=<?= $result["food_ID"]?>"><img src='<?= $result["image"] ?>'></a>
                <p class = "product-name"><?= $result["name"] ?></p>
                <!-- <p><?= $result["weight"] ?></p> -->
                <p class = "product-price"><?= number_format($result["price"]) ?> VND</p>
                <button><a href="index.php?controller=cart&action=store&id=<?= $result["food_ID"] ?>">Thêm vào giỏ hàng!</a></button>
            </div>
        <?php endforeach; ?>
    </div>
<?php 
       include_once ('./Views/frontend/footer/index.php');
?>
<script>
    if('<?= $_SESSION['success'] ?>' != ''){
        let mes = '<?= $_SESSION['success'] ?>';
        alert(mes);
        <?php $_SESSION['success']='' ?>
    }
    
</script>
