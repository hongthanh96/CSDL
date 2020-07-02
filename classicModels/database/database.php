<?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = 'hongthanh24486644';
    $databaseName = 'classicmodels';
    $connect = mysqli_connect($hostName,$userName,$passWord,$databaseName);
    if(!$connect){
        die("Kết nối không thành công!");
    }
 
?>