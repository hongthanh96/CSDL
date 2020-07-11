<?php
class CartController extends BaseController{
    private $categoryModel;
    protected $productModel;
    public function __construct(){
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }
    public function  index(){

        $categories = $this->categoryModel->getAll(['type_ID','type_name']);
        $products = $this->productModel->getAll(['food_ID','image','name','weight','price']);

        $carts = $_SESSION["cart"] ?? [];
        $this->view('frontend.cart.index',[
            'products' => $products,
            'categories' => $categories,
            'carts' => $carts,
        ]);
    }
    public function store(){
        $productID = $_GET["id"] ?? null;
        $product = $this->productModel->findById($productID);
        if(empty($_SESSION["cart"]) || !array_key_exists($productID,$_SESSION['cart'])){
            $product['qty'] = 1;
            $_SESSION['cart'][$productID] = $product;
            $_SESSION["success"] = "Đã thêm vào giỏ hàng";

        }
        else{
            $product['qty'] = $_SESSION['cart'][$productID]['qty'] + 1;
            $_SESSION['cart'][$productID] = $product;
            $_SESSION["success"] = "Đã tồn tại giỏ hàng! cập nhật mới thành công";
        }
     

        // header("location:index.php?controller=product&action=show&id=${productID}");
        header("location:index.php?controller=product");
       
    }

    public function delete(){
        $productID = $_GET['id'] ?? null;
        unset ($_SESSION['cart'][$productID]);
        header('location:index.php?controller=cart');
    }
    
    public function update(){
        foreach ($_POST['qty'] as $productID => $qty){
            if($qty < 0 || !is_numeric($qty)){
                continue;
            }
            if($qty == 0){
                unset($_SESSION['cart']["$productID"]);
            }
            else{
                $_SESSION['cart']["$productID"]["qty"] = $qty;
            }
            
            
        }
        header('location:index.php?controller=cart');
    }
    public function destroy(){
        unset($_SESSION['cart']);
        header('location:index.php?controller=cart');
    }

}

