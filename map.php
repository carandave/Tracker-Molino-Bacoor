<?php
//error: Google Maps JavaScript API error: ApiNotActivatedMapError
//solution: click "APIs and services" Link
//			click "Enable APIs and services" button
//			Select "Maps JavaScript API" then click on enable



session_start();

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
}


require 'config1.php';

if(!isset($_GET['lat'], $_GET['lng'],$_GET['id'])) {
	echo die("INVALID REQUEST!");
}

$sql = "UPDATE tbl_gps set opened = true WHERE id = '{$_GET['id']}' ";
$db->query($sql);
#old query
// $sql = "SELECT * FROM tbl_gps ORDER BY id DESC LIMIT 1";
// $result = $db->query($sql);
// if (!$result) {
//   { echo "Error: " . $sql . "<br>" . $db->error; }
// }

// $row = $result->fetch_assoc();
//$rows = $result -> fetch_all(MYSQLI_ASSOC);

//print_r($row);

//header('Content-Type: application/json');
//echo json_encode($rows);


?>


<html>
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Itracker Map</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>

	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 800px;
			width: 1500px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>

	
</head>
<body>



<div id="map" style="width: 1500px; height: 800px;"></div>
<script>
	var map = L.map('map').setView([<?php echo $_GET['lat']; ?>, <?php echo $_GET['lng']; ?>], 50);

	var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	var marker = L.marker([<?php echo $_GET['lat']; ?>, <?php echo $_GET['lng']; ?>]).addTo(map)
		.bindPopup('EMERGENCY ALERT! Adamson University SV Building. 900 San Marcelino St, Ermita, Manila, 1000 Metro Manila</b><br />').openPopup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent('You clicked the map at ' + e.latlng.toString())
			.openOn(map);
	}
	map.on('click', onMapClick);
</script>



</body>
</html>
