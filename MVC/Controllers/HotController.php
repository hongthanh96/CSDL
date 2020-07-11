<?php
    class HotController extends BaseController{
        // private $categoryModel;
        private $productModel;
        public function __construct(){
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
            // $this->loadModel('CategoryModel');
            // $this->categoryModel = new CategoryModel;
        }
        public function index(){
            // $pageTitle = 'Danh sach theo danh mục sản phẩm: laptop';
            // $categories = $this->categoryModel->getAll(['type_ID','type_name']);
            $products = $this->productModel->getHot(1);
            $this->view('frontend.hots.index',[
                // 'categories' =>$categories,
                'products' =>$products,
                // 'pageTitle' => $pageTitle,
            ]);
        }
    }

?>