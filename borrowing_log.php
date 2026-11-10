<?php

require "config.php";

$sql = "SELECT * FROM borrow_requests";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing Log</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            border: 1px solid #ddd;
        }

        th {
            border: 1px solid #ddd;
            padding: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Borrowing Log</h1>
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Equipment Name</th>
                <th>Quantity</th>
                <th>Borrow Date</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["student_id"]; ?></td>
                    <td><?php echo $row["equipment"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo $row["borrow_date"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>