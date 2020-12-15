


<!DOCTYPE html>
<html lang="en">
<head>
  
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
      <a class="navbar-brand">CRIME_MANAGEMENT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
    
	</ul>
    <ul class="nav navbar-nav navbar-right">

      <li><a href="adminlogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="signup-form">
    <form action="adminsignup.php" method="post">
		<h2>REGISTER</h2>
		
      <div class="form-group">
        	<input type="number" class="form-control" name="aadharid" placeholder="aadharid" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>

    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">SIGNUP</button>
			<?php

session_start();
if(isset($_POST['username']))
{

$con=mysqli_connect('localhost','root');

if($con)
{
	//echo "connection successful";
}
else
{
	echo "no connect";
}
 mysqli_select_db($con,'criminalrecords');
 $id=$_POST['aadharid'];
 $name=$_POST['username'];
 $pass=$_POST['password'];


 //$aadh=$_POST['aadhar'];
 $q="select * from admin where (username='$name' and password='$pass') or aadhar_id='$id'";
 $result=mysqli_query($con,$q);
 $num=mysqli_num_rows($result);
 
 if($num>0)
 {
	 
	 echo "<br> ALREADY PRESENT";
 }
 else{
	 $qy="CREATE TRIGGER `adminentry` BEFORE INSERT ON `admin` FOR EACH ROW SIGNAL SQLSTATE '01000' SET MESSAGE_TEXT = 'A warning occurred', MYSQL_ERRNO = 1000;  ";
   
	 mysqli_query($con,$qy);
	    echo "Invalid";
 }
}
?>

        </div>
    </form>
	
</div>

</div>

</body>
</html>
