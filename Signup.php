<?php

$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$tel = $_REQUEST["tel"];
$address = $_REQUEST["address"];
$city = $_REQUEST["city"];
$province = $_REQUEST["province"];
$answer = $_REQUEST["answer"];
$email = $_REQUEST["email"];
$pw1 = $_REQUEST["pw1"];
$pw2 = $_REQUEST["pw2"];
$que = $_REQUEST["question"];
$ans = $_REQUEST["answer"];
$captcha = $_REQUEST["captcha"];

if (isset($gender)) {
    echo $gender;
}

echo $que;
echo $ans;

$host = "localhost";
$port = "3308";
$user = "root";
$password = "1234";
$database = "mydb";

$conn = new mysqli($host, $user, $password, $database, $port, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (f_name, l_name, tel, address, city, province, user_type_iduser_type, system_status_idsystem_status1)
VALUES ('$fname', '$lname', $tel, '$address', '$city', '$province', 2, 1)";

if ($conn->query($sql) === TRUE) {

        $uid =   $conn->insert_id;

    $sql2 = "INSERT INTO user_login (username, password, security_question, answer, user_user_id)
    VALUES ('$email', '$password', '$que', '$ans', $uid)";

    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error1: " . $sql2 . "<br>" . $conn->error;
    }
} else {
    echo "Error2: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>