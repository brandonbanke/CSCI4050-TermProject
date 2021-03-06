<?php

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
       $conn = new PDO("mysql:host:localhost", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $state = "CREATE DATABASE IF NOT EXISTS cinema_booking";
       $conn->exec($state); 
    } catch (PDOException $e) {
        $error_message = $e->getMessage(); 
    }
    $conn = null; 

    $dsn = "mysql:host:localhost;dbname=cinema_booking";
    
    try {
        $db = new PDO($dsn, $username, $password);
        $use = "USE cinema_booking";
        $db->exec($use);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
    }

?>