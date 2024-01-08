<?php 
    session_start();

    if(isset($_SESSION['username']))
    {
        header("Location: dashboard.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTracker</title>
    <body style="background-color:#E3F1FF">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
<?php
    require('db1.php');
    // When form submitted, check and create user session.
    // if (isset($_POST['username'])) {

    //     $admin = "Admin";

    //     $username = stripslashes($_REQUEST['username']);    // removes backslashes
    //     $username = mysqli_real_escape_string($con, $username);
    //     $password = stripslashes($_REQUEST['password']);
    //     $password = mysqli_real_escape_string($con, $password);

    //     // Check user is exist in the database
    //     $query    = "SELECT * FROM `users` WHERE username='$username'
    //                  AND password='" . md5($password) . "'";
    //     $result = mysqli_query($con, $query) or die(mysql_error());
    //     $rows = mysqli_num_rows($result);

        
    //     if ($rows == 1) {
    //         $_SESSION['username'] = $username;
    //         $_SESSION['admin'] = $admin;
    //         // Redirect to user dashboard page
    //         header("Location: dashboard.php");
    //     }
    //      else {
    //         echo "<div class='form text-center'>
    //               <h3>Incorrect Username/password.</h3><br/>
    //               <p class='link'>Click here to <a href='loginhomepage.php'>Login</a> again.</p>
    //               </div>";
    //     }
    // } else {

        if (isset($_POST['username'])) {
            $username = stripslashes($_REQUEST['username']);    // removes backslashes
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            // Check user is exist in the database
            $query    = "SELECT * FROM `users` WHERE username='$username'
                         AND password='" . md5($password) . "'";
            // $query    = "SELECT * FROM `users` WHERE username='$username'
            //               AND password='" . $password . "'";
            $result = mysqli_query($con, $query) or die(mysql_error());
    
            $rows = mysqli_fetch_array($result);
    
            print_r($rows);
    
            if (mysqli_num_rows($result) >= 1) {
                $_SESSION['username'] = $username;
                $_SESSION['isAdmin'] = $rows['id'];
                // Redirect to user dashboard page
                header("Location: dashboard.php");
            } else {
                echo "<div class='form1 mt-5'>
                      <h3 class='text-center'>Incorrect Username/Password.</h3><br/>
                      <p class='link text-center'>Click here to <a href='index.php'>Login</a> again.</p>
                      </div>";
                    
                // echo $username;
                // echo $password;
            }
        } else {
?>
	
	
			
    <form class="form" method="post" name="login">
        <center><img src="barangaylogo.png" width="220" length="220"></center>
        <h1 class="login-title h2"><center>Login to Admin Panel</center></h1>
        <input type="text" class="form-control mt-3" name="username" id="username" placeholder="Enter Username" autofocus="true" required>
        <input type="password" class="form-control mt-3" name="password" id="password" placeholder="Enter Password" required>
        <!-- <input type="text" class="login-input" name="username" placeholder="Email" autofocus="true"/> -->
        <!-- <input type="password" class="login-input" name="password" placeholder="Password"/> -->
        <input type="submit" value="Login Panel" name="submit" id="submit" class="btn btn-info btn-block mt-3"/>
    </form>
<?php
    }
?>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

    // const username = document.getElementById('username');
    // const password = document.getElementById('password');
    // const submit = document.getElementById('submit');

    // submit.addEventListner("load", function(){



    //     console.log("Click")
    // });

    // console.log("Click")

            // if(username.value == "" || password.value == ""){
        // alert("Make sure the input fields are not empty")
        // }


    

</script>
</body>
</html>
