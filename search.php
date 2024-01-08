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

$search = $_GET['search'];

$sql = "SELECT * FROM resident WHERE lname LIKE '%$search%' ORDER BY id ASC";
$result = $db->query($sql);
if (!$result) {
  { echo "Error: " . $sql . "<br>" . $db->error; }
}

$row = $result->fetch_assoc();

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
					<h4 class="card-title mb-0 mr-3">User Information</h4>

					<form action="search.php" method="GET" class="d-flex align-items-center justify-content-between">
							<input type="text" name="search" value="<?php echo $search?>" class="form-control mr-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Last Name">
							<button type="submit" class="btn btn-primary">Search</button>
					</form>

					<div>
					<a class="btn btn-info " href="addres.php">Add User</a>;
					<a href="registerednumber.php" class=" btn btn-danger">Back</a>
					</div>
					
					
				</div>       
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead style="background-color: #0B3C6C; color: white; font-weight: 400 !important;">
                            <tr  class="text-center">
                                <th>First Name</th>
								<th>Last Name</th>
                                <th>Street Address</th>
								<th>City</th>
								<th>Province</th>
                                <th>Phone Number</th>
								<th>Action</th>
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
										<td class="p-3"><?php echo $row['address']; ?></td>
										<td class="p-3"><?php echo $row['city']; ?></td>
										<td class="p-3"><?php echo $row['province']; ?></td>
										<td class="p-3"><?php echo $row['contact']; ?></td>
										<td class="text-center"><a class="btn btn-info p-1 px-3" href="update2.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger p-1 px-3" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
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
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS --!>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js
" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js
" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js
" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>

