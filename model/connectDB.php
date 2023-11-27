<?php

function connectDB()
{
    $servername = "localhost:3308";
    $username = "root";
    $password = "12345678";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=mpa_db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        // echo "Connected successfully";
    } catch (PDOException $e) {
        return  "Connection failed: " . $e->getMessage();
    }
}
?>