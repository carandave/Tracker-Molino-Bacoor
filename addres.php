<?php 
    
    session_start();

    require('db1.php');

    if($_SESSION['noUpdate'] == 0){
		header("Location: dashboard.php");
	}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style2.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

<body style="background-color:#E3F1FF">
<?php

    if (isset($_REQUEST['username'])) {

        $username = stripslashes($_REQUEST['username']);

        $username = mysqli_real_escape_string($con, $username);

		$lname = stripslashes($_REQUEST['lname']);
		$lname = mysqli_real_escape_string($con, $lname);
		
		$fname    = stripslashes($_REQUEST['fname']);
		$fname = mysqli_real_escape_string($con, $fname);
		
		
		 if (!preg_match("/^[a-zA-Z ]+$/",$lname,)) {
        $lname_error = "Name must contain only alphabets";
        }
        
         if (!preg_match("/^[a-zA-Z ]+$/",$fname,)) {
        $fname_error = "Name must contain only alphabets";
        }
		
		$contact    = stripslashes($_REQUEST['contact']);
		$contact = mysqli_real_escape_string($con, $contact);
		
        $address    = stripslashes($_REQUEST['address']);
        $address    = mysqli_real_escape_string($con, $address);
        
        $city    = stripslashes($_REQUEST['city']);
        $city    = mysqli_real_escape_string($con, $city);
        
        $province    = stripslashes($_REQUEST['province']);
        $province    = mysqli_real_escape_string($con, $province);
        
        
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        if(strlen($password) < 6) {
        $password_error = "Password must be minimum of 8 characters";
        } 
        
        $cpassword = stripslashes($_REQUEST['password']);
        $cpassword = mysqli_real_escape_string($con, $cpassword);
        
        
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `resident` (username, password, lname, fname, contact, address, city, province,  create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$lname', '$fname', '$contact', '$address', '$city', '$province', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        
     
      
     
        if ($result) { 
            echo "<div class='form-after'>
                  <h3>Successfuly Added.</h3><br/>
                  <p class='link'>Click here to <a href='registerednumber.php'>View Changes</a></p>
                  </div>";
        } else {
            echo "<div class='form-after'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='residentreg.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>

    <form class="form" action="" method="post" style="width: 450px;">
        	<center><img src="barangaylogo.png" alt="m2" width="200" height="200"> </center>
        <h1 class="login-title">Add Resident</h1>

        <div class="form-group d-flex flex-row">
        <input type="text" class="login-input form-control mr-1" name="username" placeholder="Username" pattern="^[a-zA-Z0-9_.-]*$" required onkeypress="return event.charCode != 32" oninvalid="this.setCustomValidity('Must be alphanumeric. Length must be at least 5 to 20 characters only. Special characters not allowed.')" oninput="this.setCustomValidity('')" minlength="5" maxlength="20" />
		<input type="text" class="login-input form-control ml-1" name="lname" placeholder="Last Name" pattern="[A-Za-z.Ññ ]+" onkeypress="return blockSpecialChar(event)" minlength="2" maxlength="30" required oninvalid="this.setCustomValidity('Letters only. Special characters and numbers are not allowed.')" oninput="this.setCustomValidity('')" />
        </div>

        <div class="form-group d-flex flex-row">
        <input type="text" class="login-input form-control mr-1" name="fname" placeholder="First Name" pattern="[A-Za-z.Ññ ]+" onkeypress="return blockSpecialChar(event)" minlength="2" maxlength="30" required oninvalid="this.setCustomValidity('Letters only. Special characters and numbers are not allowed.')" oninput="this.setCustomValidity('')" />
        <input type="text" class="login-input form-control ml-1" name="address" placeholder="Street Address" minlength="5" maxlength="120" required oninvalid="this.setCustomValidity('Enter complete address')" oninput="this.setCustomValidity('')" />
        </div>

        <div class="form-group d-flex flex-row">
        <input type="text" class="login-input form-control mr-1" name="city" placeholder="City" pattern="[A-Za-z.Ññ ]+" onkeypress="return blockSpecialChar(event)" minlength="2" maxlength="40" required oninvalid="this.setCustomValidity('Letters only. Special characters and numbers are not allowed.')" oninput="this.setCustomValidity('')" />     
        <input type="text" class="login-input form-control ml-1" name="province" placeholder="Province" pattern="[A-Za-z.Ññ ]+" onkeypress="return blockSpecialChar(event)" minlength="2" maxlength="40" required oninvalid="this.setCustomValidity('Letters only. Special characters and numbers are not allowed.')" oninput="this.setCustomValidity('')" />
        </div>
        
		<input type="text" class="login-input form-control mt-3" name="contact" placeholder="Contact no." pattern="[0-9-]+" onkeypress="return isNumber(event)" minlength="11" maxlength="13" oninvalid="this.setCustomValidity('Numbers only. Length must be at least 11. Special characters and letters are not allowed.')" oninput="this.setCustomValidity('')" />
		
		
        <input type="password" class="login-input form-control mt-3" name="password" id="password" placeholder="Password" minlength="5" maxlength="20" required />
        <input type="password" class="login-input form-control mt-3" name="confirm_password" id="confirm_password" placeholder="Confirm Password" minlength="5" maxlength="20" required />
  
        
        <input type="submit" name="submit" value="Register" class="login-button btn btn-primary btn-block mt-3">
        <p class="link"><a href="registerednumber.php" class="login-button btn btn-danger btn-block mt-2">Go Back</a></p>
    </form>
    
    <script type="text/javascript">
		function blockSpecialChar(evt) { 
			var charCode = (evt.which) ? evt.which : window.event.keyCode; 
			if (charCode <= 13) { 
				return true; 
			} 
				
			else { 
				var keyChar = String.fromCharCode(charCode); 
				var re = /^[A-Za-z.Ññ ]+$/ 
				return re.test(keyChar); 
			} 
		}

		function isNumber(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}
			return true;
		}
		
		var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");

			function validatePassword() {
				if(password.value != confirm_password.value) {
					confirm_password.setCustomValidity("Passwords Don't Match");
				} 

				else {
					confirm_password.setCustomValidity('');
				}
			}

			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
	</script>
<?php

    }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>