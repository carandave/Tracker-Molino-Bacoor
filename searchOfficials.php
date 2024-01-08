<?php 
include "config1.php";

session_start();

    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }

	// if(!isset($_SESSION['admin'])){
	// 	header("Location: index.php");
	// }
	
	if($_SESSION['noUpdate'] == 0){
		header("Location: dashboard.php");
	}

    $search = $_GET['search'];

    $sql = "SELECT * FROM users WHERE lname LIKE '%$search%' ORDER BY id ASC";
    $result = $db->query($sql);
    if (!$result) {
    { echo "Error: " . $sql . "<br>" . $db->error; }
    }

    $row = $result->fetch_assoc();

    $idAdmin = $_SESSION['isAdmin'];

    $sql2 = "SELECT * FROM users WHERE id = '$idAdmin'";
    $result2 = $db->query($sql2);

    if (!$result2) {
        { echo "Error: " . $sql2 . "<br>" . $db->error; }
    }

    $row2 = $result2->fetch_assoc();



?>

<!doctype html>
<html lang="en">
<head>
    <body style="background-color:#E3F1FF">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>User Information</title>
</head>

<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
</style>
<body>


	<?php include("navigation.php");?>

	<div class="container mb-5">
		<?php include('message.php'); ?>
        <div class="card mt-5">
            <div class="card-header">
				<div class="d-flex align-items-center justify-content-between">
					<h4 class="card-title mb-0 mr-3">Officials Information</h4>

					<form action="searchOfficials.php" method="GET" class="d-flex align-items-center justify-content-between">
							<input type="text" name="search" class="form-control mr-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Last Name" value="<?php echo $search;?>">
							<button type="submit" class="btn btn-primary">Search</button>
					</form>
					<div>
                        <?php if($row2['position'] == "Executive Officer"){ ?>
                            <a class="btn btn-info" href="addOfficial.php">Add Offcials</a>;
                         <?php } ?>
						<a href="officiallist.php" class="btn btn-danger">Back</a>
					</div>
					
					
				</div>       
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead style="background-color: #0B3C6C; color: white; font-weight: 400 !important;">
                            <tr class="text-center">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
								<th>Position</th>
                                <th>Gender</th>
                                <th>Contact No.</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                if ($result->num_rows > 0) {
                                    foreach ($result as $row) {
                            ?>
                                    <tr>
										<td class="p-3"><?php echo $row['fname']; ?></td>
										<td class="p-3"><?php echo $row['lname']; ?></td>
										<td class="p-3"><?php echo $row['email']; ?></td>
										<td class="p-3"><?php echo $row['position']; ?></td>
										<td class="p-3"><?php echo $row['gender']; ?></td>
										<td class="p-3"><?php echo $row['contact']; ?></td>
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