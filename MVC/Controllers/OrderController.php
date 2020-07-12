<?php
    class OrderController extends BaseController{
        protected $orderModel;
        public function __construct(){
            $this->loadModel('OrderModel');
            $this->orderModel = new OrderModel;
    }
    public function store(){
        // var_dump($_SESSION['cart']);
        // die(var_dump($_GET));
        $carts = $_SESSION["cart"];
        $customer_name = $_GET["customer_name"] ?? '';
        $email = $_GET["email"] ?? '';
        $address = $_GET["address"] ?? '';
        
        // die(var_dump( $_SESSION["user"]));
        if(isset($_SESSION["user"])){
            $this->view('frontend.order.store',[
                'carts' => $carts,
                'customer_name' => $customer_name,
                'email' => $email,
                'address' => $address,
            ]);
            // return header("location: ./index.php?controller=order&action=store");
        }
        else{
            $_SESSION["success"] = "Bạn phải đăng nhập để mua hàng!";
            // $this->view('frontend.login.index',[]);
            return header("location: ./index.php?controller=login");
        }


        // if (!empty($_SESSION['cart'])){
        
        //     $order = $this->orderModel->store($_POST);
        //     foreach ($_SESSION['cart'] as $product){
        //         $this->orderModel->storeOrderDetail([
        //             'orderdetails_ID' => $product[0]['food_ID'],
        //             'quantityOrdered' => $product['qty'],
        //             'product_price' => $product[0]['price'],
        //             'orders_order_ID' => $order['order_ID'],
        //             'product_ID' => $product[0]['product_ID'],
        //             'product_name' => $product[0]['name'],
        //         ]);
        //     }

        // }

        
    }
}
