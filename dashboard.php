<?php
session_start();
include "config1.php";

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    $url="https://";
}
else{
    $url="https://";
    $url.=$_SERVER['HTTP_HOST'];
    $url.=$_SERVER['REQUEST_URI'];
    $url;
}

$page=$url;
$sec="5";


$sql = "SELECT tbl_gps.*, 
    CONCAT(resident.fname, resident.lname) as fullname,
    resident.address as address,
    resident.id as resident_id
    FROM tbl_gps 
        JOIN resident
    WHERE opened = false
    ORDER BY id";

$notifications = mysqli_query($db, $sql) or die (mysqli_error($db));

if(!isset($_SESSION['username']) )
{
    header("Location: index.php");
}

else{
    // echo "Naka set";
    $id = $_SESSION['isAdmin'];
}

    require('db1.php');

    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $rows = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) >= 1) {
        $_SESSION['noUpdate'] = $rows['noUpdate'];
        

        $noUpdate = $_SESSION['noUpdate'];


        if($noUpdate == 0){
            // echo "Walang No of Update";
        }

        else if($noUpdate == 1){

        }

    }

    // echo $_SESSION['isAdmin'];
    // $_SESSION['username'] = $username;


//include auth_session.php file on all user panel pages
include("auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="<?php echo $sec;?>" URL="<?php echo $page;?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Barangay Officials</title>
    <body style="background-color:#E3F1FF">
    <link rel="stylesheet" href="style2.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
</head>
<style>
    *{
        font-family: 'Poppins', sans-serif;
    }

    .disable-click{
        pointer-events:none;
        opacity: 0.5;
        /* pointer-events: visible; */
    }
</style>
<body>

    <div class="fluid-container">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div style="margin-top: 50px;"></div>
                    <div class="card" style="border-radius: 15px; min-height: 280px">
                        <div class="card-body">
                            <h4>Notifications</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" >
                                    <thead class="text-center" style="background-color: #0B3C6C; color: white; font-weight: 400 !important;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                            if ($notifications->num_rows > 0) {
                                                foreach ($notifications as $row) {
                                        ?>
                                                <tr>
                                                    
                                                    <td><?php echo $row['resident_id']; ?></td>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td data-link = "map.php?lng=<?php echo $row['lng'] . '&lat=' .$row['lat'].'&id='.$row['id']?>"><?php echo $row['address']; ?></td>
                                                </tr>                       
                                        <?php       }
                                            }

                                        ?>                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-5">
                    <div class="dash-container">
                        <p>Hi, <span><?php echo $_SESSION['username']; ?></span>!</p>
                        <p>Welcome to ITracker</p>
                        <p ><a href="adminhomepage.php" class="btn btn-info btn-block mt-3" id="anchorid">Click here to proceed</a></p>
                        <input type="text" id="hiddenooUp" hidden="true" value = "<?php echo $noUpdate;?>">
                        <p><a href="update.php?id=<?php echo $idAdmin = $_SESSION['isAdmin'];?>" class="btn btn-success btn-block mt-2">Click here to Change Password</a></p>
                        
                        <p><a href="logout.php" class="btn btn-danger btn-block mt-2">Logout</a></p>
			
				<button type="button" class="btn btn-info btn-block mt-5 btn-lg" data-toggle="modal" data-target="#exampleModal">
				How to use Website
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
						<p><span style="font-weight: bold;">Step 2:</span> After logging in you will be directed to the Dashboard. <img src="Dashboard.png" alt="" class="img-fluid"></p>
						<p><span style="font-weight: bold;">Step 3:</span> If the button is pressed, click the notification behind the dashboard to navigate the emergency. <img src="homepage.png" alt="" class="img-fluid"></p>
						<p><span style="font-weight: bold;">Step 4:</span> The barangay officials will verify and respond to the location of the person who pressed. <img src="step4.jpg" alt="" class="img-fluid"></p>
						<p><span style="font-weight: bold;">Step 5:</span> After the button was pressed and whether the incident is solved or unsolved, go to Incident Reports section to list down the details of emerge. <img src="step5.png" alt="" class="img-fluid"></p>
					</div>
					</div>
                    </div>
                </div>
            </div>
				</div>
				</div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>

        
        // $("#anchorid").off('click');
        console.log("Hello");

        // $("#anchorid").addClass("disable-click");
        // $("#anchorid").removeClass("disable-click");

        // $("#anchorid").click(function(e) {
        // e.preventDefault();
        // console.log("World");
        // });

        $(document).ready(function(){

            var noUpdate = document.getElementById("hiddenooUp").value;
            console.log(noUpdate);

            if(noUpdate == 1){
                console.log("True");
                $("#anchorid").removeClass("disable-click");
            }
            
            else if(noUpdate == 0){
                console.log("False");
                $("#anchorid").addClass("disable-click");
            }

            $('table').on('click', function(e){
                let target = e.target.dataset.link;

                if(target != undefined) {
                    window.location = target;
                }
            });
        }); 
    </script>

</body>
</html>


