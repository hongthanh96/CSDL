<?php
   class SignupController extends BaseController{
      private $categoryModel;
      private $productModel;
      private $signupModel;
      public function __construct(){
            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel;
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
            $this->loadModel('SignupModel');
            $this->signupModel = new SignupModel;
      }
      public function index(){
            $categories = $this->categoryModel->getAll(['type_ID','type_name']);
            $products = $this->productModel->getAll(['food_ID','image','name','weight','price']);
            $this->view('frontend.signup.index',[
                'categories' =>$categories,
                'products' => $products,
            ]);
      }
      public function store(){
         $categories = $this->categoryModel->getAll(['type_ID','type_name']);
         $products = $this->productModel->getAll(['food_ID','image','name','weight','price']);
            $err_stmt = $err_email = $err_password = $err_name = $err_address = $err_confirm_password = $err_phone = '';
            $email_reg = '/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/';
            $pass_reg = '/^[a-zA-Z0-9]{6,}$/';
            $phone_reg = '/^0[0-9]{9,10}$/';

            $email = trim($_POST["email"]);
            $password1 = trim($_POST["passwword1"]);
            $password2 = trim($_POST["password2"]);
            $name = trim($_POST["username"]);
            $address = trim($_POST["address"]);
            $phone = trim($_POST["phone"]);

               // Validate email
               $email_exist = $this->signupModel->findemail($_POST["email"]);
            if (empty($email)) {
              $err_email = "Nhập Email của bạn vào.";
           } else {
              if (preg_match_all($email_reg, $email)) {
                 if ($email_exist === 1) {
                    $err_email = '* Email này đã được sử dụng *';
                 } elseif ($email_exist === -1) {
                    $err_stmt = '* Có lỗi xãy ra. Bạn hãy thực hiện đăng kí lại *';
                 }
              } else $err_email = " * Đây không phải là một Email *";
           }
           // Validate password
           if(empty($password1)) {
              $err_password = "* Nhập password của bạn vào! *";
           } 
           else if (preg_match_all($pass_reg, $password1)) {
              $password = $password1;
           } 
           else {
              $err_password = "* Password phải có ít nhất 6 kí tự và không có ký tự đặt biệt nào! *";
           }
         //   Validate confirm password
           if (empty($password2)) {
              $err_confirm_password = "* Nhập password của bạn vào! *";
           } 
           else {
              $confirm_password = $password2;
              if (empty($err_password) && ($password != $password2)) {
                 $err_confirm_password = "* Password không giống nhau! *";
              }
           }
           // Validate name
           if (empty($name)) {
              $err_name = "* Nhập tên của bạn vào *";
           }
        
           // Validate address
           if (empty($address)) {
              $err_address = "* Nhập địa chỉ của bạn vào *";
           }
        
           // Validate phone
           if (empty($phone)) {
              $err_phone = "* Nhập số điện thoại của bạn vào *";
           } else {
              if (!preg_match($phone_reg, $phone)) {
                 $err_phone = '* Không phải số điện thoại *';
              }
           }
           $err=[
              'err_stmt'=>$err_stmt,
              'err_email'=>$err_email,
              'err_password'=>$err_password,
              'err_confirm_password'=>$err_confirm_password,
              'err_name'=>$err_name,
              'err_address'=>$err_address,
              'err_phone'=>$err_phone,
              'categories' =>$categories,
              'products' => $products,
          ];
         if(
              empty($err_stmt) && empty($err_email) && empty($err_password) && 
              empty($err_confirm_password) && empty($err_name && empty($err_address)) && empty($err_phone)
         ){  
            $this->signupModel->store($_POST);
            $_SESSION["success"] = "Đã tạo tài khoản thành công!";
            header("Location: index.php?controller=login");
         }else{  
            $_SESSION["success"] = "Tạo tài khoản thất bại. Hãy đăng kí lại!";
            // header("location:/index.php?controller=signup");
            return $this->view('frontend.signup.index', $err);
         }
      }
   }
