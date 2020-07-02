<?php
require_once 'model/DbConnection.php';
require_once 'model/User.php';
require_once 'model/UserDAO.php';
$userDAO = new UserDAO(DbConnection::make());
$user = new User(1, 'haha@123.com', '1234567890');
$result = $userDAO->login($user);
if($result) {
    require_once 'view/dashboard.php';
    // echo 'Login thành công';
} else {
    echo 'Sai thông tin tài khoản';
}