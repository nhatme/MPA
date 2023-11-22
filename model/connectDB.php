
<?php
$servername = "localhost:3308";
$username = "root";
$password = "Nhatp@20";

try {
    $conn = new PDO("mysql:host=$servername;dbname=mpa_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>