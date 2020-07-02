<?php
     $serverName = 'localhost';
     $usename = 'root';
     $password = 'hongthanh24486644';
     $dbname = 'case_study';
     try{
         $connect = new PDO("mysql:host=$serverName;dbname=$dbname",$usename,$password);
         $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Connect failed: ".$e->getMessage();
        }
