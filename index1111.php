<?php 
    session_start();

    //Dating index.php (Login)

    



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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
</head>

    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>

<body>

<div class="__con container">
<?php
    require('db1.php');
    // When form submitted, check and create user session.
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
        <h1 class="login-title h2"><center>Officials Login</center></h1>
        <input type="text" class="form-control mt-3" name="username" id="exampleInputEmail1" placeholder="Enter Username" autofocus="true">
        <input type="password" class="form-control mt-3" name="password" id="exampleInputEmail1" placeholder="Enter Password">
        <!-- <input type="text" class="login-input" name="username" placeholder="Email" autofocus="true"/> -->
        <!-- <input type="password" class="login-input" name="password" placeholder="Password"/> -->
        <input type="submit" value="Login" name="submit" class="btn btn-info btn-block mt-3"/>
    </form>
<?php
    }
?>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>
