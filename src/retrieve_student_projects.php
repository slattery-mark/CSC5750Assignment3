<?php
    function retrieve_student_data() {
        $sql = "";
        foreach(range(1, 6) as $i) {
            $sql .= 
                "SELECT s.student_id, s.first_name, s.last_name, s.email, s.phone_number, s.project_title, t.date_time
                FROM studentprojects AS s
                INNER JOIN registration r
                ON s.student_id=r.student_id
                INNER JOIN timeframes t
                ON r.slot_id=t.slot_id
                WHERE r.slot_id = $i
                ORDER BY s.registration_time ASC;";
        }
        $conn = require 'connect_to_db.php';
        
        $i = 0;
        $results = array();
        if (mysqli_multi_query($conn, $sql)) {
            do {
                if ($result = mysqli_store_result($conn)) {
                    $results[$i] = array();
                    $j = 0;
                    while ($row = mysqli_fetch_row($result)) {
                        $results[$i][$j]['student_id'] = $row[0];
                        $results[$i][$j]['name'] = $row[1] . " " . $row[2];
                        $results[$i][$j]['email'] = $row[3];
                        $results[$i][$j]['phone'] = $row[4];
                        $results[$i][$j]['project_title'] = $row[5];
                        $results[$i][$j]['timeframe'] = $row[6];
                        $j++;
                    }
                    mysqli_free_result($result);
                    $i++;
                }
            } while (mysqli_next_result($conn));
        }
        mysqli_close($conn);
        return $results;
    }

    return retrieve_student_data();
?>