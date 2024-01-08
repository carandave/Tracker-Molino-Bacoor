<?php 

    if(isset($_POST['submit']))
    {
       $lname = $_POST['lname'];
       $fname = $_POST['fname'];
       $subject = $_POST['subject'];
       $mailFrom = $_POST['mail'];
       $message = $_POST['message'];
	
	$mailTo = "emergencymolino@itrackermolino.online";
	$headers = "From: ".$mailFrom;
// 	$txt = "You have received an e-mail from ".$fname.".\n\n".$message;
      $txt = "You have received an e-mail from ".$lname.", ".$fname.".\n\n".$message;
	  echo '<script>alert("The Email has been sent!")</script>';
	
	mail($mailTo, $subject, $txt, $headers);
    
       header("Location: contactus.php?Mailsend");
       
       }
    
?>