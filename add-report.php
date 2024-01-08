<?php 

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
}

if($_SESSION['noUpdate'] == 0){
	header("Location: dashboard.php");
}




include "navigation.php";
include "config.php";

  if (isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];

    $incident = $_POST['incident'];

    $date = $_POST['date'];
	
	$time = date("g:i a",strtotime($_POST['time']));
	
	$location = $_POST['location'];

    $officer = $_POST['officer'];

	$remarks = $_POST['remarks'];

	$summary = $_POST['summary'];

    $sql = "INSERT INTO `report`(`fullname`, `incident`, `date`, `time`, `location`,`officer`, `remarks`, `summary`) VALUES ('$fullname','$incident','$date','$time','$location','$officer', '$remarks','$summary')";

    $result = $conn->query($sql);

    if ($result == TRUE) {


	echo '<script> alert("Succesfully Created")</script>';
	echo "<script> window.location.href = 'view-reports.php';</script>";
	

	

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>
	<head>
	<title>Add Record</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="style2.css">
</head>

	<style>
    *{
        font-family: 'Poppins', sans-serif;
		
    }

	body{
		background-color:#E3F1FF;
		
	}
	._form{
		min-height: 700px !important;
		padding: 50px;
		width: 400px;
		margin-bottom: 30px;
	}

	input{
		font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
		font-family: 'Poppins', sans-serif !important;
	}

	</style>

	
<body>

<!-- 
<form action="" method="POST">

  
<center>
   
<br> -->
   
 
	<?php include 'design.php'?>
	
	<form class="_form d-flex justify-content-center align-items-center flex-column" method="POST" action="add-report.php">

		<div>
			<h1 class="h2 text-center mb-3">Add Report</h1>
		</div>

		<div class="form-group" style="width: 100%">
			<input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
		</div>

		<div class="form-group" style="width: 100%">
			<select name="incident" class="form-control form-control-md" required>
			<option value="">Select Crime</option>
			<option value="Theft">Theft</option>
			<option value="Threat">Threat</option>
			<option value="Estafa">Estafa</option>
			<option value="Anti-Rabbies Act">Anti-Rabbies Act</option>
			<option value="Trespassing">Trespassing</option>
			<option value="Alarm and Scandal">Alarm and Scandal</option>
			<option value="Physical Injury">Physical Injury</option>
			<option value="Anti Fencing">Anti Fencing</option>
			<option value="Vehicular Accident">Vehicular Accident</option>
			<option value="Intriguing Against Honor">Intriguing Against Honor</option>
			<option value="Property Claim">Property Claim</option>
			<option value="Money Claim">Money Claim</option>
			<option value="Libel">Libel</option>
			<option value="Damage of Property">Damage of Property</option>
			<option value="Oral Defamation">Oral Defamation</option>
			<option value="Robbery">Robbery</option>
			<option value="Swindling">Swindling</option>
			<option value="R.A 9003">R.A 9003</option>
			<option value="Curfew">Curfew</option>
			<option value="Others">Others</option>
			</select>
		</div>

		<div class="form-group" style="width: 100%">
			<input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Date" required>
		</div>

		<div class="form-group" style="width: 100%">
			<input type="time" name="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Time" required>
		</div>


		<div class="form-group" style="width: 100%">
			<input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Location" required>
			
		</div>

		<div class="form-group" style="width: 100%">
			<select class="form-control form-control-md" name="officer" required>
			<option value="">Select Officer</option>
			<option value="Marlon Careon">Marlon Careon</option>
			<option value="Joel Tengco">Joel Tengco</option>
			<option value="Johnny Langreo">Johnny Langreo</option>
			</select>
		</div>

		<div class="form-group" style="width: 100%">
			<select class="form-control form-control-md" name="remarks" required>
			<option value="">Select Remarks</option>
			<option value="Solved">Solved</option>
			<option value="Unsolved">Unsolved</option>
			</select>
		</div>

		<div class="form-group" style="width: 100%">
			<textarea name="summary" cols="5" rows="3" class="form-control text-left" placeholder="Summary" required></textarea>
		</div>

		<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
	</form>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   

</body>

</html>