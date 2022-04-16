<?php
    $student_id = $_POST['student_id'];
    $conn = require 'connect_to_db.php';

    $sql = "SELECT student_id FROM studentprojects WHERE student_id = '$student_id';";
    $query = mysqli_query($conn, $sql);
    
    $resCount = mysqli_num_rows($query);
    if ($resCount > 0) {
        // ask user if they want to update their selection
    }
    else require 'submit_form.php'
?>