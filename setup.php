<?php

    // Instruction Create Database

    $createDb = file_get_contents('SQL_connect/data.sql');
    $serverName = 'localhost';
    $username = 'root';
    $password = '';

    $conn = mysqli_connect($serverName, $username, $password);
    $sql = mysqli_multi_query($conn, $createDb);
    
    if (!$conn) {
        die('Error DB ' . mysqli_connect_error());
    } else {
        header('location: signin/director.php');
    }
?>
