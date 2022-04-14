<?php 
    // safeguard against SQL injection
    function preventSQLInjection(&$fields) {
        foreach ($fields as &$input) {
            is_array($input) ? preventSQLInjection($input) : $input = addslashes($input);
        }
    }

    preventSQLInjection($_POST);

    // retrieve submitted data
    $start_time = $_POST['start_time'];
    $project_title = $_POST['project_title'];
    $name = $_POST['name'];
    $fname = $name['fname'];
    $lname = $name['lname'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $phone_concat = "(" . $phone['first_digit_group'] . ")-" . $phone['second_digit_group'] . "-" . $phone['third_digit_group'];

    // check if student already registered
    $conn = require 'connect_to_db.php';
    $sql = "SELECT student_id FROM studentprojects WHERE student_id = '$student_id';";
    $query = mysqli_query($conn, $sql);
    $resCount = mysqli_num_rows($query);
    if ($resCount > 0 && isset($_SERVER["HTTP_REFERER"])) { 
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
    }
    else {
        echo "Return to homepage to submit data.";
    }
    
    // insert into database if student not registerred
    $sql = "INSERT INTO studentprojects VALUES (DEFAULT, '$fname', '$lname', '$email', '$phone_concat', '$project_title');";
    $query = mysqli_query($conn, $sql);
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else {
        echo "Return to homepage to continue.";
    }
?> 