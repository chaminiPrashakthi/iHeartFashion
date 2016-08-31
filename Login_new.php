<?php

$usern = $_POST["username"];
$pass = $_POST["pass"];

$host = "localhost";
$port = "3308";
$user = "root";
$password = "1234";
$database = "mydb";

$conn = new mysqli($host, $user, $password, $database, $port, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM user_login WHERE username = '$usern'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["username"] == $usern && $row["password"] == $pass) {
            $date = date("Y-m-d h:i:sa");
            $name = $row["username"];
//
            $sql2 = "INSERT INTO login_session (in_time, out_time, user_login_username)
            VALUES ('$date', '$date', '$name')";

            if ($conn->query($sql2) === TRUE) {
                include("Buyer_Home.php");
            } else {
                echo "<script>
             alert('Username or Password is incorrect'); 
             window.history.go(-1);
     </script>";
            }
        } else {
            echo "<script>
             alert('Username or Password is incorrect'); 
             window.history.go(-1);
     </script>";
        }
    }
} else {
    echo "<script>
             alert('Username or Password is incorrect'); 
             window.history.go(-1);
     </script>";
}
?>