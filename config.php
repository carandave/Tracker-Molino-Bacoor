<?php

// $servername = "localhost";
// $username = "u253572484_itrackerroot"; 
// $password = "&?S#s$4;m9Qy"; 
// $dbname = "u253572484_itrackerdb"; 

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "u253572484_itrackerdb"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?> 