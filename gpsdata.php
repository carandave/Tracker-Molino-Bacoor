<?php 

require 'config1.php';
//----------------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$api_key = escape_data($_POST["api_key"]);
        //print_r($_POST);
        //echo "<br>ESP32_API_KEY: ".ESP32_API_KEY."<br>";
	//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
	if($api_key == ESP32_API_KEY) {
	    
		$latitude = escape_data($_POST["lat"]);
		$longitude = escape_data($_POST["lng"]);
		
		$time = date('H:i:s');
		$dateOnly = date('Y-m-d');

		$sql = "INSERT INTO tbl_gps(lat,lng,created_date) 
			VALUES('".$latitude."','".$longitude."','".date("Y-m-d H:i:s")."')";

		if($db->query($sql) === FALSE)
			{ echo "Error: " . $sql . "<br>" . $db->error; }


		$sql = "INSERT INTO report(
			fullname,date,time,remarks
		)(SELECT (concat(fname, lname), '{$dateOnly}', '{$time}','Solved') 
			FROM resident where id = 1)";

		$db->query($sql);

		echo "OK. INSERT ID: ";
		echo $db->insert_id;
		
				$sql = "UPDATE `buttonupdate` SET `ID`='0',`Status`='1' WHERE 1";
			

		if($db->query($sql) === FALSE)
			{ echo "Error: " . $sql . "<br>" . $db->error; }

		echo "OK. INSERT ID: ";
		echo $db->insert_id;
		
		sleep(10);
			$sql = "UPDATE `buttonupdate` SET `ID`='0',`Status`='0' WHERE 1";
			
					if($db->query($sql) === FALSE)
			{ echo "Error: " . $sql . "<br>" . $db->error; }

		echo "OK. INSERT ID: ";
		echo $db->insert_id;
		
	}
	//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
	else
	{
		echo "Wrong API Key";
	}
	//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
}
//----------------------------------------------------------------------------
else
{
	echo "No HTTP POST request found";
}

//----------------------------------------------------------------------------


function escape_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}