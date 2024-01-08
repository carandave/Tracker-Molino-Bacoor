	<?php
session_start();
require 'config.php';



if(isset($_POST['Update']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    $query = "UPDATE resident SET fname='$fname', lname='$lname', address='$address', city='$city', province='$province', contact='$contact' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Resident Updated Successfully";
        header("Location: registerednumber.php");
        exit(0);
    }
    else
    {$_SESSION['message'] = "Resident Not Updated";
        header("Location: registerednumber.php");
        exit(0);
    }

}


?>