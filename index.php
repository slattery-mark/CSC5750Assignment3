<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'templates/head.php'; ?>
    <?php require_once 'src/data_layer.php'; ?>
    <link rel="stylesheet" href="styles/main.css">
</head>

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
                <td><?php if (count($student_project_results[0]) > 0) generate_project_div($student_project_results[0][0]); ?>
                </td>
                <td><?php if (count($student_project_results[3]) > 0) generate_project_div($student_project_results[3][0]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 1) generate_project_div($student_project_results[0][1]); ?>
                </td>
                <td><?php if (count($student_project_results[3]) > 1) generate_project_div($student_project_results[3][1]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 2) generate_project_div($student_project_results[0][2]); ?>
                </td>
                <td><?php if (count($student_project_results[3]) > 2) generate_project_div($student_project_results[3][2]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 3) generate_project_div($student_project_results[0][3]); ?>
                </td>
                <td><?php if (count($student_project_results[3]) > 3) generate_project_div($student_project_results[3][3]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 4) generate_project_div($student_project_results[0][4]); ?>
                </td>
                <td><?php if (count($student_project_results[3]) > 4) generate_project_div($student_project_results[3][4]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[0]) > 5) generate_project_div($student_project_results[0][5]); ?>
                </td>
                <td><?php if (count($student_project_results[3]) > 5) generate_project_div($student_project_results[3][5]); ?>
                </td>
            </tr>
            <tr>
                <th rowspan="6">7:00 - 8:00</th>
                <td><?php if (count($student_project_results[1]) > 0) generate_project_div($student_project_results[1][0]); ?>
                </td>
                <td><?php if (count($student_project_results[4]) > 0) generate_project_div($student_project_results[4][0]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 1) generate_project_div($student_project_results[1][1]); ?>
                </td>
                <td><?php if (count($student_project_results[4]) > 1) generate_project_div($student_project_results[4][1]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 2) generate_project_div($student_project_results[1][2]); ?>
                </td>
                <td><?php if (count($student_project_results[4]) > 2) generate_project_div($student_project_results[4][2]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 3) generate_project_div($student_project_results[1][3]); ?>
                </td>
                <td><?php if (count($student_project_results[4]) > 3) generate_project_div($student_project_results[4][3]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 4) generate_project_div($student_project_results[1][4]); ?>
                </td>
                <td><?php if (count($student_project_results[4]) > 4) generate_project_div($student_project_results[4][4]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[1]) > 5) generate_project_div($student_project_results[1][5]); ?>
                </td>
                <td><?php if (count($student_project_results[4]) > 5) generate_project_div($student_project_results[4][5]); ?>
                </td>
            </tr>
            <tr>
                <th rowspan="6">8:00 - 9:00</th>
                <td><?php if (count($student_project_results[2]) > 0) generate_project_div($student_project_results[2][0]); ?>
                </td>
                <td><?php if (count($student_project_results[5]) > 0) generate_project_div($student_project_results[5][0]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[2]) > 1) generate_project_div($student_project_results[2][1]); ?>
                </td>
                <td><?php if (count($student_project_results[5]) > 1) generate_project_div($student_project_results[5][1]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[2]) > 2) generate_project_div($student_project_results[2][2]); ?>
                </td>
                <td><?php if (count($student_project_results[5]) > 2) generate_project_div($student_project_results[5][2]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[2]) > 3) generate_project_div($student_project_results[2][3]); ?>
                </td>
                <td><?php if (count($student_project_results[5]) > 3) generate_project_div($student_project_results[5][3]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[2]) > 4) generate_project_div($student_project_results[2][4]); ?>
                </td>
                <td><?php if (count($student_project_results[5]) > 4) generate_project_div($student_project_results[5][4]); ?>
                </td>
            </tr>
            <tr>
                <td><?php if (count($student_project_results[2]) > 5) generate_project_div($student_project_results[2][5]); ?>
                </td>
                <td><?php if (count($student_project_results[5]) > 5) generate_project_div($student_project_results[5][5]); ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="registration-pane">
        <form class="registration-form validated-form" method="post">
            <h1>Register</h1>
            <fieldset class="content-box">
                <label for="start_time">Start Time</label>
                <select id="start_time" name="slot_id" required>
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
            <fieldset class="content-box">
                <label for="project-title">Project Title</label>
                <input type="text" id="project-title" name="project_title" placeholder="Title"
                    value="<?php if (!empty($_SESSION['project_title'])) echo $_SESSION['project_title']; ?>"
                    maxlength=50 title="Must contain 1-50 characters" required>
            </fieldset>
            <fieldset class="content-box">
                <label for="name">Name</label>
                <input type="text" id="fname" name="name[fname]" placeholder="First Name"
                    value="<?php if (!empty($_SESSION['name']['fname'])) echo $_SESSION['name']['fname']; ?>"
                    maxlength=30 pattern="^[A-Za-z]+$" title="Must contain 1-30 letters." required>
                <input type="text" id="lname" name="name[lname]" placeholder="Last Name"
                    value="<?php if (!empty($_SESSION['name']['lname'])) echo $_SESSION['name']['lname']; ?>"
                    maxlength=30 pattern="^[A-Za-z]+$" title="Must contain 1-30 letters." required>
            </fieldset>
            <fieldset class="content-box">
                <label for="student-id">Student ID</label>
                <input type="text" id="student-id" name="student_id" placeholder="#########"
                    value="<?php if (!empty($_SESSION['student_id'])) echo $_SESSION['student_id']; ?>" minlength=8
                    maxlength=8 pattern="^[0-9]+$" title="Must be 8 digits.">
            </fieldset>
            <fieldset class="content-box">
                <label for="email">Email</label>
                <input type="text" id="email-address" name="email[address]" placeholder="address"
                    value="<?php if (!empty($_SESSION['email']['address'])) echo $_SESSION['email']['address']; ?>"
                    maxlength=40 title="Must contain 1-40 alphanumeric characters." required>
                <p>@</p>
                <input type="text" id="email-host" name="email[host]" placeholder="host"
                    value="<?php if (!empty($_SESSION['email']['host'])) echo $_SESSION['email']['host']; ?>"
                    maxlength=19 title="Must contain 1-19 alphanumeric characters." required>
                <p>.</p>
                <input type="text" id="email-site" name="email[site]" placeholder="site"
                    value="<?php if (!empty($_SESSION['email']['site'])) echo $_SESSION['email']['site']; ?>"
                    maxlength=19 title="Must contain 1-19 alphanumeric characters." required>
            </fieldset>
            <fieldset class="content-box">
                <label for="phone">Phone</label>
                <input type="text" id="first-digit-group" name="phone[first_digit_group]" placeholder="###"
                    value="<?php if (!empty($_SESSION['phone']['first_digit_group'])) echo $_SESSION['phone']['first_digit_group']; ?>"
                    minlength=3 maxlength=3 pattern="^[0-9]+$" title="Must be 3 digits." required>
                <p>-</p>
                <input type="text" id="second-digit-group" name="phone[second_digit_group]" placeholder="###"
                    value="<?php if (!empty($_SESSION['phone']['second_digit_group'])) echo $_SESSION['phone']['second_digit_group']; ?>"
                    minlength=3 maxlength=3 pattern="^[0-9]+$" title="Must be 3 digits">
                <p>-</p>
                <input type="text" id="third-digit-group" name="phone[third_digit_group]" placeholder="####"
                    value="<?php if (!empty($_SESSION['phone']['third_digit_group'])) echo $_SESSION['phone']['third_digit_group']; ?>"
                    minlength=4 maxlength=4 pattern="^[0-9]+$" title="Must be 4 digits." required>
            </fieldset>
            <button type="submit" id="registration-form__submit-btn">Submit</button>
        </form>
    </div>

    <script src="scripts/formvalidator.js"></script>
    <script src="scripts/formvalidation.js"></script>
</body>

</html>