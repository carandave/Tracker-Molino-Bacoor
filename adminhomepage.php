<?php 

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

	 

	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Admin</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
</head>

<style>

*{
        font-family: 'Poppins', sans-serif;
    }

</style>


<body>
<?php include 'navigation.php'?>
<div class="fluid-container">

	<div class="row mr-0">
		<div class="col-md-3 px-5">
			<div class="d-flex justify-content-center align-items-center mt-5">	
				<img src="barangaylogo.png" class="img-fluid" alt="brgylogo" width="200" height="200">
			</div>
			
			<h3 class="seal text-center mt-3 font-weight-normal">Official Seal</h3> 
			<p class="population mb-0 text-center text-lg-left"><span class="font-weight-bold">Population:</span> 42,395</p>
			<p class="coordinates mb-0 text-center text-lg-left"><span class="font-weight-bold">Coordinates:</span> 14.4105, 120.9758 (14° 25' North, 120° 59' East)</p>
			<p class="household text-center text-lg-left"><span class="font-weight-bold">No. of Household:</span> 8,739</p>
			<p><a href="https://www.facebook.com/MIISupermanSaSerbisyo">
			<div class="d-flex justify-content-center align-items-center">
				<img class ="facebooklogo" class="img-fluid" src="fb.png" alt="facebook.com" width="70" height="70" float="bottom-left">	
			</div>	
			
			</a></p>

			<div>

			</div>

			
		</div>

		<div class="col-md-6 pr-0" style="background-color: white;">
				<div>
					<div class="d-flex justify-content-center align-items-center flex-column px-5">
						<video class="embed-responsive embed-responsive-16by9 mt-5 mb-3" src='molino.mp4' width="500px" height="330px" controls autoplay controls loop> 
						</video>
						<h1 class="text-center">Barangay Molino II</h1>
						<p class="text-center">Molino II is a barangay in the city of Bacoor, in the province of Cavite. Its population as determined by the 2020 Census was 42,395. This represented 6.38% of the total population of Bacoor. Barangay Molino II Council works on fomulating and implementing plans and programs for poverty alleviation for the successful achievement of desired output and outcome to augment the economic status of our population.</p>
					</div>

					<hr class="mb-0">

					<div class="row">
						<div class="col-6">
							<div class="py-3 px-4 d-flex justify-content-center align-items-center flex-column" style="box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
							-webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
							-moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27); border-radius: 5px; background-color: #E3F1FF; min-height: 450px">
								<h2  class="text-center">Vision</h2>
								<p  class="text-center">ANG BARANGAY MOLINO II AY ISANG PAMAYANANAN NG MGA MAMAYANG</p>
								<p class="text-center"> - MAKA - DIYOS</p>
								<p class="text-center"> - MAKATAO</p>
								<p class="text-center"> - MAKAKALIKASAN AT MAKABANSA</p>
								<p class="text-center"> - MAY PAG GALANG SA KARAPATANG PANTAO</p>
								<p class="text-center"> - RESPONSABLE</p>
							</div>
						</div>

						<div class="col-6">
							<div class="py-3 px-4 mr-3 d-flex justify-content-center align-items-center flex-column" style="box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
							-webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
							-moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27); border-radius: 5px; background-color: #E3F1FF; min-height: 450px">
								<h2  class="text-center">Mission</h2>
								<p  class="text-center">MAISASAKATAPURAN ANG PANANAW NG BARANGAY MOLINO II SA PAMAMAGITAN NG</p>
								<p class="text-center"> - PAMUMUNONG MAKA - DIYOS</p>
								<p class="text-center"> - MABILIS NA SERBISYON</p>
								<p class="text-center"> - RESOLUTION AT ORDINANSA</p>
								<p class="text-center"> - PAGTATAGUYOD NG MGA PROGRAMANG MAY PAGKILING SA HIGIT NA NANGANGAILANGAN</p>
								<p class="text-center"> - PAKIKIPAG-UGNAYAN SA MGA AHENSYA NG PAMAHALAAN</p>
							</div>
						</div>
					</div>

					

					

					<div class="row d-flex justify-content-center align-items-center flex-sm-row p-5" style="min-height: 300px;">

						<div class="hotline col-md-6 text-center p-3" style="background-color: #E3F1FF; width: 100%; min-height: 100%;">
							<h2>HOTLINE</h2>
							<hr>
							Mayor's Office - (046) 431-1655 <br>
							Police Station - (046) 431-2292 <br>
							Fire Station - (046) 431-0308 <br>
							CDRRMO - (046) 431-9600 <br>
							City Health Office - (046) 431-0752
						</div>

						

						<div class="col-md-6 p-0 mt-3 pl-lg-3">
							<div style="background-color: #E3F1FF; width: 100%; height: 100%;">
								<iframe  class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15457.15030691676!2d120.97060242660505!3d14.41057872143508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d22e0e26d995%3A0xacd29a43f54f1c2d!2sMolino%20II%2C%20Bacoor%2C%20Cavite!5e0!3m2!1sen!2sph!4v1652904234938!5m2!1sen!2sph" width="100%" height="250%" style="border:0;" allowfullscreen="yes" loading="lazy" position="auto" align="right" ></iframe>
							</div>
							
						</div>

						

						
					</div>
					
				</div>
		</div>

		<div class="col-md-3">
			
		<div class="mt-4" style="width: 100%;">


				<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">
				How to use iTracker Website
				</button>


				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header"> 
						<h5 class="modal-title text-center" id="exampleModalLabel">How to use iTracker Website for Officials</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body"> <span></span>
						<p><span style="font-weight: bold;">Step 1:</span> Login to Admin Panel. <img src="Login1.png" alt="" class="img-fluid"></p>
						<p><span style="font-weight: bold;">Step 2:</span> After logging in you will be directed to the home page. <img src="Dashboard.png" alt="" class="img-fluid"></p>
						<p><span style="font-weight: bold;">Step 3:</span> If the button is pressed, click the notification behind the dashboard to navigate the emergency. <img src="homepage.png" alt="" class="img-fluid"></p>
						<p><span style="font-weight: bold;">Step 4:</span> The barangay officials will verify and respond to the location of the person who pressed. <img src="step4.jpg" alt="" class="img-fluid"></p>
						<p><span style="font-weight: bold;">Step 5:</span> After the button was pressed and whether the incident is solved or unsolved, go to Incident Reports section to list down the details of emerge. <img src="step5.png" alt="" class="img-fluid"></p>
					</div>
					</div>
				</div>
				</div>

			</div>
				
			<div class="d-flex justify-content-center align-items-center flex-column mt-5 p-4" style="box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
			-webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
			-moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27); border-radius: 5px;">
				
				<img class="img-fluid" src="barangaycaptain.jpg" alt="brgycapt" width="220" height="220">
				<h4 class="brgycaptain text-center mt-3 mb-0">Hon. Micheal J. Saquitan<h4>
				<h6 class="text-center mb-0">BRGY CAPTAIN</h6>
			</div>

			<div class="d-flex justify-content-center align-items-center flex-column mt-5 p-3" style="box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
			-webkit-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27);
			-moz-box-shadow: -1px 4px 13px 1px rgba(0,0,0,0.27); border-radius: 5px;">
				
				<img class="img-fluid" src="chairman.jpg" alt="brgycapt" width="220" height="220">
				<h4 class="brgycaptain text-center mt-3 mb-0">Jude Mark Jornadal<h4>
				<h6 class="text-center">SK CHAIRMAN</h6>
			</div>
		
		</div>
	</div>

	<footer class="d-flex justify-content-center align-items-center mt-5" style="background-color: #3C4048; height: 50px;">
	<span class="text-light">&copy; 2022 Bessywaps | Brgy Molino II. All Rights Reserved</span>
	</footer>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script defer>
	$(document).ready(function() {
		$.get('ajax_notif.php', function(response) {	
			if(parseInt(response) > 0) {
				$("#hasItemIndicator").show();
			}else{
				$("#hasItemIndicator").hide();
			}
		});
	});
</script>
</body>
</html>