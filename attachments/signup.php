


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
    <form action="signup.php" method="post">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-4"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
				<div class="col-xs-4"><input type="text" class="form-control" name="middlename" placeholder="Middle Name" required="required"></div>
				<div class="col-xs-4"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>
	
			</div>        	
        </div>
        <div class="form-group">
        	<input type="number" class="form-control" name="aadharid" placeholder="Aadhar ID" required="required">
        </div>
		<div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>

        <div class="form-group">
            <input type="number" class="form-control" name="phoneno" placeholder="Phoneno" required="required">
		</div>  
            <div class="form-group">
            <input type="text" class="form-control" name="date" placeholder="YYYY/MM/DD" required="required">
        </div>   
		
		 <div class="form-group">
            <input type="text" class="form-control" name="gender" placeholder="gender" required="required">
        </div> 

    
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="login.php">Login</a></div>
</div>

</div>
<?php
session_start();
if(isset($_POST['username']))
{
$con=mysqli_connect('localhost','root');

if($con)
{
	echo "connection successful";
}
else
{
	echo "no connect";
}
 mysqli_select_db($con,'criminalrecords');
 $name=$_POST['username'];
 $pass=$_POST['password'];
 $aadh=$_POST['aadharid'];
 $email=$_POST['email'];
 $phoneno=$_POST['phoneno'];
 $dob=$_POST['date'];
 $fn=$_POST['firstname'];
 $ln=$_POST['lastname'];
 $mn=$_POST['middlename'];
 // $psid=$_POST['psid'];
   $gender=$_POST['gender'];
 $q="select * from user where (user_name='$name' and password='$pass') or '$aadh'=aadhar_id";
 $result=mysqli_query($con,$q);
 $num=mysqli_num_rows($result);
 

 if($num>=1)
 {
	 header('location:signup.php');
	 echo "<br>Already present enter new";
 }
 else{
	 
	 
	 $qy="insert into user values('$aadh','$name','$pass','$fn','$mn','$ln','$email','$phoneno','$dob','$gender','citizen')";
	// $qx="insert into complainant values(null,'$aadh',)";
	 //echo "<br>data gone";
	 header('location:login.php');
	 mysqli_query($con,$qy);
	//  mysqli_query($con,$qx);
 }
 
}
?>

</body>
</html>
