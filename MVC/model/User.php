<?php
class User
{
    public $id;
    public $email;
    public $password;
    public $isAdmin;
    public $name;
    public function __construct($id, $email = null, $password = null, $isAdmin = false, $name = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
        $this->name = $name;
    }
}