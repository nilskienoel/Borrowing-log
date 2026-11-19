<?php

require "config.php";

// Only allow deletes via POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: borrowing_log.php");
    exit();
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    die("Invalid record ID.");
}

$sql = "DELETE FROM borrow_requests WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: borrowing_log.php", true, 303);
    exit();
}

echo "Error deleting record.";
$stmt->close();
$conn->close();