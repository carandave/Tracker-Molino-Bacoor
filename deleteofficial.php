<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "<div class='form-after'>
                  <h3>Successfully Deleted</h3><br/>
                  <p class='link'>Click here to <a href='officiallist.php'>View Changes</a></p>
                  </div>";
            
        // $sql = "ALTER TABLE resident AUTO_INCREMENT = '$user_id'";
        // $result = $conn->mysqli_query($sql);

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;
        
    }

} 

    // $row2 = $result2->fetch_assoc();



    // if($row2['position'] != "Executive Officer"){
    //     header("Location: officiallist.php");
    // }
    // elseif($row2['position'] == "Executive Officer"){
    //     // header("Location: addOfficial.php");
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Report</title>
</head>

<style>
    *{
        margin: 0;
        padding: 0;  
        font-family: 'Poppins', sans-serif; 
    }

    body{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color:#E3F1FF;
    }

    .form-after{
        background-color: white;
        height: 200px;
        width: 350px; 
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 30px;
        color: black;
        box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
    -webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
    -moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
    }

    .form-after h3{
        color: black;
        font-size: 24px;
    }
</style>

<body>
    
</body>
</html>