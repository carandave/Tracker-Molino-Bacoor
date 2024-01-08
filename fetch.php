<?php 

include "config1.php";



    if(isset($_POST['request'])){
        $request = $_POST['request'];
        

        if($request == "Opened"){
            $request = 1;
        }

        else if($request == "Un-Opened"){
            $request = 0;
        }

        // echo $request;

        $query = "SELECT * FROM tbl_gps WHERE opened = $request";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);

        // unset($_POST['request']);
        // print_r($count);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
</head>
<body>

<div class="container">
    
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="card-title">Notifications</h4>
            
            <div class="d-flex align-items-center" style="width: 100%;">
                    <select class="form-control btn-primary mr-3" name="fetchval" id="fetchval" style="width: 15%;">
                        
                        <option value=<?php echo $request;?>>Filter</option>
                        <option value="Opened">Successful</option>
                        <option value="Un-Opened">Not Open</option>
                    </select>
                    <div style="width: 20%;">
                        <a href="notifications.php" class="btn btn-info">Refresh</a>
                    </div>
                </div>   
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" >
                    
                    <thead style="background-color: #0B3C6C; color: white; font-weight: 400 !important;">
                        <tr>
                            
                            <th>Notification On:</th>
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
                                        
                                        <td><?php echo $row['created_date']; ?></td>
                                        <td><p class="text-success"><?php echo $row['opened'] ? 'Successful' : ''; ?>
                                        <p class="text-danger"><?php echo $row['opened'] ? '' : 'Not Open'; ?></td>
                                        <td class="text-center">
                                            <a href="map.php?lng=<?php echo $row['lng'] . '&lat=' .$row['lat'].'&id='.$row['id']?>">View on Map</a>
                                        </td>
                                    </tr>                       
                            <?php       }
                                }

                            ?>                
                    </tbody>
                </table>
                
                <!-- <div class="d-flex justify-content-center alig-items-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            <li class="page-item">
                            <a class="page-link <?= ($page_no <=1)? 'disabled' : '';?>" <?= ($page_no > 1)? 'href=?page_no='.$previous_page : '';?> aria-label="Previous">
                                Previous
                            </a>
                            </li>

                            <?php for ($counter = 1; $counter <= $total_no_of_pages; $counter++){?>

                                <?php if ($page_no != $counter) { ?>                           
                                    <li class="page-item"><a class="page-link" href="?page_no=<?= $counter;?>"><?= $counter; ?></a></li>
                                <?php } else { ?>
                                    <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                                <?php } ?>
                            <?php } ?>

                            <li class="page-item">
                            <a class="page-link <?= ($page_no >= $total_no_of_pages) ? 'disabled' : '';?>" <?= ($page_no < $total_no_of_pages)? 'href=?page_no='.$next_page : '';?>>
                                Next
                            </a>
                            </li>
                        </ul>
                    </nav>
                </div>      -->
        </div>
    </div> 
</div> 
    
</body>
</html>

    


