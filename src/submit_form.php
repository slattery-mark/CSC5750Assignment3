<?php 
    // retrieve submitted data
    $slot_id = $_POST['start_time'];
    $project_title = $_POST['project_title'];
    $name = $_POST['name'];
    $fname = $name['fname'];
    $lname = $name['lname'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $phone_concat = "(" . $phone['first_digit_group'] . ")-" . $phone['second_digit_group'] . "-" . $phone['third_digit_group'];

    $conn = require 'connect_to_db.php';
    $stmt = mysqli_prepare($conn, "INSERT INTO studentprojects VALUES (?, ?, ?, ?, ?, ?, DEFAULT);");
    mysqli_stmt_bind_param($stmt, "isssss", $student_id, $fname, $lname, $email, $phone_concat, $project_title);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    
    // route back to index.php
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else {
        echo "Unknown error. Return to homepage to continue.";
    }
?>