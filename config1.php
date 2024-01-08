<?php 
// define('DB_HOST', 'localhost'); 
// define('DB_USERNAME', 'u253572484_itrackerroot'); 
// define('DB_PASSWORD', '&?S#s$4;m9Qy'); 
// define('DB_NAME', 'u253572484_itrackerdb');

define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'u253572484_itrackerdb');



define('GOOGLE_MAP_API_KEY', 'AIzaSyBmGsyPvOzqeIlUixbOvhAROQzhoSRcSuo');

//ESP32_API_KEY is the exact duplicate of, ESP32_API_KEY in ESP32 sketch file
//Both values must be same
define('ESP32_API_KEY', 'Ad5F10jkBM0');

//http://www.example.com/gpsdata.php
define('POST_DATA_URL', 'https://itrackermolino.online/gpsdata.php');
// define('POST_DATA_URL', 'http://localhost/thesis/gps/gpsdata.php');

date_default_timezone_set('Asia/Manila');

// Connect with the database 
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
 
// Display error if failed to connect 	
if ($db->connect_errno) { 
    echo "Connection to database is failed: ".$db->connect_error;
    exit();
}