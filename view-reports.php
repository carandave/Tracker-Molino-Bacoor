<?php 
session_start();

if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }

// 	if(!isset($_SESSION['admin'])){
// 		header("Location: index.php");
// 	}

    if($_SESSION['noUpdate'] == 0){
		header("Location: dashboard.php");
	}

    



include "navigation.php";
include "config1.php";


$notifType = $_GET['notif_type'] ?? 'Opened';
$notifType = $notifType == 'Un-Opened' ? true : false;

$sql = "INSERT INTO report(fullname,date,location)
        SELECT
        CONCAT(resident.fname, resident.lname) as fullname,
         tbl_gps.created_date as date,
        resident.address as address
        FROM tbl_gps 
            JOIN resident
        WHERE opened = '{$notifType}'
        ORDER BY tbl_gps.id ASC";
        

        $gpsResult = mysqli_query($db, $sql) or die (mysqli_error($db));




        $sql = "SELECT * FROM report ORDER BY id DESC";
        $result = $db->query($sql);
        if (!$result) {
        { echo "Error: " . $sql . "<br>" . $db->error; }
        }

        $row = $result->fetch_assoc();


        $sqlchart = "SELECT incident, count(*) as number FROM report GROUP BY incident";
        $chartresult = mysqli_query($db, $sqlchart);

        $sql1="UPDATE tbl_gps
        SET opened = 1;";
        $gpsResult = mysqli_query($db, $sql1) or die (mysqli_error($db));


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
					<h4 class="card-title mb-0 mr-3">Incident Reports</h4>

					<form action="searchreport.php" method="GET" class="d-flex align-items-center justify-content-between">
							<input type="text" name="search" class="form-control mr-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Full Name">
							<button type="submit" class="btn btn-primary">Search</button>
					</form>

                    <div>
                    
                    <a class="btn btn-info" href="add-report.php?id=<?php echo $row['id']; ?>">Add Report</a>
                    <a href="adminhomepage.php" class=" btn btn-danger">Back</a>
                    </div>
					
					
				</div>       
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead style="background-color: #0B3C6C; color: white; font-weight: 400 !important;">
                            <tr class="text-center">
                                <th class="p-3">Full Name</th>
                                <th class="p-3">Incident</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Time</th>
                                <th class="p-3">Location</th>
                                <th class="p-3">Officer</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Summary</th>
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
                    <td class="stud_id d-none"><?php echo $row['id']; ?></td>

                    <td><?php echo $row['fullname']; ?></td>

                    <td><?php echo $row['incident']; ?></td>

                    <td><?php echo date('Y-m-d', strtotime($row['date']));; ?></td>
					
					 <td><?php echo date('H:i:s a', strtotime($row['date'])); ?></td>
					 
					 <td><?php echo $row['location']; ?></td>

                    <td><?php echo $row['officer']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
                    <td><a href="#" class="btn btn-success view_btn" data-toggle="modal" data-target="#studentVIEWModal" >
                    View Summary
                    </a></td>
                    <!-- Modal -->
                    <div class="modal fade" id="studentVIEWModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Summary</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="student_viewing_data">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <td class="d-flex text-center">
                        <a class="btn btn-info" href="update1.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                        <a class="btn btn-warning" href="print.php?id=<?php echo $row['id']; ?>">Print</a>&nbsp;
                        <a class="btn btn-danger" href="deletereport.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                                    </tr>                       
                            <?php       }
                                }

                            ?>                
                        </tbody>
                </table>

                <div id="myChart" style="width: 100%; height: 500px;">

                </div>

                <script>
                    google.charts.load('current',{packages:['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Incident', 'Number'],
                        <?php 
                            while($rowChart = mysqli_fetch_array($chartresult)){
                                echo "['".$rowChart["incident"]."', ".$rowChart["number"]."],";
                                // echo "Helli WOrld";
                            }
                        ?>
                    ]);
                    var options = {
                        title: 'Percentage of Cases in Molino II'
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data, options);

                    //

                    // Set Data
                    // var data = google.visualization.arrayToDataTable([
                    // ['Price', 'Size'],
                    // [50,7],[60,8],[70,8],[80,9],[90,9],
                    // [100,9],[110,10],[120,11],
                    // [130,14],[140,14],[150,15]
                    // ]);
                    // // Set Options
                    // var options = {
                    // title: 'House Prices vs. Size',
                    // hAxis: {title: 'Square Meters'},
                    // vAxis: {title: 'Price in Millions'},
                    // legend: 'none'
                    // };
                    // // Draw
                    // var chart = new google.visualization.LineChart(document.getElementById('myChart'));
                    // chart.draw(data, options);
                    }
                </script>

                <!-- <div class="d-flex justify-content-center align-items-center mt-5">
                    <img src="Crimes.png" class="img-fluid" alt="">
                    <div>
                        <h3>Crimes in Molino II</h3>
                        <p class="text-dark">According to the graph above, physical harm, anti-fencing, and alarm and scandal are the most common crimes in Molino II. The months of March, April, and May are particularly prone to the top 3 most frequent crimes in Molino II.</p>
                    </div>
                    
                </div> -->
            </div>
        </div> 
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>

        $(document).ready(function(){
            $('.view_btn').click(function (e){
                e.preventDefault();
                // alert("Hello World");

                var stud_id = $(this).closest('tr').find('.stud_id').text();
                // console.log(stud_id);

                $.ajax({
                    type: "POST",
                    url: "summary.php",
                    data: {
                        'checking_viewbtn': true,
                        'student_id': stud_id,
                    },
                    success: function(response){
                        // console.log(response);
                        $('.student_viewing_data').html(response); 
                        $('studentVIEWModal').modal('show');
                    }
                })
            })
        })

    </script>
</body>

</html>

