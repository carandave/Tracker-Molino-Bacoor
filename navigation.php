<?php 

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
}

if($_SESSION['noUpdate'] == 0){
  header("Location: dashboard.php");
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
</head>
<body>
	<style>
body {
  margin: 0;
  font-family:Arial;
	background-color: #E3F1FF;
}


.topnav{
  background-color: #0B3C6C;
  display: flex;
  justify-content: center;
  align-items: center;
  padding-left: 20px;
}

a.active {
  color: white;
  display: flex;
  justify-content: start;
  align-items: center;
  text-align: center;
  font-weight: 600;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 24px;
}

a.active:hover{
  color: #ffffff;
}

.blinking {
  -webkit-animation: 1s blink ease infinite;
  -moz-animation: 1s blink ease infinite;
  -ms-animation: 1s blink ease infinite;
  -o-animation: 1s blink ease infinite;
  animation: 1s blink ease infinite;
}

@keyframes "blink" {
  from, to {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}

@-moz-keyframes blink {
  from, to {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}

@-webkit-keyframes "blink" {
  from, to {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}

@-ms-keyframes "blink" {
  from, to {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}

@-o-keyframes "blink" {
  from, to {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
}

	</style>

</head>

<body>

<div class="topnav d-flex justify-content-center align-items-center py-2">
  <div id="hasItemIndicator" class="d-flex justify-content-center align-items-center">
          <svg height="20" width="20" class="blinking">
            <circle cx="0" cy="0" r="10" fill="red" />
            Sorry, your browser does not support inline SVG.  
          </svg>
    </div>
    <a class="active" href="notifications.php" style="width: 40%;"> 
      iTracker
    </a>
    <div class="topnav-right d-flex justify-content-center align-items-center" style="width: 60%;">
      <ul class="d-flex justify-content-center align-items-center mb-0" style="list-style: none;">
        <li class="nav-item active">
          <a class="nav-link text-light" href="adminhomepage.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="registerednumber.php">Registered Number</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link text-light" href="view-reports.php">Incident Reports<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link text-light" href="officiallist.php">Official List<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
    </ul>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>