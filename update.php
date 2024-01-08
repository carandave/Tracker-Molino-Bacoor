<?php 
session_start();
if(!isset($_SESSION['username']) )
{
    header("Location: index.php");
}

include "config.php";

    

    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];

        $user_id = $_POST['user_id'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];

        $noUpdate = 1;

        // $password = md5($_POST['password']);

        $newpassword = md5($_POST['newpassword']);
        $connewpassword = md5($_POST['connewpassword']);

        if($newpassword == $connewpassword){
            $sql = "UPDATE `users` SET `fname`='$firstname',`lname`='$lastname',`email`='$email',`password`='$newpassword', `noUpdate` = '$noUpdate' WHERE `id`='$user_id'"; 

            $result = $conn->query($sql); 

            if ($result == TRUE) {

                echo '<script> alert("Record Updated Successfully!")</script>';
                header("Location: dashboard.php?true=$user_id");

            }else{

                echo "Error:" . $sql . "<br>" . $conn->error;

            }
        }

        else{
            echo "Error Not Match";
        }



        // $sql = "UPDATE `users` SET `fname`='$firstname',`lname`='$lastname',`email`='$email',`password`='$password'WHERE `id`='$user_id'"; 

        // $result = $conn->query($sql); 

        // if ($result == TRUE) {

        //     echo '<script> alert("Record Updated Successfully!")</script>';
        //     header("Location: dashboard.php?true=$user_id");

        // }else{

        //     echo "Error:" . $sql . "<br>" . $conn->error;

        // }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['fname'];

            $lastname = $row['lname'];

            $email = $row['email'];

            $password  = $row['password'];
            // $password = md5($password);

  

            $id = $row['id'];

        } 

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Update</title>
        <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    </head>
    <body style="background-color:#E3F1FF">
        
        <form action="" method="POST">
        <h1 class="text-center h2 mb-4">Profile</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="firstname" value="<?php echo $first_name; ?>"> 
                <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>"> 
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>"> 
            </div>
            
            <div class="form-group">
                <input type="password" class="form-control" name="newpassword" placeholder="New Password" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="connewpassword" placeholder="Confirm New Password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
            <a href="dashboard.php" class="btn btn-danger btn-block">Back</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>

        <!-- <h2>Admin Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            First name:<br>

            <input type="text" name="firstname" value="<?php echo $first_name; ?>">

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <br>

            Last name:<br>

            <input type="text" name="lastname" value="<?php echo $lastname; ?>">

            <br>

            Email:<br>

            <input type="email" name="email" value="<?php echo $email; ?>">

            <br>

            Password:<br>

            <input type="password" name="password" value="<?php echo $password; ?>">

            <br>


            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

} 

?> -->