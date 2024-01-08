<?php 
session_start();

    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }

	// if(!isset($_SESSION['admin'])){
	// 	header("Location: index.php");
	// }



include "navigation.php";
include "config1.php";

$fullname = $_GET['search'];

$sql = "SELECT * FROM report WHERE fullname LIKE '%$fullname%' ORDER BY id ASC";
$result = $db->query($sql);
if (!$result) {
  { echo "Error: " . $sql . "<br>" . $db->error; }
}

$row = $result->fetch_assoc();


?>

<!DOCTYPE html>

<html>
<body style="background-color:#E3F1FF">
<head>

    <title>View Page</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
</style>

<body>

    <!-- <div class="container">

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Full Name</th>
		
		<th>Incident</th>

        <th>Date</th>
		
        <th>Time</th>

        <th>Location</th>

        <th>Officer</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                foreach ($result as $row) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['fullname']; ?></td>

                    <td><?php echo $row['incident']; ?></td>

                    <td><?php echo $row['date']; ?></td>
					
					 <td><?php echo $row['time']; ?></td>
					 
					 <td><?php echo $row['location']; ?></td>

                    <td><?php echo $row['officer']; ?></td>

                  

                    <td><a class="btn btn-info" href="recordTEST.php?id=<?php echo $row['id']; ?>">Add</a>&nbsp;
					<a class="btn btn-info" href="update1.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div>  -->

    <div class="container mb-5">
		<?php include('message.php'); ?>
        <div class="card mt-5">
            <div class="card-header">
				<div class="d-flex align-items-center justify-content-between">
					<h4 class="card-title mb-0 mr-3">Reports</h4>

					<form action="search.php" method="GET" class="d-flex align-items-center justify-content-between">
							<input type="text" name="search" class="form-control mr-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Full Name">
							<button type="submit" class="btn btn-primary">Search</button>
					</form>

                    <div>
                    
                    <a class="btn btn-info" href="addres.php">Add Report</a>
                    <a href="view1.php" class=" btn btn-danger">Back</a>
                    </div>
					
					
				</div>       
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead style="background-color: #0B3C6C; color: white; font-weight: 400 !important;">
                            <tr class="text-center">
                                <th class="p-3">ID</th>
                                <th class="p-3">Full Name</th>
                                <th class="p-3">Incident</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Time</th>
                                <th class="p-3">Location</th>
                                <th class="p-3">Officer</th>
                                <th class="p-3">Action</th>
								<!-- <th><a class="btn btn-info p-2 px-3" href="addres.php">Add Report</a>&nbsp;</th> -->
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                if ($result->num_rows > 0) {
                                    foreach ($result as $row) {
                            ?>
                                    <tr>
										<!-- <td class="p-3"><?php echo $row['fname']; ?></td>
										<td class="p-3"><?php echo $row['address']; ?></td>
										<td class="p-3"><?php echo $row['contact']; ?></td>
										<td><a class="btn btn-info p-1 px-3" href="update2.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger p-1 px-3" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td> -->

                                        <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['fullname']; ?></td>

                    <td><?php echo $row['incident']; ?></td>

                    <td><?php echo $row['date']; ?></td>
					
					 <td><?php echo $row['time']; ?></td>
					 
					 <td><?php echo $row['location']; ?></td>

                    <td><?php echo $row['officer']; ?></td>

                  

                    <td><a class="btn btn-info" href="update1.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                                    </tr>                       
                            <?php       }
                                }

                            ?>                
                        </tbody>
                    </table>
            </div>
        </div> 
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>

