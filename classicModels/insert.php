
<?php
include_once('database/database.php');
include_once('layout/header.php');
$customerNumber = 100;
$customerName = 'Thanh Chau';
$contactLastName = 'Thanh';
$contactFirstName = 'Chauu';
$phone = '0702420337';
$addressLine1 = '123nguyenkhoachiem';
$city = 'VN';
$postalCode = '345';
$creditLimit = 24567;

$sql= "INSERT INTO customers(customerNumber,customerName,contactLastName,contactFirstName,phone,addressLine1,city,postalCode,creditLimit)
        VALUE ('$customerNumber','$customerName','$contactLastName','$contactFirstName','$phone','$addressLine1','$city','$postalCode','$creditLimit')";
if(!mysqli_query($connect,$sql)){
    die("Lỗi: ".mysqli_error($connect));
}
else{
    echo "Thêm thành công!";
}
?>