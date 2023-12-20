<?php 
    $serverName = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'to-do';

    $conn = mysqli_connect($serverName, $username, $password, $database);
    
    if (!$conn) {
        die('Failed DB ' . mysqli_connect_error());
    } else {
        // echo "Successfully";
    }
?>