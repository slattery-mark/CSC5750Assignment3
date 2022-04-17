<?php
    // connect to database
    $conn = require 'src/connect_to_db.php';

    // query for timeframes
    $timeframes_query = "SELECT date_time, available_seats FROM timeframes";
    $timeframes_results = mysqli_query($conn, $timeframes_query);
    
    // query for student projects
    $student_project_results = require 'src/retrieve_student_projects.php';
    
    // place registered students on calendar
    include 'src/generate_project_div.php';   
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/head.php'); ?>

<body>
    <div class="schedule-pane">
        <table class="calendar">
            <tr>
                <th>Start Time</th>
                <th>April 28</th>
                <th>April 29</th>
            </tr>
            <tr>
                <th rowspan="6">6:00 - 7:00</th>
                <td><?php if (count($student_project_results[0]) > 0) generate_project_div($student_project_results[0][0]); ?></td>
                <td><?php if (count($student_project_results[4]) > 0) generate_project_div($student_project_results[4][0]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 1) generate_project_div($student_project_results[0][1]); ?></td>
                <td><?php if (count($student_project_results[4]) > 1) generate_project_div($student_project_results[4][1]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 2) generate_project_div($student_project_results[0][2]); ?></td>
                <td><?php if (count($student_project_results[4]) > 2) generate_project_div($student_project_results[4][2]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 3) generate_project_div($student_project_results[0][3]); ?></td>
                <td><?php if (count($student_project_results[4]) > 3) generate_project_div($student_project_results[4][3]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 4) generate_project_div($student_project_results[0][4]); ?></td>
                <td><?php if (count($student_project_results[4]) > 4) generate_project_div($student_project_results[4][4]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 5) generate_project_div($student_project_results[0][5]); ?></td>
                <td><?php if (count($student_project_results[4]) > 5) generate_project_div($student_project_results[4][5]); ?></td>
            </tr>
            <tr>
                <th rowspan="6">7:00 - 8:00</th>
                <td><?php if (count($student_project_results[1]) > 0) generate_project_div($student_project_results[1][0]); ?></td>
                <td><?php if (count($student_project_results[5]) > 0) generate_project_div($student_project_results[5][0]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 1) generate_project_div($student_project_results[1][1]); ?></td>
                <td><?php if (count($student_project_results[5]) > 1) generate_project_div($student_project_results[5][1]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 2) generate_project_div($student_project_results[1][2]); ?></td>
                <td><?php if (count($student_project_results[5]) > 2) generate_project_div($student_project_results[5][2]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 3) generate_project_div($student_project_results[1][3]); ?></td>
                <td><?php if (count($student_project_results[5]) > 3) generate_project_div($student_project_results[5][3]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 4) generate_project_div($student_project_results[1][4]); ?></td>
                <td><?php if (count($student_project_results[5]) > 4) generate_project_div($student_project_results[5][4]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 5) generate_project_div($student_project_results[1][5]); ?></td>
                <td><?php if (count($student_project_results[5]) > 5) generate_project_div($student_project_results[5][5]); ?></td>
            </tr>
            <tr>
                <th rowspan="6">8:00 - 9:00</th>
                <td><?php if (count($student_project_results[3]) > 0) generate_project_div($student_project_results[3][0]); ?></td>
                <td><?php if (count($student_project_results[5]) > 0) generate_project_div($student_project_results[5][0]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[3]) > 1) generate_project_div($student_project_results[3][1]); ?></td>
                <td><?php if (count($student_project_results[5]) > 1) generate_project_div($student_project_results[5][1]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[3]) > 2) generate_project_div($student_project_results[3][2]); ?></td>
                <td><?php if (count($student_project_results[5]) > 2) generate_project_div($student_project_results[5][2]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[3]) > 3) generate_project_div($student_project_results[3][3]); ?></td>
                <td><?php if (count($student_project_results[5]) > 3) generate_project_div($student_project_results[5][3]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[3]) > 4) generate_project_div($student_project_results[3][4]); ?></td>
                <td><?php if (count($student_project_results[5]) > 4) generate_project_div($student_project_results[5][4]); ?></td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[3]) > 5) generate_project_div($student_project_results[3][5]); ?></td>
                <td><?php if (count($student_project_results[5]) > 5) generate_project_div($student_project_results[5][5]); ?></td>
            </tr>
        </table>
    </div>
    <div class="registration-pane">
        <form class="registration-form" action="src/check_duplicate.php" method="post">
            <h1>Register</h1>
            <fieldset>
                <label for="start_time">Start Time</label>
                <select id="start_time" name="start_time">
                    <?php
                        $i = 0;
                        foreach($timeframes_results as $timeframe) { 
                            $i++;
                            if ($timeframe['available_seats'] > 0) {
                                $date = date_create($timeframe['date_time']);
                                echo '<option value="' . $i . '">';
                                echo date_format($date, 'm-d-Y g:i A') . ' (' . $timeframe['available_seats'] . ' seats remaining)';
                                echo '</option>';
                            }
                        }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label for="project-title">Project Title</label>
                <input type="text" id="project-title" name="project_title" placeholder="Title" required>
            </fieldset>
            <fieldset>
                <label for="name">Name</label>
                <input type="text" id="fname" name="name[fname]" placeholder="First Name" required>
                <input type="text" id="lname" name="name[lname]" placeholder="Last Name" required>
            </fieldset>
            <fieldset>
                <label for="student-id">Student ID</label>
                <input type="text" id="student-id" name="student_id" placeholder="###" required>
            </fieldset>
            <fieldset>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email" required>
            </fieldset>
            <fieldset>
                <label for="phone">Phone</label>
                <input type="text" id="first-digit-group" name="phone[first_digit_group]" placeholder="###" required>
                <input type="text" id="second-digit-group" name="phone[second_digit_group]" placeholder="###" required>
                <input type="text" id="third-digit-group" name="phone[third_digit_group]" placeholder="####" required>
            </fieldset>
            <button type="submit" id="registration-form__submit-btn">Submit</button>
        </form>
    </div>
</body>

</html>