<?php

// Grab User submitted information
$email = $_GET["username"];
$pass = $_GET["pass"];


// Connect to the database
$con = mysql_connect("localhost","root","");
// Make sure we connected succesfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysql_select_db("mydb",$con);

$result = mysql_query("SELECT username, password FROM users WHERE username = $email");

$row = mysql_fetch_array($result);

if($row["username"]==$email && $row["password"]==$pass){
	header('Location: home.php?user=' . $email);
    
}
else if ($row["username"]==$email && $row["password"]!=$pass){
	header('Location: Login.php?userp=' . $email);
	
	}
else{
	header('Location: Login.php?usera=' . $email);
   
	}
?>