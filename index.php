<?php
    // connect to database
    $conn = require 'scripts/connect_to_db.php';

    // query for timeframes
    $timeframes_query = "SELECT date_time, available_seats FROM timeframes";
    $timeframes_results = mysqli_query($conn, $timeframes_query);
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
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th rowspan="6">7:00 - 8:00</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th rowspan="6">8:00 - 9:00</th>
                <td>
                    <div class="calendar__registered-timeslot">
                        Student Name
                        <div class="popup">
                            <table class="popup__table">
                                <tr>
                                    <th colspan="2">Project Title</th>
                                </tr>
                                <tr>
                                    <th>Start Time</th>
                                    <td>4/28/22 6:00 - 7:00pm</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>Student Name</td>
                                </tr>
                                <tr>
                                    <th>Student ID</th>
                                    <td>12345</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>email@email.com</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>555-555-5555</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="registration-pane">
        <form class="registration-form" action="scripts/check_duplicate.php" method="post">
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