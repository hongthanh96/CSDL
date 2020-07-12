<?php
// require_once ('model/DbConnection.php');
// require_once ('model/product.php');
// require_once ('model/productDAO.php');
class ProductController extends BaseController
{
    private $productModel;
    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }
    public function index()
    {
        $categories = $this->categoryModel->getAll(['type_ID','type_name']);
        $products = $this->productModel->getAll(['food_ID', 'image', 'name', 'weight', 'price']);

        return $this->view('frontend.products.index', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function search()
    {
        // $ID= $_GET['id'] ?? null;
        $categories = $this->categoryModel->getAll(['type_ID','type_name']);
        $products = $this->productModel->getAll(['food_ID', 'image', 'name', 'weight', 'price']);
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $input = $_GET["input"];
            $search = "%$input%";

            $productsSearch = $this->productModel->search($search);
            $this->view('frontend.search.index', [
                'products' => $products,
                'productsSearch' => $productsSearch,
                'categories' => $categories,
            ]);
        }
    }

    public function store()
    {
        // die(var_dump($_GET));
        if (($_GET["isHot"]) == "noHot") {
            $hot = 0;
        } else {
            $hot = 1;
        }
        if (($_GET["isNew"]) == "noNew") {
            $new = 0;
        } else {
            $new = 1;
        }
        $data = [
            'food_ID' => $_GET["food_ID"],
            'image' => $_GET["name"],
            'weight' => $_GET["weight"],
            'price' => $_GET["description"],
            'description' => $_GET["price"],
            'quantityInStock' => $_GET["qty"],
            'isHot' =>  $hot,
            'isNew' =>  $new,
            'name' => $_GET["name"],
            'typeofproduct_type_ID' => $_GET["type_product"],
            'coments_coment_ID' => 1,
        ];
        $this->productModel->store($data);
        $_SESSION["success"] = "Đã thêm sản phẩm mới thành công";
        header("location:index.php?controller=admin&action=adminProduct");
    }
    public function delete()
    {   
        $id = $_GET["id"];
        $this->productModel->destroy($id);
        $_SESSION["success"] = "Đã xóa sản phẩm thành công!";
        header("location:index.php?controller=admin&action=adminProduct");

    }
    public function update(){
        if (($_GET["isHot"]) == "noHot") {
            $hot = 0;
        } else {
            $hot = 1;
        }
        if (($_GET["isNew"]) == "noNew") {
            $new = 0;
        } else {
            $new = 1;
        }
        $id = $_GET["id"];
        $data = [
            'food_ID' => $_GET["food_ID"],
            'image' => $_GET["name"],
            'weight' => $_GET["weight"],
            'price' => $_GET["description"],
            'description' => $_GET["price"],
            'quantityInStock' => $_GET["qty"],
            'isHot' =>  $hot,
            'isNew' =>  $new,
            'name' => $_GET["name"],
            'typeofproduct_type_ID' => $_GET["type_product"],
            'coments_coment_ID' => 1,
        ];
        $this->productModel->updateData($id,$data);
        $_SESSION["success"] = "Đã Update sản phẩm thành công!";
        header("location:index.php?controller=admin&action=adminProduct");

    }

    public function show()
    {
        $ID = $_GET['id'] ?? null;
        $categories = $this->categoryModel->getAll(['type_ID','type_name']);
        $products = $this->productModel->getAll();

        $productsFind = $this->productModel->findById($ID);
        $this->view('frontend.products.show', [
            'productsFind' => $productsFind,
            'categories'=> $categories,
            'products' => $products,
        ]);
        // header('location:index.php?controller=product');
    }
   
}
