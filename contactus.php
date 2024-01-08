<?php 
session_start();
if(isset($_SESSION['username']))
{
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
<style>
body {
  font-family: 'Poppins', sans-serif;
  background-color: #E3F1FF;
  box-sizing: border-box;
}

input[type=text], input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #55a1ff;
  width: auto;
  height: auto;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #55a1ff;
}

input[type=back] {
  background-color: #55a1ff;
  color: white;
  width: auto;
  height: auto;
  padding: 12px 5px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=back]:hover {
  background-color: #55a1ff;
}

.container {
  background-color: #FFFFFF;
  height: 50%;
 width: 30%;
 margin-right: auto;
 margin-left: auto;
 margin-top: auto;
 margin-bottom: auto;
border-radius: 10px;
 padding-top: 50px;
 padding-bottom: 50px;
 padding-left: 50px;
 padding-right: 50px;
}

</style>

<style>
    *{
        font-family: 'Poppins', sans-serif;
		box-sizing: border-box;
    }

	body{
		background-color: #E3F1FF !important;
	}

	.__navbar{
	background-color: #0B3C6C !important;
	width: 100%;
	}


</style>

</head>

<body>
<div class="fluid-container">

		<nav class="__navbar navbar navbar-expand-lg navbar-dark">
			<div class="nav-con" style="width: 90%;">
				<a class="navbar-brand" href="index.php">ITRACKER</a>
			</div>
		
			<ul class="navbar-nav mr-3" style="width: 25%;">
			<li class="nav-item active">
			<a class="nav-link text-light" href="index.php" style="font-weight: 600; letter-spacing: 1px;">HOME<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
			<a class="nav-link text-light" href="contactus.php" style="font-weight: 600; letter-spacing: 1px;">CONTACT US<span class="sr-only">(current)</span></a>
		</li>
			<li class="nav-item active">
				<a class="nav-link text-light" href="loginhomepage.php" style="font-weight: 600; letter-spacing: 1px;">LOGIN<span class="sr-only">(current)</span></a>
			</li>
			</ul>
		</nav>
<center>
<br>
<div class="container">
  <form action="contactprocess.php" method="post">
       
       <h1> Contact</h1>

    <input type="text" name="lname" placeholder="Last Name" required><br>

    <input type="text" name="fname" placeholder="First Name" required><br>

    <input type="email" name="mail" placeholder="E-mail" required><br>

    <input type="text" name="subject" placeholder="Subject" required><br>

    <textarea name="message" placeholder="Write something.." style="height:150px" required></textarea><br>

    <input type="submit" name ="submit" value="Submit">
  </form>
  </center>
</div>

</body>
</html>
