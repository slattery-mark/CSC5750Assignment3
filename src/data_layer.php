<?php
    // classes
    require_once 'db_handler.php';

    // functions
    function set_student_data() {
        $_SESSION['slot_id'] = $_POST['slot_id'];
        $_SESSION['project_title'] = trim($_POST['project_title']);
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['name']['fname'] = trim($_POST['name']['fname']);
        $_SESSION['name']['lname'] = trim($_POST['name']['lname']);
        $_SESSION['student_id'] = $_POST['student_id'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['email']['address'] = trim($_POST['email']['address']);
        $_SESSION['email']['host'] = trim($_POST['email']['host']);
        $_SESSION['email']['site'] = trim($_POST['email']['site']);
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['phone']['first_digit_group'] = trim($_POST['phone']['first_digit_group']);
        $_SESSION['phone']['second_digit_group'] = trim($_POST['phone']['second_digit_group']);
        $_SESSION['phone']['third_digit_group'] = trim($_POST['phone']['third_digit_group']);

        if (empty($_SESSION['slot_id'])) {
            echo "<script>alert('Invalid timeframe. Must select valid start time.')</script>";
            return false;
        }

        if (strlen($_SESSION['project_title']) < 1 || strlen($_SESSION['project_title']) > 50) {
            echo "<script>alert('Invalid project title. Must contain 1-50 characters')</script>";
            return false;
        }

        if (strlen($_SESSION['name']['fname']) < 1 || strlen($_SESSION['name']['lname']) < 1 || strlen($_SESSION['name']['fname']) > 30 || strlen($_SESSION['name']['lname']) > 30) {
            echo "<script>alert('Invalid name. First and last name must contain 1-30 letters.')</script>";
            return false;
        }

        if (strlen($_SESSION['student_id']) != 8) {
            echo "<script>alert('Invalid student id. Must be 8 digits.')</script>";
            return false;
        }

        if (strlen($_SESSION['email']['address']) < 1 || strlen($_SESSION['email']['host']) < 1 || strlen($_SESSION['email']['site']) < 1 
            || strlen($_SESSION['email']['domain']) > 40 || strlen($_SESSION['email']['domain']) > 19 || strlen($_SESSION['email']['domain']) > 19) {
            echo "<script>alert('Invalid email. Address must contain 1-40 alphanumeric characters, host must contain 1-19 alphanumeric characters, and site must contain 1-19 alphanumeric characters.')</script>";
            return false;
        }

        if (strlen($_SESSION['phone']['first_digit_group']) != 3 || strlen($_SESSION['phone']['second_digit_group']) != 3 || strlen($_SESSION['phone']['third_digit_group']) != 4) {
            echo "<script>alert('Invalid phone number. First group must be 3 digits, second group must be 3 digits, and last group must be 4 digits.')</script>";
            return false;
        }

        return true;
    }

    function submit_form() {
        $slot_id = $_SESSION['slot_id'];
        $project_title = $_SESSION['project_title'];
        $name = $_SESSION['name'];
        $fname = $name['fname'];
        $lname = $name['lname'];
        $student_id = $_SESSION['student_id'];
        $email = $_SESSION['email'];
        $email_concat = $email['address'] . "@" . $email['host'] . "." . $email['site'];
        $phone = $_SESSION['phone'];
        $phone_concat = $phone['first_digit_group'] . "-" . $phone['second_digit_group'] . "-" . $phone['third_digit_group'];

        $conn = $_SESSION['conn'];

        $sql = "INSERT INTO studentprojects VALUES (?, '?', '?', '?', '?', '?', DEFAULT);";
        $types = "isssss";
        $conn->execute_prepared_stmt($sql, $types, $student_id, $fname, $lname, $email_concat, $phone_concat, $project_title);
        
        $sql = "INSERT INTO registration VALUES (DEFAULT, ?, ?);";
        $types = "ii";
        $conn->execute_prepared_stmt($sql, $types, $student_id, $slot_id);

        $sql = "UPDATE timeframes SET available_seats = available_seats - 1 WHERE slot_id = ?";
        $types = "i";
        $conn->execute_prepared_stmt($sql, $types, $slot_id);
        
        // route back to index.php
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
        else {
            echo "Unknown error. Return to homepage to continue.";
        }
    }

    function edit_form() {
        $new_slot_id = $_SESSION['slot_id'];
        $project_title = $_SESSION['project_title'];
        $name = $_SESSION['name'];
        $fname = $name['fname'];
        $lname = $name['lname'];
        $student_id = $_SESSION['student_id'];
        $email = $_SESSION['email'];
        $email_concat = $email['address'] . "@" . $email['host'] . "." . $email['site'];
        $phone = $_SESSION['phone'];
        $phone_concat = $phone['first_digit_group'] . "-" . $phone['second_digit_group'] . "-" . $phone['third_digit_group'];

        $conn = $_SESSION['conn'];

        $sql = "UPDATE studentprojects SET first_name=?, last_name=?, email=?, phone_number=?, project_title=?, registration_time=DEFAULT WHERE student_id=?;";
        $types = "sssssi";
        $conn->execute_prepared_stmt($sql, $types, $fname, $lname, $email_concat, $phone_concat, $project_title, $student_id);

        $sql = "UPDATE timeframes SET available_seats=available_seats+1 WHERE slot_id=(SELECT slot_id FROM registration WHERE student_id=?);";
        $types = "i";
        $conn->execute_prepared_stmt($sql, $types, $student_id);

        $sql = "UPDATE registration SET slot_id=? WHERE student_id=?;";
        $types = "ii";
        $conn->execute_prepared_stmt($sql, $types, $new_slot_id, $student_id);

        $sql = "UPDATE timeframes SET available_seats=available_seats-1 WHERE slot_id=?";
        $types = "i";
        $conn->execute_prepared_stmt($sql, $types, $new_slot_id);
        
        // route back to index.php
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
        else {
            echo "Unknown error. Return to homepage to continue.";
        }
    }

    function generate_project_div($data) {
        echo 
        '<div class="calendar__registered-timeslot">
            <h2>' . $data['lname'] . '</h2>
            <div class="popup">
                <table class="popup__table">
                    <tr>
                        <th colspan="2">' . $data['project_title'] . '</th>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <td>' . date_format(new DateTime($data['timeframe']), 'm-d-y g:i A') . '</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>' . $data['name'] . '</td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td>' . $data['student_id'] . '</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>' . $data['email'] . '</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>' . $data['phone'] . '</td>
                    </tr>
                </table>
            </div>
        </div>';
    }

    function retrieve_student_data() {
        $conn = $_SESSION['conn'];
        $results = array();
        foreach(range(0, 5) as $i) {
            $sql = 
            "SELECT s.student_id, s.first_name, s.last_name, s.email, s.phone_number, s.project_title, t.date_time
                FROM studentprojects AS s
                INNER JOIN registration r
                ON s.student_id=r.student_id
                INNER JOIN timeframes t
                ON r.slot_id=t.slot_id
                WHERE r.slot_id = $i + 1
                ORDER BY s.registration_time ASC;";

            $res = $conn->execute_stmt($sql);
            $results[$i] = array();
            
            $j = 0;
            while ($row = mysqli_fetch_row($res)) {
                $results[$i][$j]['student_id'] = $row[0];
                $results[$i][$j]['name'] = $row[1] . " " . $row[2];
                $results[$i][$j]['lname'] = $row[2];
                $results[$i][$j]['email'] = $row[3];
                $results[$i][$j]['phone'] = $row[4];
                $results[$i][$j]['project_title'] = $row[5];
                $results[$i][$j]['timeframe'] = $row[6];
                $j++;
            }
        }

        return $results;
    }
    
    // "main"
    session_start();

    $conn = new DB_Handler;
    $_SESSION['conn'] = $conn;
    
    $timeframes_results = $conn->execute_stmt("SELECT date_time, available_seats FROM timeframes");
    $student_project_results = retrieve_student_data();

    // form submission function
    if(isset($_POST['student_id'])) {
        echo "<script>console.log('0');</script>";
        if (!set_student_data()) return;
        echo "<script>console.log('1');</script>";
        $student_id = $_SESSION['student_id'];
        $conn = $_SESSION['conn'];
        echo "<script>console.log('2');</script>";
        $sql = "SELECT student_id FROM studentprojects WHERE student_id = ?;";
        $types = "i";
        echo "<script>console.log('3');</script>";
        $res = $conn->execute_prepared_stmt($sql, $types, $student_id);
        
        $resCount = mysqli_num_rows($res);
        
        
        if ($resCount > 0) {
            header("Location: update_registration.php");
        }
        else submit_form();
        
    }
?>