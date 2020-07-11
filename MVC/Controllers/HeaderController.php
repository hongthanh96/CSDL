<?php
    class HeaderController extends BaseController{
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
            $this->view('frontend.header.index',[
                'categories' =>$categories,
                'products' =>$products,
            ]);
        }
        
       
        // public function show(){
        //     $ID= $_GET['id'] ?? null;
        //     $products = $this->productModel->findById($ID);
        //     $this->view('frontend.header.show',[
        //         'products' =>$products,
        //     ]);
        // }
    }

?>