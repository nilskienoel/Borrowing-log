<?php

require "config.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST["student_id"];
    $equipment = $_POST["equipment"];
    $quantity = $_POST["quantity"];
    $borrow_date = $_POST["borrow_date"];

    $sql = "INSERT INTO borrow_requests (student_id, equipment, quantity, borrow_date) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssss",
        $student_id,
        $equipment,
        $quantity,
        $borrow_date
    );

    $stmt->execute();

    header("Location: borrowing_log.php", true, 303);
    exit();
}
?>