<?php
class CategoryController extends BaseController
{

    private $categoryModel;
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
        $categories = $this->categoryModel->getAll(['type_ID', 'type_name']);
        $this->view('frontend.categories.index', [
            'categories' => $categories,
        ]);
    }
    public function store()
    {   
        $data = [
            'type_ID' => $_GET["type_ID"],
            'type_name' => $_GET['type_name'],
        ];
        $this->categoryModel->store($data);
        $_SESSION["success"] = "Đã thêm Loại sản phẩm mới thành công";
        header("location:index.php?controller=admin&action=adminCategory");
    }
    public function update()
    {  
        $id = $_GET["id"];
        $data = [
            'type_ID' => $_GET["type_ID"],
            'type_name' => $_GET["type_name"],
        ];
        $this->categoryModel->updateData($id, $data);
        $_SESSION["success"] = "Đã Update sản phẩm thành công!";
        header("location:index.php?controller=admin&action=adminCategory");
    }
    public function show()
    {
        $categoryID = $_GET['id'] ?? null;
        $products = $this->productModel->getAll(['food_ID', 'image', 'name', 'weight', 'price']);
        $categories = $this->categoryModel->getAll(['type_ID', 'type_name']);
        $categoriesFind = $this->categoryModel->findById($categoryID);
        $productsFind = $this->productModel->getByCategoryID($categoryID);
        $this->view('frontend.categories.show', [
            'products' => $products,
            'categories' => $categories,
            'categoriesFind' => $categoriesFind,
            'productsFind' => $productsFind,
        ]);
    }
    public function delete()
    {
        $id = $_GET["id"];
        $this->categoryModel->destroy($id);
        $_SESSION["success"] = "Đã xóa loại sản phẩm thành công!";
        header("location:index.php?controller=admin&action=adminCategory");
    }
}
