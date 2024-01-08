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

if (isset($_POST['update'])) {

    $id = $_POST['user_id'];
    
    $fullname = $_POST['fullname'];

    $incident= $_POST['incident'];
	
	$date = $_POST['date'];

    $time = $_POST['time'];

    $location = $_POST['location'];

    $officer = $_POST['officer'];

    $remarks = $_POST['remarks'];

	$summary = $_POST['summary'];

    $sql = "UPDATE `report` SET `fullname`='$fullname', `incident`='$incident', `date`='$date', `time`='$time', `location`='$location', `officer`='$officer', `remarks`='$remarks', `summary`='$summary' where `id`='$id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {

        // echo "Record Updated Successfully.";
        echo '<script> alert("Record Updated Successfully!")</script>';

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `report` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $fullname = $row['fullname'];

            $incident = $row['incident'];
			
			$date = $row['date'];

            $time = $row['time'];

            $location = $row['location'];

            $officer  = $row['officer'];

            $remarks = $row['remarks'];

            $summary  = $row['summary'];

            $id = $row['id'];

            

        } 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Records</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- <body style="background-color:#E3F1FF"> -->
    <link rel="stylesheet" href="style2.css">
</head>

<style>
*{
        font-family: 'Poppins', sans-serif;
    }
</style>

<body style="background-color:#E3F1FF">
    <?php include("navigation.php");?>
    <form class="_form d-flex justify-content-center align-items-center flex-column" method="POST" action="update1.php">

        <div>
            <h1 class="h2 text-center mb-3">Edit Report</h1>
        </div>

        <div class="form-group" style="width: 100%">
            <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fullname; ?>" placeholder="Full Name" required>
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        </div>

        <div class="form-group" style="width: 100%">
            <select name="incident" class="form-control form-control-md">
            <option value="<?php echo $incident; ?>"><?php echo $incident; ?></option>
            <option value="Theft">Theft</option>
            <option value="Threat">Threat</option>
            <option value="Estafa">Estafa</option>
            <option value="Trespassing">Trespassing</option>
            <option value="Alarm and Scandal">Alarm and Scandal</option>
            <option value="Physical Injury">Physical Injury</option>
            <option value="Anti Fencing">Anti Fencing</option>
            <option value="Estafa">Estafa</option>
            <option value="Libel">Libel</option>
            <option value="Damage of Property">Damage of Property</option>
            <option value="Robbery">Robbery</option>
            <option value="Swindling">Swindling</option>
            <option value="R.A 9003">R.A 9003</option>
            <option value="Curfew">4Curfew</option>
            <option value="Oral Defamation">Oral Defamation</option>
            </select>
        </div>

        <div class="form-group" style="width: 100%">
            <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $date; ?>" placeholder="Date" required>
        </div>

        <div class="form-group" style="width: 100%">
            <input type="time" name="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $time; ?>" placeholder="Time" required>
        </div>

        <div class="form-group" style="width: 100%">
            <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $location; ?>" placeholder="Location" required>
        </div>

        <div class="form-group" style="width: 100%">
            <select class="form-control form-control-md" name="officer" required>
			<option value="<?php echo $officer;?>"><?php echo $officer;?></option>
			<option value="Marlon Careon">Marlon Careon</option>
			<option value="Joel Tengco">Joel Tengco</option>
			<option value="Johnny Langreo">Johnny Langreo</option>
			</select>
        </div>

        <div class="form-group" style="width: 100%">
			<select class="form-control form-control-md" name="remarks" required>
			<option value="<?php echo $remarks;?>"><?php echo $remarks;?></option>
			<option value="Solved">Solved</option>
			<option value="Unsolved">Unsolved</option>
			</select>
		</div>

		<div class="form-group" style="width: 100%">
			<textarea name="summary" cols="5" rows="3" class="form-control text-left" placeholder="Summary" required><?php echo $summary;?></textarea>
		</div>

        <button type="submit" name="update" class="btn btn-primary btn-block mb-3">Edit</button>
        <p><a href="view-reports.php">View Reports</a></p>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


<!-- <body style="background-color:#E3F1FF">

        <form action="update1.php" method="post">

          
<center>

            <br>

            <input type="text" name="fullname" value="<?php echo $fullname; ?>">
			
			

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <br>

            <br>

            <input type="text" name="incident" value="<?php echo $incident; ?>">

            <br>

            <br>

            <input type="text" name="date" value="<?php echo $date; ?>">

            <br>

            <br>

            <input type="text" name="time" value="<?php echo $time; ?>">

            <br>
			
			 <br>

            <input type="text" name="location" value="<?php echo $location; ?>">

            <br>

            <br>

            <input type="text" name="officer" value="<?php echo $officer; ?>">

            <br>
			<br>
            <input type="submit" value="Update" name="update">
			<p><a href="view1.php">View Reports</a></p>
			
</center>
          

        </form> 

        </body>

        </html>  -->