<?php

$host = "localhost";
$port = "3308";
$user = "root";
$password = "1234";
$database = "mydb";

$conn = new mysqli($host, $user, $password, $database, $port, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_POST["id"] == 'input-32') {
    $username = $_POST["value"];
    $sql = "SELECT * FROM user_login WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "1";
    } else {
        echo "2";
    }
} else if ($_POST["id"] != 'input-32') {
    $password = $_POST["value"];

    $sql = "SELECT * FROM user_login WHERE password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "3";
    } else {
        echo "4";
    }
}
?>
