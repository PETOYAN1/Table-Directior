<?php
define('DB_HOST','localhost'); 
define('DB_USER','root'); 
define('DB_PASS',''); 
define('DB_NAME','to-do'); 
    try {
        $database = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
    }
    catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>