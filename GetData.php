<?php     
  require 'config1.php';
  
$sql = "SELECT `ID`, `Status` FROM `buttonupdate` WHERE 1";
$result = $db->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo  $row["Status"];
    }
} else {
    echo "0 results";
}

$db->close();
?>
