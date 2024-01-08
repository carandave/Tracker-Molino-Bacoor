<?php 

    session_start();

    // if(!isset($_SESSION['username']))
    // {
    //     header("Location: index.php");
    // }

	// if(!isset($_SESSION['admin'])){
	// 	header("Location: index.php");
	// }

    // if($_SESSION['noUpdate'] == 0){
	// 	header("Location: dashboard.php");
	// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
</head>
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
<body style="background-color: #E3F1FF;" >


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

        <div class="d-flex justify-content-center align-items-center">
            <div class="mx-auto d-flex justify-content-center align-items-center flex-column" style="height: 500px; width: 80%;">
                <h1 class="mt-5" style="color: #0B3C6C;">Barangay Officials</h1>

                <div class="row">
				<div class="col-3">
					<div class="d-flex justify-content-center align-items-center flex-column mt-5 p-3 text-center" style="box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
			-webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
			-moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27); border-radius: 5px; min-height: 400px;">
					<h5 class="mb-4" style="color: #0B3C6C;">Brgy Kagawad</h5>
					<h6 class="text-center">Rico J. Tagle</h6>
					<h6 class="text-center">Teddy M. Legaspi</h6>
					<h6 class="text-center">Aileen C. Leoncio</h6>
					<h6 class="text-center">Ceferino Arciaga</h6>
					<h6 class="text-center">Pedro Arciaga Jr</h6>
					<h6 class="text-center">Renato Francisco</h6>
					<h6 class="text-center">Mario P. Aquino</h6>
					</div>
				</div>

				<div class="col-3">
					<div class="d-flex justify-content-center align-items-center flex-column mt-5 p-3 text-center" style="box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
					-webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
					-moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27); border-radius: 5px; min-height: 400px;">
					<h5 class="mb-4" style="color: #0B3C6C;" >SK Kagawad</h5>
					<h6 class="text-center">Vanny Lene P. Ang</h6>
					<h6 class="text-center">Rina Mae E. Tabued</h6>
					<h6 class="text-center">Dina Rose Barira</h6>
					<h6 class="text-center">Hergenuel Dann Meñoza</h6>
					<h6 class="text-center">Khevin William Ignacio</h6>
					</div>
				</div>

				<div class="col-3">
					<div class="d-flex justify-content-center align-items-center flex-column mt-5 p-3 text-center" style="box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
					-webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
					-moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27); border-radius: 5px; min-height: 400px;">
					<h5 class="mb-4" style="color: #0B3C6C;">SK CHAIRMAN</h5>
					<h6 class="text-center mb-4">Jude Mark T. Jornadal</h6>

					<h5 class="mb-4" style="color: #0B3C6C;">SK TREASURER</h5>
					<h6 class="text-center">May Flor D. Casitas</h6>

					</div>
				</div>

				<div class="col-3">
					<div class="d-flex justify-content-center align-items-center flex-column mt-5 p-3 text-center" style="box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
					-webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
					-moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27); border-radius: 5px; min-height: 400px;">
					<h5 class="mb-4" style="color: #0B3C6C;">SK SECRETARY</h5>
					<h6 class="text-center mb-4">Jeanelle Marie A. Belen</h6>

                    <h5 class="mb-4" style="color: #0B3C6C;">BRGY SECRETARY</h5>
					<h6 class="text-center mb-4">Genesis Ventura</h6>

                    <h5 class="mb-4" style="color: #0B3C6C;">BRGY TREASURER</h5>
					<h6 class="text-center"> Jovina Tongohan</h6>
					</div>
				</div>
			</div>
            </div>
        </div>
    </div>





</body>
</html>