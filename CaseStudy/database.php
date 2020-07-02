<?php
    $products = json_decode(file_get_contents('product.json'),true);
    $serverName = 'localhost';
    $usename = 'root';
    $password = 'hongthanh24486644';
    $dbname = 'products';
    try{
        $connect = new PDO("mysql:host=$serverName;dbname=$dbname",$usename,$password);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $i = 0;
        foreach($products as $product){
            $name = $product["sku"];
            $price = $product["price"];
            $image = $product["image"];
            // $img = str_replace('http://localhost:2222/','',$image);
            $sql = "INSERT INTO products.product(image, name, price) VALUES ('$image','$name','$price')";
            $connect->exec($sql);
        }
    }
    catch(PDOException $e){
        echo "Connect failed: ".$e->getMessage();
    }
?>