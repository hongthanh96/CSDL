<?php
class UserController extends BaseController
{
    private $userModel;
    private $categoryModel;
    private $productModel;
    public function __construct()
    {   
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }
    public function index()
    {   
        $users = $this->userModel->getAll();
        // die(var_dump($users));
        $this->view('frontend.admin.adminUser', [
            'users' => $users,
        ]);
    }
    public function store()
    {  
        if (($_GET["is_Admin"]) == "noAdmin") {
            $isAdmin = 0;
        } else {
            $isAdmin = 1;
        }
        $data = [
            'customer_ID' => $_GET["customer_ID"],
            'customer_name' => $_GET["customer_name"],
            'phone' => $_GET["phone"],
            'address' => $_GET["address"],
            'email' => $_GET["email"],
            'password' => md5($_GET["password"]),
            'isAdmin' =>  $isAdmin,
            'payments_payment_ID' => 1,
            'orders_order_ID' => 1,
        ];
        $this->userModel->store($data);
        $_SESSION["success"] = "Đã thêm User thành công";
        header("location:index.php?controller=admin&action=adminUser");
    }
    public function update()
    {  
        $id = $_GET["id"];
        if (($_GET["is_Admin"]) == "noAdmin") {
            $isAdmin = 0;
        } else {
            $isAdmin = 1;
        }
        $data = [
            'customer_ID' => $_GET["customer_ID"],
            'customer_name' => $_GET["customer_name"],
            'phone' => $_GET["phone"],
            'address' => $_GET["address"],
            'email' => $_GET["email"],
            'password' => md5($_GET["password"]),
            'isAdmin' =>  $isAdmin,
            'payments_payment_ID' => 1,
            'orders_order_ID' => 1,
        ];
        $this->userModel->updateData($id, $data);
        $_SESSION["success"] = "Đã Update User thành công!";
        header("location:index.php?controller=admin&action=adminUser");
    }

    public function delete()
    {
        $id = $_GET["id"];
        $this->userModel->destroy($id);
        $_SESSION["success"] = "Đã xóa User thành công!";
        header("location:index.php?controller=admin&action=adminUser");
    }
}
