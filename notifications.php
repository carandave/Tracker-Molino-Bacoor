<?php 
session_start();
    include "config1.php";

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

    // For Pagination

    //Get page no.
    if (isset($_GET['page_no']) && $_GET['page_no'] !== ""){
        $page_no = $_GET['page_no'];
    }

    else{
        $page_no = 1;
    }

    //Total Records To Display
    $total_records_per_page = 15;

    //Get the Page Offset for the limit query 
    $offset = ($page_no - 1) * $total_records_per_page;

    //Get previous page
    $previous_page = $page_no - 1;

    //Get the next page
    $next_page = $page_no + 1;

    //Get the total count of records;
    $result_count = mysqli_query($db, "SELECT COUNT(*) as total_records FROM tbl_gps ") or die(mysqli_query($db));
    //total records
    $records = mysqli_fetch_array($result_count);
    //store total_records to a variable 
    $total_records = $records['total_records'];
    //get the total pages 
    $total_no_of_pages = ceil($total_records / $total_records_per_page);


    $notifType = $_GET['notif_type'] ?? 'Un-Opened';
    $notifType = $notifType == 'Un-Opened' ? false : true;
    $sql = "SELECT tbl_gps.*, resident.id as resident_id,
            CONCAT(resident.fname, resident.lname) as fullname,
            resident.address as address
            FROM tbl_gps 
                JOIN resident
            WHERE opened = '{$notifType}'
            ORDER BY tbl_gps.id DESC LIMIT $offset, $total_records_per_page";
    
    $result = mysqli_query($db, $sql) or die (mysqli_error($db));




        // $sql = "SELECT * FROM tbl_gps ORDER BY id desc LIMIT 15";
    // $result = $db->query($sql);
    //     if (!$result) {
    //     { echo "Error: " . $sql . "<br>" . $db->error; }
    //     }

?>

<!DOCTYPE html>

<html>
<body style="background-color:#E3F1FF">
<head>
    <title>Notifications</title>


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="refresh" content="10">

</head>

<style>
    *{
        font-family: 'Poppins', sans-serif;
    }

</style>

<body>

    <?php include 'navigation.php'?>

    <div class="container-fluid">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Notifications</h4>
                <div class="" style="width: 100%;">
                    <!-- <select class="form-control btn-primary" name="fetchval" id="fetchval" style="width: 100%;">
                        
                        <option>Filter</option>
                        <option value="Opened">Successful</option>
                        <option value="Un-Opened">Not Open</option>
                    </select> -->

                    <div class="radio">
                        <label>
                            <input type="radio" name="fetchval" id="fetchval_Not" value="Un-Opened" class="mr-3" >Filter - Not Opened
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="fetchval" id="fetchval_Suc" value="Opened" class="mr-3">Filter - Successful
                        </label>
                    </div>

                    

                    
                </div>         
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead class="text-center" style="background-color: #0B3C6C; color: white; font-weight: 400 !important;">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>View On Map</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                if ($result->num_rows > 0) {
                                    foreach ($result as $row) {
                            ?>
                                    <tr>
                                        
                                        <td><?php echo $row['resident_id']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['created_date']; ?></td>
                                        <td><p class="text-success my-0 font-weight-bold"><?php echo $row['opened'] ? 'Successful' : ''; ?>
                                        <p class="text-danger my-0"><?php echo $row['opened'] ? '' : 'Not Open'; ?></td>
                                        <td class="text-center">
                                            <a class="font-weight-bold" href="map.php?lng=<?php echo $row['lng'] . '&lat=' .$row['lat'].'&id='.$row['id']?>">View on Map</a>
                                        </td>
                                    </tr>                       
                            <?php       }
                                }

                            ?>                
                        </tbody>
                    </table>
                    
                    <div class="d-flex justify-content-center alig-items-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" style="background-color: #0B3C6C;">

                                <li class="page-item">
                                <a class="page-link <?= ($page_no <=1)? 'disabled' : '';?>" <?= ($page_no > 1)? 'href=?page_no='.$previous_page : '';?> aria-label="Previous">
                                    Previous
                                </a>
                                </li>

                                <?php for ($counter = 1; $counter <= $total_no_of_pages; $counter++){?>

                                    <?php if ($page_no != $counter) { ?>                           
                                        <li class="page-item"><a class="page-link" href="?page_no=<?= $counter;?>"><?= $counter; ?></a></li>
                                    <?php } else { ?>
                                        <li class="page-item"><a class="page-link active" style="background-color: #0B3C6C; color: white;"><?= $counter; ?></a></li>
                                    <?php } ?>
                                <?php } ?>

                                <li class="page-item">
                                <a class="page-link <?= ($page_no >= $total_no_of_pages) ? 'disabled' : '';?>" <?= ($page_no < $total_no_of_pages)? 'href=?page_no='.$next_page : '';?>>
                                    Next
                                </a>
                                </li>
                            </ul>
                        </nav>
                    </div>     
            </div>
        </div> 
    </div> 

    </div>

    

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    
<script type="text/javascript">

    $(document).ready(function(){
        var url = new URL(window.location.href);
        var search_params = url.searchParams;

        $("#fetchval_Not").on('change', function(){
            var value = $(this).val();
            // add "topic" parameter
            search_params.set('notif_type', value);

            url.search = search_params.toString();

            var new_url = url.toString();
            window.location = new_url;

        });

        $("#fetchval_Suc").on('change', function(){
            var value = $(this).val();
            // add "topic" parameter
            search_params.set('notif_type', value);

            url.search = search_params.toString();

            var new_url = url.toString();
            window.location = new_url;

        });
        // console.log("Hello World");
    });

    
</script>

</body>

</html>

