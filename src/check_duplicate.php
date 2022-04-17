<?php
    include_once 'database.php';
    session_start();

    $student_id = $_POST['student_id'];
    
    $db = $_SESSION['db'];
    $sql = "SELECT student_id FROM studentprojects WHERE student_id = ?;";
    $types = "i";
    $res = $db->execute_prepared_stmt($sql, $types, $student_id);
    
    $resCount = mysqli_num_rows($res);
    if ($resCount > 0) {
        echo 'here';
        // ask user if they want to update their selection
    }
    else require 'submit_form.php'
?>