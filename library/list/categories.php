<?php
include ("../layout/header.php");
    $hostName = "localhost";
    $useName = 'root';
    $passWord = 'hongthanh24486644';
    $databaseName = 'library';
    try{
        $connect = new PDO('mysql:host = '.$hostName.';dbName = '.$databaseName,$useName,$passWord);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT typeofbooks_ID, typeofbooks_name FROM library.typeofbooks';
        $result = $connect->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        die ('Lỗi: '.$e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Categories</h2>
    <table>
        <tr>
            <td>Code</td>
            <td>Category Name</td>
        </tr>
        <?php $i = 0 ?>
        <?php while ($row = $result->fetch()): ?>
        <?php $i++ ?>
            <tr>
                <td><?= htmlspecialchars($row['typeofbooks_ID']) ?></td>
                <td><?= htmlspecialchars($row['typeofbooks_name']) ?></td>
                <td><a href = '../update.php?id=<?= $row['typeofbooks_ID'] ?>'>Update</a></td>
                <td><a href = '../delete.php?id=<?= $row['typeofbooks_ID'] ?>'>Delete</a></td>

            </tr>
        <?php endwhile; ?>
    </table>
    <a href="../insert.php">Add new category</a>
</body>
</html>