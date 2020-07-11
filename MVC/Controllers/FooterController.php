<?php
    class FooterController extends BaseController{
        private $categoryModel;
        private $productModel;
        public function __construct(){
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel;
        }
        public function index(){
            $categories = $this->categoryModel->getAll(['type_ID','type_name']);
            $products = $this->productModel->getAll(['food_ID','image','name','weight','price']);
            $this->view('frontend.footer.index',[
                'categories' =>$categories,
                'products' =>$products,
            ]);
        }
    }

?>