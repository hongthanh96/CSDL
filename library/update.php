<?php
include_once('layout/header.php');
?>
<?php
$hostName = "localhost";
$useName = 'root';
$passWord = 'hongthanh24486644';
$databaseName = 'library';
try {
    $connect = new PDO('mysql:host = ' . $hostName . ';dbName = ' . $databaseName, $useName, $passWord);
    $id = $_GET['id'];
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'INSERT SET typeofbooks';
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $typebook = $_POST["typebook"];
        $sql = "UPDATE library.typeofbooks SET typeofbooks_name = '$typebook'
        WHERE typeofbooks_ID = '$id'";
        $connect->exec($sql);
        header("location:../list/categories.php");
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <hr>
    <h3>Edit category</h3>
    <table>
    <form action="" method="post">
        <tr>
            <td>Code</td>
            <td><input type="text" name="code" id=""></td>
        </tr>
        <tr>
            <td>Catelogy name</td>
            <td><input type="text" name="typebook" id="">
            <td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="update" id="" value="Update">
            </td>
        </tr>
    </form>
    </table>
</body>

</html>