<?php

$servername = "localhost";

$username = "u253572484_Itracker"; 

$password = "Bessywaps.1"; 

$dbname = "u253572484_Itracker"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?> 