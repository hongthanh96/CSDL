<?php
include('./Views/frontend/header/index.php');
// unset ($_SESSION['cart']);
?>
<form class="login" action="index.php?controller=login&action=store" method="post">
    <div class=container-login>
        <div class="input-login">
            <div><img src="../picture/logofresh.png"></div>
            <div id="freshfood"><small>FreshFood Login Form</small></div>
        </div>
        <div class="input-login">
            <label for=""><i class="far fa-envelope"></i></label>
            <input type="email" name="email" placeholder="Email" title="Nhập email hợp lệ chưa đăng kí tài khoản!">
        </div>
        <div class="input-login">
            <label for=""><i class="fas fa-lock"></i></label>
            <input type="password" name="password" placeholder="password">
            <h5 class="err"><?= $err_password ?? '' ?></h5>
        </div>
        <div>
            <button>LOGIN NOW</button>
        </div>
        <div class="ready-login">
            <div>Don't have an account? </div>
            <div><a href="index.php?controller=signup">Sign up</a></div>
        </div>
    </div>
</form>

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