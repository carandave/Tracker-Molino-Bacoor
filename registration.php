<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<body style="background-color:#E3F1FF">
	<center><img src="barangaylogo.png" alt="m2" width="400" height="400"> </center>
		<br>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        
        $lname    = stripslashes($_REQUEST['lname']);
        $lname   = mysqli_real_escape_string($con, $lname);
        
        $fname   = stripslashes($_REQUEST['fname']);
        $fname    = mysqli_real_escape_string($con, $fname);
        
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username,password, lname, fname, email, create_datetime)
                     VALUES ('$username', '" .($password) . "' ,'$lname','$fname', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        
    

        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder=Username required />
        <input type="text" class="login-input" name="lname" placeholder="Last Name" required />
        <input type="text" class="login-input" name="fname" placeholder="First Name" required />
        <input type="text" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
		<input type="password" class="login-input" name="cpassword" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="index.php">Click to Login</a></p>
    </form>
<?php

    }
?>
</body>
</html>