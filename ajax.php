<?php

function connectDB()
{
    $servername = "localhost:3308";
    $username = "root";
    $password = "12345678";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ajax_php", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        // echo "Connected successfully";
    } catch (PDOException $e) {
        return  "Connection failed: " . $e->getMessage();
    }
}

$conn = connectDB();

$entityBody = file_get_contents('php://input');
$databody = json_decode($entityBody);

if (isset($databody)) {
    if (isset($databody->name)) {

        // try {
        //     $username = $databody->name;
        //     $password = $databody->password;

        //     $sql = "INSERT INTO form_data (id, username, user_password) VALUES (0, '$username', '$password')";

        //     $conn->exec($sql);
        // } catch (PDOException $e) {
        //     echo $sql . "<br>" . $e->getMessage();
        // }

        echo json_encode($databody, JSON_PRETTY_PRINT);
    }
}
