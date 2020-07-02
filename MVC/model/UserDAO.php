<?php
class UserDAO
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function login(User $user)
    {
        $sql = "Select * from users where email = ? and password = PASSWORD(?) limit 1";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $user->email);
        $statement->bindParam(2, $user->password);
        $statement->execute();
        $result = $statement->rowCount();
        return $result;
    }
}