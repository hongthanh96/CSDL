<?php include_once "adminHeader.php" ?>
<?php include_once("adminSidebar.php") ?>
<div class="admin-product">
    <table id="customers" class = "table_product">
        <h1>DANH SÁCH SẢN PHẨM</h1>
        <button class="product_button product_add" onclick="document.getElementById('add').style.display='block'" class="">ADD PRODUCT</button>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh 1</th>
            <th>Hình ảnh 2</th>
            <th>Hình ảnh 3</th>
            <th>Hình ảnh 4</th>
            <th>Trọng lượng 5</th>
            <th>Giá</th>
            <th>Tổng kho</th>
            <th>Is Hot</th>
            <th>Is New</th>
            <th>Loại sản phẩm</th>
            <th>Hành động</th>
        </tr>
        <tr>
            <?php foreach ($products as $product) : ?>
                <form action="index.php" method="get">
                    <input type="hidden" name="controller" value="product">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $product["food_ID"] ?>">
                <td><?= $product["food_ID"] ?></td>
                <td><?= $product["name"] ?></td>
                <td><?= $product["image"] ?></td>
                <td><?= $product["image2"] ?></td>
                <td><?= $product["image3"] ?></td>
                <td><?= $product["image4"] ?></td>
                <td><?= $product["weight"] ?></td>
                <td><?= $product["price"] ?></td>
                <td><?= $product["quantityInStock"] ?></td>
                <td><?= $product["isHot"] ?></td>
                <td><?= $product["isNew"] ?></td>
                <td><?= $product["typeofproduct_type_ID"] ?></td>
                <td>
                <button class="product_button product_del" onclick="document.getElementById('delete').style.display='block'" class="">Delete</button>
                </form>
                <button class="product_button product_up" onclick="document.getElementById('update').style.display='block'" class="">Update</button>
                    
                </td>
        </tr>
    <?php endforeach; ?>

    <!-- function add -->
    <div id="add" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('add').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <img src="picture/logofresh.png" alt="Avatar" style="width:50%" class="logo">
            </div>

            <form class="w3-container" action="index.php">
                <input type="hidden" name="controller" value="product">
                <input type="hidden" name="action" value="store">
                <div class="w3-section">
                    <label><b>Mã sản phẩm</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mã sản phẩm" name="food_ID">
                    <label><b>Tên sản phẩm</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập tên sản phẩm" name="name">
                    <label><b>File hình ảnh1</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập file hình ảnh1" name="image">
                    <label><b>File hình ảnh2</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập file hình ảnh2" name="image2">
                    <label><b>File hình ảnh3</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập file hình ảnh3" name="image3">
                    <label><b>File hình ảnh4</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập file hình ảnh4" name="image4">
                    <label><b>Trọng lượng</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập trọng lượng sản phẩm" name="weight">
                    <label><b>Giá sản phẩm</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập giá sản phẩm" name="description">
                    <label><b>Mô tả sản phẩm</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mô tả sản phẩm" name="price">
                    <label><b>Số lượng</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập số lượng" name="qty">
                    <label><b>Loại sản phẩm</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mã loại" name="type_product">
                    <label><b>Is Hot?</b></label>
                    <select name="isHot" id="cars">
                        <option value="noHot">No Hot</option>
                        <option value="Hot">Hot</option>
                    </select>
                    <label><b>Is New?</b></label>
                    <select name="isNew" id="cars">
                        <option value="noNew">no New</option>
                        <option value="New">New</option>
                    </select>

                    <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">ADD</button>
                </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('add').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            </div>

        </div>
    </div>


    <!-- function update -->

    <div id="update" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('update').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <img src="picture/logofresh.png" alt="Avatar" style="width:50%" class="logo">
            </div>

            <form class="w3-container" action="index.php">
                <input type="hidden" name="controller" value="product">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $product["food_ID"] ?>">
                <div class="w3-section">
                    <label><b>Mã sản phẩm</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập sản phẩm" name="food_ID">
                    <label><b>Tên sản phẩm</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập tên sản phẩm" name="name">
                    <label><b>File hình ảnh1</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập file hình ảnh1" name="image">
                    <label><b>File hình ảnh2</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập file hình ảnh2" name="image2">
                    <label><b>File hình ảnh3</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập file hình ảnh3" name="image3">
                    <label><b>File hình ảnh4</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập file hình ảnh4" name="image4">
                    <label><b>Trọng lượng</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập trọng lượng sản phẩm" name="weight">
                    <label><b>Giá sản phẩm</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập giá sản phẩm" name="description">
                    <label><b>Mô tả sản phẩm</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mô tả sản phẩm" name="price">
                    <label><b>Số lượng</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập số lượng" name="qty">
                    <label><b>Loại sản phẩm</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mã loại" name="type_product">
                    <label><b>Is Hot?</b></label>
                    <select name="isHot" id="cars">
                        <option value="noHot">Hot</option>
                        <option value="Hot">No Hot</option>
                    </select>
                    <label><b>Is New?</b></label>
                    <select name="isNew" id="cars">
                        <option value="noNew">no New</option>
                        <option value="New">New</option>
                    </select>

                    <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">UPDATE</button>
                </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('update').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
            </div>

        </div>
    </div>



    </table>
</div>
<script>
    if('<?= $_SESSION['success'] ?>' != ''){
        let mes = '<?= $_SESSION['success'] ?>';
        alert(mes);
        <?php $_SESSION['success']='' ?>
    }
    
</script>