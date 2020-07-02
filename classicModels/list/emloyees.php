<?php
include_once('../database/database.php');
include_once('../layout/header.php');

// try{
//     $connect = new PDO('mysql:host = '.$hostName. ';dbname = '.$databaseName,$userName,$passWord);
//     $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     echo "Thành công";
//     $sql = 'SELECT lastName, firstName,email,officeCode
//     FROM employees 
//     ORDER BY lastName';
// }
// catch(PDOException $e){
//     die($e->getMessage());
// }

$sql = "SELECT employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle
    FROM employees
    ORDER BY lastName";
$result = mysqli_query($connect, $sql);
if (!$result) {
    die('Câu truy vấn bị sai');
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
    <h2>Employees</h2>
    <table>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <tr>
            <td>employeeNumber</td>
            <td>lastName</td>
            <td>firstName</td>
            <td>extension</td>
            <td>email</td>
            <td>officeCode</td>
            <td>reportsTo</td>
            <td>jobTitle</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row["employeeNumber"]; ?></td>
                <td><?= $row["lastName"]; ?></td>
                <td><?= $row["firstName"]; ?></td>
                <td><?= $row["extension"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["officeCode"]; ?></td>
                <td><?= $row["reportsTo"]; ?></td>
                <td><?= $row["jobTitle"]; ?></td>
                <td><a href="#">Edit</a></td>
                <td><a href="delete.php?employeeNumber = "<?= $row["employeeNumber"]; ?>>Delete</a></td>
            </tr>
        <?php endwhile; ?>
        <?php endif; ?>
    </table>
    <a href = '../insert.php'>ADD new employee</a>
</body>

</html>