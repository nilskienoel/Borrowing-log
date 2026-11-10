<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Borrow Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;

            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 32px;
            text-align: center;
            font-weight: bold;
            margin: 30px 0;
        }

        :root {
            --primary: #04AA6D;
            --primary-dark: #038a57;
            --primary-light: rgba(4, 170, 109, 0.25);
        }

        /* Form card */
        form {
            max-width: 450px;
            margin: 0 auto;
            padding: 15px 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Centered, narrower fields (remove max-width to make them full width) */
        .form-horizontal .form-group {
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }

        /* Labels */
        .form-horizontal label {
            font-weight: 600;
            color: #333;
        }

        /* Inputs */
        .form-control {
            height: 42px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-shadow: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            outline: none;
        }

        /* Button */
        button[type="submit"] {
            display: block;
            width: 100%;
            background-color: var(--primary);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 15px;
            font-weight: 400;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button[type="submit"]:hover,
        button[type="submit"]:focus {
            background-color: var(--primary-dark);
            color: #fff;
        }
    </style>
</head>

<body>

    <h1>Borrow Request Form</h1>

    <form class="form-horizontal" action="save_request.php" method="POST">

        <div class="form-group">
            <label for="student_id">Student ID:</label>
            <input type="text" class="form-control" name="student_id" id="student_id" placeholder="Student ID" required>
        </div>

        <div class="form-group">
            <label for="equipment">Equipment Name:</label>
            <input type="text" class="form-control" name="equipment" id="equipment" placeholder="Enter Equipment name" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity" required>
        </div>

        <div class="form-group">
            <label for="borrow_date">Borrow Date:</label>
            <input type="date" class="form-control" name="borrow_date" id="borrow_date" placeholder="Enter Borrow Date" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Save</button>
        </div>
    </form>
</body>

</html>