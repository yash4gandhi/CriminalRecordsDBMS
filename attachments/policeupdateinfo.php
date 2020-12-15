<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Policehome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sign Up Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >CRIME_MANAGEMENT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="policehome.php">Home</a></li>
      <li class=""><a href="policecomplain.php">Available Complains</a></li>
      <li class="active"><a href="policeupdate.php">Update</a></li>
      <li class=""><a href="policedelete.php">Delete</a></li>
	   
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a span class="glyphicon glyphicon-user"></span><?php if(isset($_SESSION['username']))echo $_SESSION['username'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

<div class="signup-form">
    <form action="policeupdate.php" method="post">
		<h2>Update</h2>
        
  	<div class="form-group">
        	<input type="number" class="form-control" name="jail_id" placeholder="Jail_id" >
          </div>        
        

        <div class="form-group">
            <input type="number " class="form-control" name="cell_no" placeholder="Cell_No" >
        </div>  
           
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address">
        </div>  
           
        <div class="form-group">
            <input type="text" class="form-control" name="phoneno" placeholder="Phone_No">
        </div>  
       
           
        
    
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
        


<?php 
$con=mysqli_connect('localhost','root');

if($con)
{
//	echo "connection successful";
}
else
{
	echo "no connect";
}
 mysqli_select_db($con,'criminalrecords');
 if(isset($_POST['criminal_id'])){
     $criminal_id=$_POST['criminal_id'];
     $fir_id=$_POST['fir_id'];
     $q="select * from criminal where '$criminal_id'=criminal_id and '$fir_id'=fir_id";
     $result=mysqli_query($con,$q);
     $num=mysqli_num_rows($result);
     if($num==1)
 {
	 $_SESSION['criminal_id']=$criminal_id;
	 header('location:policeupdateinfo.php');
	 //echo "<br> ?WElcome";
 }
 else{
	 //$qy="insert into users values('$aadh','$name','$pass')";
	 echo "INVALID CriminalID/FirID";
	 //mysqli_query($con,$qy);
 }
}
 
 
?>
   </div> </form>
</div></div>
</body>
</html>
