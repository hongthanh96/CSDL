<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

class OrderModel extends BaseModel
{
    const TABLE1 = 'orders';
    const TABLE2 = 'orderdetails';
    public function store($input)
    {
        $this->create(self::TABLE1, [
            'orderDate' => date("Y-m-d"),
            'customer_name' => $input['customer_name'],
            'customer_email' => $input['customer_email'],
            'customer_phone' => $input['customer_phone'],
            'customer_address' => $input['customer_address'],
            'code' => rand(100, 10000),
        ]);
    }
    public function storeOrderDetail($input){
        $this->create(self::TABLE2, [
            'orderdetails_ID' => $input['orderdetails_ID'],
            'quantityOrdered' => $input['quantityOrdered'],
            'product_price' => $input['product_price'],
            'orders_order_ID' => $input['orders_order_ID'],
            'product_ID' => $input['product_ID'],
            'product_name' => $input['product_name'],
        ]);
    }
}
