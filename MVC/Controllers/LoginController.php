<?php
     class LoginController extends BaseController{
        private $categoryModel;
        private $productModel;
        private $loginModel;
        public function __construct(){
              $this->loadModel('CategoryModel');
              $this->categoryModel = new CategoryModel;
              $this->loadModel('ProductModel');
              $this->productModel = new ProductModel;
              $this->loadModel('LoginModel');
              $this->loginModel = new LoginModel;
        }
        public function index(){
              $categories = $this->categoryModel->getAll(['type_ID','type_name']);
              $products = $this->productModel->getAll(['food_ID','image','name','weight','price']);
              $this->view('frontend.login.index',[
                  'categories' =>$categories,
                  'products' => $products,
              ]);
        }
        public function store(){
            $categories = $this->categoryModel->getAll(['type_ID','type_name']);
            $products = $this->productModel->getAll(['food_ID','image','name','weight','price']);
            $email = trim($_POST["email"]);
            $pass = md5(trim($_POST["password"]));
            $result = $this->loginModel->finduser($email,$pass);
            $_SESSION['user'] = $result[0] ?? '';
            // die(var_dump($_SESSION["cart"]));
            if (count($result)) {
                $_SESSION['user'] = $result[0];
                if($result[0]['isAdmin'] == 1 ){
                    return header('location: ./index.php?controller=admin');
                }if(isset($_SESSION["cart"])!== ''){
                    return header("location: ./index.php?controller=order&action=store");
                }else{
                    return header('location: ./index.php?controller=homepage');
                }          
            } else {
                $_SESSION['success'] = '*Tài khoản hoặc mật khẩu không đúng';
                $this->view('frontend.signup.index',[
                    'categories' =>$categories,
                    'products' => $products,
                ]);
            }

        }
        public function logout(){
            session_destroy();
            header('location:index.php?controller=homepage');
        }
    }
