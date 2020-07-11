<?php
include('./Views/frontend/header/index.php');
// unset ($_SESSION['cart']);
?>
    <form class="signup" action="index.php?controller=signup&action=store" method="post">
        <div class=container-signup>
            <h5 class="err"><?= $err_stmt ?? '' ?></h5>
            <div class="input-Signup">
                <div><img src="../picture/logofresh.png"></div>
                <div id="freshfood"><small>FreshFood SignUp Form</small></div>
            </div>
            <div class="input-Signup">
                <label for=""><i class="fas fa-user"></i></label>
                <input type="text" name="username" placeholder="Username" title="Nhập tên đăng nhâp!">
                <h5 class="err"><?= $err_name ?? '' ?></h5>
            </div>
            <div class="input-Signup">
                <label for=""><i class="fas fa-phone-alt"></i></label>
                <input type="text" name="phone" placeholder="Telephone" pattern="^0[0-9]{9,10}$" title="Số điện thoại gồm 10 số không chứa kí tự chữ!">
                <h5 class="err"><?= $err_phone ?? '' ?></h5>
            </div>
            <div class="input-Signup">
                <label for=""><i class="far fa-address-card"></i></label>
                <input type="text" name="address" placeholder="Address" title="Ghi cụ thể địa chỉ hiện tại!">
                <h5 class="err"><?= $err_address ?? '' ?></h5>
            </div>
            <div class="input-Signup">
                <label for=""><i class="far fa-envelope"></i></label>
                <input type="email" name="email" placeholder="Email" title="Nhập email hợp lệ chưa đăng kí tài khoản!">
                <h5 class="err"><?= $err_email ?? '' ?></h5>
            </div>
            <div class="input-Signup">
                <label for=""><i class="fas fa-lock"></i></label>
                <input type="password" name="passwword1" placeholder="Password" pattern="(?=.*[a-zA-Z0-9]).{6,}" title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
                <h5 class="err"><?= $err_password ?? '' ?></h5>
            </div>
            <div class="input-Signup">
                <label for=""><i class="fas fa-lock"></i></label>
                <input type="password" name="password2" placeholder="Re-type password" pattern="(?=.*[a-zA-Z0-9]).{6,}" required title="Mật khẩu có ít nhất 6 kí tự và không có kí tự đặc biệt!">
                <h5 class="err"><?= $err_confirm_password ?? '' ?></h5>
            </div>
            <div>
                <button >REGISTER NOW</button>
            </div>
            <div class="ready">
                <div>Already have an account? </div>
                <div><a href="index.php?controller=login">Login</a></div>
            </div>
        </div>
    </form>
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
