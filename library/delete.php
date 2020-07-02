<?php
    $hostName = "localhost";
    $useName = 'root';
    $passWord = 'hongthanh24486644';
    $databaseName = 'library';
    try{
        $connect = new PDO('mysql:host = '.$hostName.';dbName = '.$databaseName,$useName,$passWord);
        $id = $_GET["id"];
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM library.typeofbooks WHERE typeofbooks_ID = '$id'";
        $connect->exec($sql);
        header("location:../list/categories.php");
    }
    catch(PDOException $e){
        die ($e->getMessage());
    }
?>