<?php
    class Database {   
        private $conn;

        private function connect() {
            try {
                $this->conn = mysqli_connect('localhost', 'mark', '1234', 'CSC5750Assignment3');
            }
            catch (Exception $e) {
                echo nl2br("Connection error:\n" . $e);
            }
        }

        public function execute_prepared_stmt(string $sql, string $types, mixed &...$params) {
            $this->connect();

            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            mysqli_close($this->conn);

            return $res;
        }

        public function execute_stmt(string $stmt) {
            $this->connect();
            
            $res = mysqli_query($this->conn, $stmt);
            mysqli_close($this->conn);
            
            return $res;
        }
    }

    function submit_form() {
        $slot_id = $_POST['start_time'];
        $project_title = $_POST['project_title'];
        $name = $_POST['name'];
        $fname = $name['fname'];
        $lname = $name['lname'];
        $student_id = $_POST['student_id'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $phone_concat = "(" . $phone['first_digit_group'] . ")-" . $phone['second_digit_group'] . "-" . $phone['third_digit_group'];

        $db = $_SESSION['db'];

        $sql = "INSERT INTO studentprojects VALUES (?, ?, ?, ?, ?, ?, DEFAULT);";
        $types = "isssss";
        $db->execute_prepared_stmt($sql, $types, $student_id, $fname, $lname, $email, $phone_concat, $project_title);
        
        $sql = "INSERT INTO registration VALUES (DEFAULT, ?, ?);";
        $types = "ii";
        $db->execute_prepared_stmt($sql, $types, $student_id, $slot_id);

        $sql = "UPDATE timeframes SET available_seats = available_seats - 1 WHERE slot_id = ?";
        $types = "i";
        $db->execute_prepared_stmt($sql, $types, $slot_id);
        
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
            ' . $data['name'] . '
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
    
    // main
    session_start();

    $db = new Database;
    $_SESSION['db'] = $db;
    
    $timeframes_results = $db->execute_stmt("SELECT date_time, available_seats FROM timeframes");
    $student_project_results = require 'retrieve_student_projects.php';

    if(isset($_POST['student_id'])) {

        
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
        else submit_form();
    }
?>