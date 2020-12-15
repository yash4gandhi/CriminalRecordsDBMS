<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Userhome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('https://image.shutterstock.com/image-photo/customer-complaint-business-concept-260nw-503424349.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;" >

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >CRIME_MANAGEMENT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="userhome.php">Home</a></li>
      <li class="active"><a href="complain.php">COMPLAIN</a></li>
	   <li class="active"><a href="mycomplains.php">MYCOMPLAINS</a></li>
	   	   <li class="active"><a href="updatemycomplain.php">UPDATEMYCOMPLAINS</a></li>
		   <li class="active"><a href="search.php">SEARCH</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="displayuser.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

</div>

</body>
</html>
