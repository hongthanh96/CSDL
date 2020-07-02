<?php
    include_once('../database/database.php');
    include_once('../layout/header.php');
    $sql1 = 'SELECT customerNumber, customerName, contactLastName, contactFirstName,phone,addressLine1,city,postalCode,country,creditLimit
            FROM customers
            ORDER BY customerName';
    $result1 = mysqli_query($connect,$sql1);
    if(!$result1){
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
    <h2>Customers</h2>
    <table>
        <thead>
            <tr>
                <td>customerNumber</td>
                <td>customerName</td>
                <td>contactLastName</td>
                <td>contactFirstName</td>
                <td>phone</td>
                <td>addressLine1</td>
                <td>city</td>
                <td>postalCode</td>
                <td>country</td>
                <td>creditLimit</td>
                <td>Edit</td>
                <td>Delete</td>


            </tr>
        </thead>
        <?php while ($row = mysqli_fetch_assoc($result1)) : ?>
            <tr>
                <td><?= $row["customerNumber"]; ?></td>
                <td><?= $row["customerName"]; ?></td>
                <td><?= $row["contactLastName"]; ?></td>
                <td><?= $row["contactFirstName"]; ?></td>
                <td><?= $row["phone"]; ?></td>
                <td><?= $row["addressLine1"]; ?></td>
                <td><?= $row["city"]; ?></td>
                <td><?= $row["postalCode"]; ?></td>
                <td><?= $row["country"]; ?></td>
                <td><?= $row["creditLimit"]; ?></td>
                <td><a href="edit.php">Edit</a></td>
                <td><a href="delete.php?customerNumber ="<?= $row["customerNumber"] ?>>Delete</a></td>

            </tr>
        <?php endwhile; ?>
    </table>
    <a href = '../insert.php'>ADD new customer</a>
</body>

</html>