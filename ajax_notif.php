<?php 

include "config1.php";

$sql = "SELECT * FROM tbl_gps 
where opened = false
ORDER BY id desc LIMIT 10";
$result = $db->query($sql);
if (!$result) {
  { echo "Error: " . $sql . "<br>" . $db->error; }
}


if($result->num_rows > 0){
  echo $result->num_rows;
}else{
  echo '0';
}
?>