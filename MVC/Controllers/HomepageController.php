<?php
    class HomepageController extends BaseController{
        private $categoryModel;
        private $productModel;
        public function __construct(){
            $this->loadModel('CategoryModel');
            $this->categoryModel = new CategoryModel;
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
        }
        public function index(){
            $categories = $this->categoryModel->getAll(['type_ID','type_name']);
            $products = $this->productModel->getAll(['food_ID','image','name','weight','price']);
            $productsHot = $this->productModel->getHot(1);
            $productsNew = $this->productModel->getNew(1);
            $this->view('frontend.homepage.index',[
                'categories' =>$categories,
                'products' => $products,
                'productsHot' => $productsHot,
                'productsNew' => $productsNew,
            ]);
        }
    }
