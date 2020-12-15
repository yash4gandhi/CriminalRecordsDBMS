<?php

session_start();
if(!isset($_SESSION['username'])){header('location:home.php');}

?>



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
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="style.css">

<style>
    .signup-form h2:before, .signup-form h2:after{
		width: 40%;
	
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    </style>
</head>
<body>

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
  <div class="signup-form">
    <form action="jail_input.php" method="post">
		<h2>JAIL</h2>
		
        <div class="form-group">
        	<input type="number" class="form-control" name="jail_reg_id" placeholder="jail_reg_id" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="name" placeholder="name" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="address" required="required">
        </div> 
        <div class="form-group">
            <input type="number" class="form-control" name="phone" placeholder="Phoneno" required="required">
        </div> 
    
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Enter</button>
            </div>
        </form>
    </div>
	
	<?php

	$id=$_POST["jail_reg_id"];
if($id)
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
 //echo $id;
 $name=$_POST['name'];
 $address=$_POST['address'];
 $phone=$_POST['phone'];
 
 
  
 $qr="select * from jail where jail_reg_id='$id'";
 $resultr=mysqli_query($con,$qr);

 $num=mysqli_num_rows($resultr);
 
 if($num>=1)
 {	 
	 echo "<br> JAIL  ALREADY PRESENT";
 } 
 
 else{
	 
	 $sql="insert into jail values('$id','$name','$address','$phone')";
	 mysqli_query($con,$sql);
 
 }
}
?>
	
    </div>
    </body>
    </html>



