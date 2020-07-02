<?php
    $hostName = "localhost";
    $useName = 'root';
    $passWord = 'hongthanh24486644';
    $databaseName = 'library';
    try{
        $connect = new PDO('mysql:host = '.$hostName.';dbName = '.$databaseName,$useName,$passWord);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM typeofbooks';
    }
    catch(PDOException $e){
        die ($e->getMessage());
    }
?>