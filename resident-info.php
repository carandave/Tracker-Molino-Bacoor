
<?php 

session_start();
include "config1.php";

if (isset($_POST['update'])) {

    $address = $_POST['address'];

    $contact = $_POST['contact'];
	
    $username = $_SESSION['username'];

    $sql = "UPDATE `resident` SET `address`='$address',`contact`='$contact' where `username`='$username'"; 

    $result = $db->query($sql); 

    if ($result == TRUE) {

        echo "User information updated successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 
else {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM `resident` WHERE `username`='$username'";

    $result = $db->query($sql); 

    $row = $result->fetch_assoc();

    $address = $row['address'];

    $contact = $row['contact'];

    $id = $row['id'];
}

?>
    
<html>
<head>
        
    <style>
    input[type=text], select {
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    input[type=submit] {
      width: 40%;
      background-color: #55a1ff;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    input1[type=submit]:hover {
      background-color: #45a049;
    }
    
    div1 {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
    
    </style>
</head>
<body style="background-color:#E3F1FF">


        <form action="" method="post">

          
            <center>

            <br>

                <input type="text" name="address" value="<?php echo $address; ?>">
    			
    			
    
                <input type="hidden" name="user_id" value="<?php echo $id; ?>">
    
                <br>
    
                <br>
    
                <input type="text" name="contact" value="<?php echo $contact; ?>">
    
                <br>
    
                <br>
    
    
                <input type="submit" value="Update" name="update">
    			<p><a href="residentinfo.php">Back</a></p>
			
            </center>
          

        </form> 

</body>

</html> 