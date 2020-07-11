<?php include_once "adminHeader.php" ?>
<?php include_once("adminSidebar.php") ?>
<div class="admin-product">
    <table id="customers">
        <h1>DANH SÁCH KHÁCH HÀNG</h1>
        <button class="product_button product_add" onclick="document.getElementById('add').style.display='block'" class="">ADD PRODUCT</button>
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Is Admin</th>
            <th>Hành động</th>
        </tr>
        <tr>
            <?php foreach ($users as $user) : ?>
                <form action="index.php" method="get">
                    <input type="hidden" name="controller" value="user">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $user["customer_ID"] ?>">
                    <td><?= $user["customer_ID"] ?></td>
                    <td><?= $user["customer_name"] ?></td>
                    <td><?= $user["phone"] ?></td>
                    <td><?= $user["address"] ?></td>
                    <td><?= $user["email"] ?></td>
                    <td><?= $user["password"] ?></td>
                    <td><?= $user["isAdmin"] ?></td>
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
                <input type="hidden" name="controller" value="user">
                <input type="hidden" name="action" value="store">
                <div class="w3-section">
                    <label><b>Mã khách hàng</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mã khách hàng" name="customer_ID">
                    <label><b>Tên khách hàng</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập tên khách hàng" name="customer_name">
                    <label><b>Số điện thoại</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập số điện thoại khách hàng" name="phone">
                    <label><b>Địa chỉ</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập địa chỉ khách hàng" name="address">
                    <label><b>Email</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập email khách hàng" name="email">
                    <label><b>Mật khẩu</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mật khẩu khách hàng" name="password">
                    <label><b>Is Admin?</b></label>
                    <select name="is Admin" id="cars">
                        <option value="noAdmin">No Admin</option>
                        <option value="admin">Admin</option>
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
                <input type="hidden" name="controller" value="user">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $user["customer_ID"] ?>">
                <div class="w3-section">
                    <label><b>Mã khách hàng</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mã khách hàng" name="customer_ID">
                    <label><b>Tên khách hàng</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập tên khách hàng" name="customer_name">
                    <label><b>Số điện thoại</b></label>
                    <input class="w3-input w3-border" type="text" placeholder="Nhập số điện thoại khách hàng" name="phone">
                    <label><b>Địa chỉ</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập địa chỉ khách hàng" name="address">
                    <label><b>Email</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập email khách hàng" name="email">
                    <label><b>Mật khẩu</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nhập mật khẩu khách hàng" name="password">
                    <label><b>Is Admin?</b></label>
                    <select name="is Admin" id="cars">
                        <option value="noAdmin">No Admin</option>
                        <option value="admin">Admin</option>
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
    if ('<?= $_SESSION['success'] ?>' != '') {
        let mes = '<?= $_SESSION['success'] ?>';
        alert(mes);
        <?php $_SESSION['success'] = '' ?>
    }
</script>