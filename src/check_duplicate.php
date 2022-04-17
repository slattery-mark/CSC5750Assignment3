<?php
    $student_id = $_POST['student_id'];
    $conn = require 'connect_to_db.php';

    // prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT student_id FROM studentprojects WHERE student_id = ?;");
    mysqli_stmt_bind_param($stmt, "i", $student_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    $resCount = mysqli_num_rows($res);
    if ($resCount > 0) {
        echo 'here';
        // ask user if they want to update their selection
    }
    else require 'submit_form.php'
?>