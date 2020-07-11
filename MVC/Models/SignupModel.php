<?php
class SignupModel extends BaseModel
{
    const TABLE = 'users';
    public function store($input)
    {
        $this->create(self::TABLE, [
            'customer_name' => trim($input['username']),
            'phone' => trim($input['phone']),
            'address' => trim($input['address']),
            'email' => trim($input['email']),
            'password' => md5(trim($input['passwword1'])),
            'isAdmin' => 0,
            'payments_payment_ID' => 1,
            'orders_order_ID' => 1,
        ]);
    }
    public function existuser($input){
        $this->createUser(self::TABLE, [
            'customer_name' => trim($input['username']),
            'phone' => trim($input['phone']),
            'address' => trim($input['address']),
            'email' => trim($input['email']),
            'password' => md5(trim($input['passwword1'])),
            'isAdmin' => 0,
            'payments_payment_ID' => 1,
            'orders_order_ID' => 1,
        ]);
    }
    public function findemail($email){
        return $this->existEmail(self::TABLE,$email);
    }
}
?>