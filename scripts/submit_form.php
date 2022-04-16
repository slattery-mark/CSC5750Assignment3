<?php 
    // safeguard against SQL injection
    function preventSQLInjection(&$fields) {
        foreach ($fields as &$input) {
            is_array($input) ? preventSQLInjection($input) : $input = addslashes($input);
        }
    }

    preventSQLInjection($_POST);

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
    
    $sql = "INSERT INTO studentprojects VALUES ($student_id, '$fname', '$lname', '$email', '$phone_concat', '$project_title');";
    $sql .= "INSERT INTO registration VALUES (DEFAULT, $student_id, $slot_id);";
    $sql .= "UPDATE timeframes SET available_seats = available_seats - 1 WHERE slot_id = $slot_id;";
    $conn = require 'connect_to_db.php';
    
    mysqli_multi_query($conn, $sql);
    
    // route back to index.php
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else {
        echo "Unknown error. Return to homepage to continue.";
    }
?>