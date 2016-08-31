<?php

$name = $_REQUEST["name"];
$colour = $_REQUEST["colour"];
$quantity = $_REQUEST["quantity"];
$price = $_REQUEST["price"];
$occasion = $_REQUEST["occasion"];
$material = $_REQUEST["material"];
$size = $_REQUEST["size"];
$typet = $_REQUEST["type"];

if ($typet == 'Hand_Bags') {
    $type = 2;
}

if ($typet == 'Shoes') {
    $type = 1;
}

$host = "localhost";
$port = "3308";
$user = "root";
$password = "1234";
$database = "mydb";

// Create connection
$conn = new mysqli($host, $user, $password, $database, $port, $port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "update products set name = '$name', colour = '$colour', quantity = $quantity, unit_price = '$price', occassion = '$occasion', material = '$material', size = '$size', product_type_idproduct_type = '$type'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>