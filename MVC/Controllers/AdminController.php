<?php
class AdminController extends BaseController
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
    public function adminProduct()
    {
        $products = $this->productModel->getAll();
        $this->view('frontend.admin.adminProduct', [
            'products' => $products,
        ]);
    }
    public function adminCategory(){
        $categories = $this->categoryModel->getAll();
        $this->view('frontend.admin.adminCategory',[
            'categories' => $categories,
        ]);

    }
    public function adminUser(){
        $users = $this->userModel->getAll();
        $this->view('frontend.admin.adminUser',[
            'users' => $users,
        ]);

    }
}
