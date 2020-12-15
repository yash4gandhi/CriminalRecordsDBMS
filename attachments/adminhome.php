<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('http://www.clker.com/cliparts/7/n/v/K/A/b/red-rectangle-admin-login-button-hi.png'); background-repeat: no-repeat;  background-position:  center;" >

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >CRIME_MANAGEMENT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="adminhome.php">Home</a></li>
      <li class="active"><a href="database.php">DATABASE</a></li>
	  <li class="active"><a href="admindelete.php">DELETE</a></li>
	   <li class="active"><a href="adminupdate.php">UPDATE</a></li>
	   
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php  if(isset($_SESSION['username']))echo $_SESSION['username'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  
  <a href="addpolice.php"><h2>Add Police</h2></a>
  <a href="ps_input.php"><h2>Add Police STATION</h2></a>
  <a href="jail_input.php"><h2>Add JAIL</h2></a>
  
</div>

</body>
</html>
