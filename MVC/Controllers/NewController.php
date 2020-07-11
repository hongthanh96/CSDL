<?php
    class NewController extends BaseController{
        private $productModel;
        public function __construct(){
            $this->loadModel('ProductModel');
            $this->productModel = new ProductModel;
        }
        public function index(){
            $products = $this->productModel->getNew(1);
            $this->view('frontend.news.index',[
                'products' =>$products,
            ]);
        }
    }

?>