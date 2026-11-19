<?php

require "config.php";

// Newest records first so a newly added record shows at the top
$sql = "SELECT id, student_id, equipment, quantity, borrow_date FROM borrow_requests ORDER BY id DESC";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing Log</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        h1 {
            text-align: center;
        }

        .toolbar {
            width: 80%;
            margin: 0 auto 15px auto;
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
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: middle;
        }

        .actions {
            white-space: nowrap;
        }

        .actions form {
            display: inline;
        }
    </style>
</head>

<body>
    <h1>Borrowing Log</h1>

    <div class="toolbar">
        <a href="borrow.php" class="btn btn-primary">Add new</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Equipment Name</th>
                <th>Quantity</th>
                <th>Borrow Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["student_id"], ENT_QUOTES, "UTF-8"); ?></td>
                    <td><?php echo htmlspecialchars($row["equipment"], ENT_QUOTES, "UTF-8"); ?></td>
                    <td><?php echo (int)$row["quantity"]; ?></td>
                    <td><?php echo htmlspecialchars($row["borrow_date"], ENT_QUOTES, "UTF-8"); ?></td>
                    <td class="actions">
                        <a href="edit_request.php?id=<?php echo (int)$row["id"]; ?>" class="btn btn-warning btn-sm">Edit</a>

                        <form action="delete_request.php" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this borrowing request?');">
                            <input type="hidden" name="id" value="<?php echo (int)$row["id"]; ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
<?php $conn->close(); ?>