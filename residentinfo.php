<?php 
include "config1.php";

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: residentlogin.php");
}

$sql = "SELECT * FROM resident where username = '". $_SESSION['username'] ."' ORDER BY id ASC";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css
" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>User Information</title>
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-info">
						<h4 class="text-white">User Information</h4>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th>Name</th>
								<th>Home Address</th>
								<th>Phone Number</th>
						
							
							</thead>
							<tbody>
								<?php
									 if ($result->num_rows > 0) {

                                        foreach ($result as $row) {
										
											?>
											<tr>
												<td><?php echo $row['fname']; ?></td>
												<td><?php echo $row['address']; ?></td>
												<td><?php echo $row['contact']; ?></td>
												<a href="resident-info.php" class="btn btn-info">Edit</a> &nbsp;
													<a href="contactus.php" class="btn btn-info">Contact Us</a> &nbsp;
												    <a href="residentlogin.php" class="btn btn-info">Logout</a> &nbsp;
													
											</tr>
											<?php
										}
									}
										
									
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS --!>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js
" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js
" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js
" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>