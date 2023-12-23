<?php 
    $serverName = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'to-do';

    $conn = mysqli_connect($serverName, $username, $password, $dbname);
    
    if (!$conn) {
        die('Failed DB ' . mysqli_connect_error());
    } else {
        // echo "Successfully";
    }
?>