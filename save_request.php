<?php

require "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: borrowing_log.php");
    exit();
}

$student_id  = trim($_POST["student_id"] ?? "");
$equipment   = trim($_POST["equipment"] ?? "");
$quantity    = filter_var($_POST["quantity"] ?? "", FILTER_VALIDATE_INT);
$borrow_date = trim($_POST["borrow_date"] ?? "");

// Validate: all four fields required, quantity must be > 0, date must be valid
$d = DateTime::createFromFormat("Y-m-d", $borrow_date);
$validDate = $d && $d->format("Y-m-d") === $borrow_date;

if (
    $student_id === "" ||
    $equipment === "" ||
    $quantity === false ||
    $quantity < 1 ||
    !$validDate
) {
    die("Invalid information. All fields are required and quantity must be greater than zero. <a href='borrow.php'>Go back</a>");
}

$sql = "INSERT INTO borrow_requests (student_id, equipment, quantity, borrow_date) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $student_id, $equipment, $quantity, $borrow_date);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: borrowing_log.php", true, 303);
    exit();
}

echo "Error saving record.";
$stmt->close();
$conn->close();