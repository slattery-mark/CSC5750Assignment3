<?php
    // connect to DB
    // credentials
    $hostname = 'localhost';
    $username = 'mark';
    $password = '1234';
    $database = 'CSC5750Assignment3';
    try {
        $conn = mysqli_connect($hostname, $username, $password, $database);
    } 
    catch (Exception $e) {
        echo nl2br("Connection error:\n" . $e);
    }

    return $conn;
?>