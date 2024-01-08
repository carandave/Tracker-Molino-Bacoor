<?php 

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
}

if($_SESSION['noUpdate'] == 0){
	header("Location: dashboard.php");
}

include "config.php";

if(isset($_POST['checking_viewbtn'])){
    $s_id = $_POST['student_id'];
    // echo $return = $s_id;

    $query = "SELECT * FROM report WHERE id = '$s_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            echo $return = $row['summary'];
        }
    }
    else{
        echo "No record found";
    }


    
    }

?>