<?php
session_start();
require 'config.php';

if($_SESSION['noUpdate'] == 0){
    header("Location: dashboard.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Resident Edit</title>

    <style>
    *{
        font-family: 'Poppins', sans-serif;
    }
</style>
</head>
<body>
    <?php include("navigation.php");?>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <div class="card d-flex justify-content-center align-items-center p-3" >
                    <!-- <div class="card-header">
                        <h4>Edit Resident Information 

                        </h4>
                    </div> -->
                    <div class="card-body" >
                    <h4 class="text-center mb-3">Edit Resident Information</h4>
                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM resident WHERE id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">

                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="fname" value="<?=$student['fname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" value="<?=$student['lname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Street Address</label>
                                        <input type="Tel" name="address" value="<?=$student['address'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>City</label>
                                        <input type="text" name="city" value="<?=$student['city'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Province</label>
                                        <input type="text" name="province" value="<?=$student['province'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone Number</label>
                                        <input type="Tel" name="contact" value="<?=$student['contact'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="Update" class="btn btn-primary btn-block">
                                            Update
                                        </button><br>
                                        <center><a href="registerednumber.php" class="btn btn-danger">Back</a></center>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>