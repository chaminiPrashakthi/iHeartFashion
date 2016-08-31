
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

        $sql = "SELECT name FROM products";
        $result = $conn->query($sql);
        $a = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $a[] =  $row["name"];
            }
        } else {
            $name = "Unknown User";
        }

        
// get the q parameter from URL
$q = $_REQUEST["q"];
//
$hint = "";
//
// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "No suggestion" : $hint;
?>

