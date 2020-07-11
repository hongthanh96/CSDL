<?php
class LoginModel extends BaseModel
{
    const TABLE = 'users';
    public function findUser($email,$pass){
        $sql = "SELECT * FROM " . self::TABLE . " WHERE email = '${email}' AND password = '${pass}'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
    
        }
}
?>