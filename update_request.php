<?php

require "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: borrowing_log.php");
    exit();
}

$id          = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$student_id  = trim($_POST["student_id"] ?? "");
$equipment   = trim($_POST["equipment"] ?? "");
$quantity    = filter_var($_POST["quantity"] ?? "", FILTER_VALIDATE_INT);
$borrow_date = trim($_POST["borrow_date"] ?? "");

if (
    !$id || $id < 1 ||
    $student_id === "" ||
    $equipment === "" ||
    $quantity === false ||
    $quantity < 1 ||
    $borrow_date === ""
) {
    die("Invalid information. Please check your form.");
}

// DB column is "equipment" (not "equipment_name")
$sql = "UPDATE borrow_requests SET student_id = ?, equipment = ?, quantity = ?, borrow_date = ? WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssisi", $student_id, $equipment, $quantity, $borrow_date, $id);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: borrowing_log.php", true, 303);
    exit();
}

echo "Error updating record.";
$stmt->close();
$conn->close();
