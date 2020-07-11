<?php include_once "adminHeader.php" ?>
<?php include_once("adminSidebar.php") ?>
<div class="admin-product">
    <table id="customers">
        <h1>DANH SÁCH LOẠI SẢN PHẨM</h1>
        <button class="product_button product_add" onclick="document.getElementById('add').style.display='block'" class="">ADD CATEGORY</button>
        <tr>
            <th>Mã Loại</th>
            <th>Tên Loại</th>
            <th>Hành động</th>
        </tr>
        <tr>
            <?php foreach ($categories as $category) : ?>
                <form action="index.php" method="get">
                    <input type="hidden" name="controller" value="category">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $category["type_ID"] ?>">
                <td><?= $category["type_ID"] ?></td>
                <td><?= $category["type_name"] ?></td>
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
                <input type="hidden" name="controller" value="category">
                <input type="hidden" name="action" value="store">
                <div class="w3-section">
                    <label><b>Mã Loại</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mã loại" name="type_ID">
                    <label><b>Tên Loại</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập tên loại" name="type_name">
        

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
                <input type="hidden" name="controller" value="category">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $category["type_ID"] ?>">
                <div class="w3-section">
                    <label><b>Mã Loại</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mã loại" name="type_ID">
                    <label><b>Tên Loại</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập tên loại" name="type_name">
        

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