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
<body>

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

<table class="table">

    <thead class="thead-dark">
      <tr>
        <th>Aadhar_id</th>
        <th>username</th>
        <th>firstname</th>
		<th>lastname</th>
      </tr>
    </thead>
	
    <tbody>
	

<?php


if(isset($_SESSION['username']))
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

$name=$_SESSION['username'];
$sql = "SELECT aadhar_id,user_name,firstname,lastname FROM user where user_name='$name'";
$result = mysqli_query($con, $sql);
$sql1;
$num=mysqli_num_rows($result);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       echo "<tr><td>" . $row["aadhar_id"]. "</td><td>".$row["user_name"]."</td><td>". $row["firstname"]. "</td><td>". $row["lastname"]."</td></tr>";
	   
    }
} else {
    echo "0 results";
}
}
mysqli_close($con);

?>

<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">CHANGE </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		
		<div class="signup-form">
    <form action="updateuserdetails.php" method="post">
		<h2>update</h2>
		
        <div class="form-group">
			<div class="row">
				<div class="col-xs-4"><input type="text" class="form-control" name="firstname" placeholder="First Name" ></div>
				<div class="col-xs-4"><input type="text" class="form-control" name="middlename" placeholder="Middle Name"></div>
				<div class="col-xs-4"><input type="text" class="form-control" name="lastname" placeholder="Last Name" ></div>
	
			</div>        	
        </div>
		
		
		<div class="form-group">
        	<input type="text" class="form-control" name="cusername" placeholder="username">
        </div>
		
		<div class="form-group">
        	<input type="text" class="form-control" name="password" placeholder="password">
        </div>
		
		
 
		<div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email">
        </div>
		

        <div class="form-group">
            <input type="number" class="form-control" name="phoneno" placeholder="Phoneno" >
        </div>  
            <div class="form-group">
            <input type="text" class="form-control" name="date" placeholder="YYYY/MM/DD" >
        </div>   
		
		 <div class="form-group">
            <input type="text" class="form-control" name="gender" placeholder="gender" >
        </div> 

    
    
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">update</button>
        </div>
		</form>
      </div>
    </div>
	</div>
	



  
</div>
 

</body>
</html>