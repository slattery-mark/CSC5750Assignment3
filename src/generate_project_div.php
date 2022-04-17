<?php 
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
?>