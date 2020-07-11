<?php
// require_once 'model/DbConnection.php';
// // require_once 'model/User.php';
// // require_once 'model/UserDAO.php';
// require_once ('model/product.php');
// require_once ('model/productDAO.php');
// $userDAO = new UserDAO(DbConnection::make());
// $user = new User(1, 'haha@123.com', '1234567890');
// $result = $userDAO->login($user);
// if($result) {
//     require_once 'view/dashboard.php';
//     // echo 'Login thành công';
// } else {
//     echo 'Sai thông tin tài khoản';
// }
class BaseController{
    const VIEW_FOLDER_NAME = 'Views';
    const MODEL_FOLDER_NAME = 'Models';
    
    protected function view($viewpath, array $data = [] ){
        // print_r ($data);
        // die;
        foreach ($data as $key =>$value){
            $$key = $value;
        }
        require (self::VIEW_FOLDER_NAME . '/' .str_replace('.','/',$viewpath) . '.php');
    }
    protected function loadModel($modelPath){
        require (self::MODEL_FOLDER_NAME . '/' .str_replace('.','/',$modelPath) . '.php');
    }
}


?>