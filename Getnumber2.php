<?php     
  require 'config1.php';
  
$sql = "SELECT `id`, `username`, `lname`, `fname`, `address`, `city`, `province`, `email`, `contact`, `password`, `image`, `create_datetime` FROM `resident` WHERE id = 3;";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    if($row = $result->fetch_assoc()) {
        echo  $row["contact"];
    }
} else {
    echo "0 results";
}

$db->close();
?>
