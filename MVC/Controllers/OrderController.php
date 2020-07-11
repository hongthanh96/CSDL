<?php
    class OrderController extends BaseController{
        protected $orderModel;
        public function __construct(){
            $this->loadModel('OrderModel');
            $this->orderModel = new OrderModel;
    }
    public function store(){
        die(var_dump($_POST));
        // var_dump($_SESSION['cart']);
        if (!empty($_SESSION['cart'])){
        
            $order = $this->orderModel->store($_POST);
            // var_dump($order);
            // die();
            foreach ($_SESSION['cart'] as $product){
                $this->orderModel->storeOrderDetail([
                    'orderdetails_ID' => $product[0]['food_ID'],
                    'quantityOrdered' => $product['qty'],
                    'product_price' => $product[0]['price'],
                    'orders_order_ID' => $order['order_ID'],
                    'product_ID' => $product[0]['product_ID'],
                    'product_name' => $product[0]['name'],
                ]);
            }

        }

        
    }
}
