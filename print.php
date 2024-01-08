<?php 

    include "config1.php";

    session_start();

   

    $uId = $_GET['id'];

    

        $sql = "SELECT * FROM report WHERE id ='$uId'";
        $result = $db->query($sql);


        $row = $result->fetch_assoc();

        

?>

<!DOCTYPE html>
<html>

<head>

    <title>Incident Reports</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                        
    
</head>

<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
</style>

<body style="background-color:#E3F1FF">

    

    <div class="container mb-5">
		<?php include('message.php'); ?>
        <div class="card mt-5">
            <div class="card-header">
				<div class="d-flex align-items-center justify-content-between">
					<h4 class="card-title mb-0 mr-3">Print Reports</h4>

                    <div>

                    
                    
                    <button class="btn btn-info btn-border btn-round" onclick="printDiv('printThis')">
                        Print Report
                    </button>

                    <a class="btn btn-danger btn-border btn-round" href="view-reports.php">Back</a>

                    </div>
					
					
				</div>       
            </div>
            
            <div class="card-body m-5" id="printThis">
                <div class="d-flex flex-wrap justify-content-center pb-3" style="border-bottom:1px solid red">
                    <div class="" style="width: 100%">
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center">
                                    <img src="barangaylogo.png" alt="" style="height: 120px">
                            </div>
                            <div class="col-md-8 ">
                                    <h4 class="mb-0 ml-3">Republic of the Philippines</h4>    
                                    <h4 class="mb-0">Brgy Molino II, Bacoor, Cavite</h4>     
                                    <h4 class="fw-bold ml-5 pl-5">Incident Profile</h4>
                                    <h4 class="fw-bold mb-3 ml-5 pl-5"><span class="" style="margin-left: 36px">ITracker</span></h4>
                            </div>
                        </div>
                            
                    </div>
                </div>
                <div class="row mt-2">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <h5 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Full Name</h5>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                    <input type="text" class="form-control fw-bold" style="font-size:20px" value="<?php echo $row['fullname']; ?>">
                                </div>

                                <div class="form-group row mt-3">
                                    <h5 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Incident:</h5>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                    <input type="text" class="form-control fw-bold" style="font-size:20px" value="<?php echo $row['incident']; ?>">
                                </div>

                                <div class="form-group row mt-3">
                                    <h5 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Date:</h5>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                    <input type="text" class="form-control fw-bold" style="font-size:20px" value="<?php echo $row['date']; ?>">
                                </div>
                            </div>

                            <div class="col">
                                

                                <div class="form-group row ">
                                    <h5 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Time:</h5>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                    <input type="text" class="form-control fw-bold" style="font-size:20px" value="<?php echo $row['time']; ?>">
                                </div>

                                <div class="form-group row mt-3">
                                    <h5 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Location:</h5>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                    <input type="text" class="form-control fw-bold" style="font-size:20px" value="<?php echo $row['location']; ?>">
                                </div>

                                <div class="form-group row mt-3">
                                    <h5 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Officer:</h5>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                    <input type="text" class="form-control fw-bold" style="font-size:20px" value="<?php echo $row['officer']; ?>">
                                </div>
                            </div>                      
                        </div>                   
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-6">
                            
                        <div class="form-group row mt-3">
                            <h5 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Status:</h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                            <input type="text" class="form-control fw-bold" style="font-size:20px" value="<?php echo $row['remarks']; ?>">
                        </div>
                        
                    </div>

                    <div class="col-md-6">
                            
                        <div class="form-group row mt-3">
                            <h5 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Summary:</h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                            <input type="text" class="form-control fw-bold" style="font-size:20px" value="<?php echo $row['summary']; ?>">
                        </div>
                        
                    </div>
                </div>

                <div class="mt-5" style="border-top: 3px solid black">
                    <div class="row">
                        <div class="col-md-4 font-weight-bold text-center mt-3">
                            <?php date_default_timezone_set('Asia/Manila'); ?>
                            <p><?php echo date("Y-m-d h:i:sa") ?></p>
                        </div>

                        <div class="col-md-4 text-center mt-3">
                            <p>Page 1</p>
                        </div>

                        <div class="col-md-4 font-weight-bold text-center mt-3">
                            <p>Printed By <?php  echo $_SESSION['username'];  ?> </p>
                        </div>
                    </div>
                </div>
               
                        
            </div>
        </div> 
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
            function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>
                            