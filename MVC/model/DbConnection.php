<?php
class DbConnection
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=products;charset=utf8', 'root', 'hongthanh24486644', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>